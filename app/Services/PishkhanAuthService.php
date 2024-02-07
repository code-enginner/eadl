<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Libraries\LightOpenID;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use JetBrains\PhpStorm\NoReturn;

class PishkhanAuthService
{
    private $_openID = NULL;
    private $_openIDAttributes = [];
    private $_userInfo = [];
    private $_userID = NULL;

    private $_pkhRole = [];
    private $_operType = NULL;

    private $_env = '';
    private $_domain = '';
    private $_wsdl = '';
    private $_password = '';


    public function auth(AuthRequest $request)
    {
        $this->_init();

        return $this->_openIDDispatcher($request);
    }

    private function _init()
    {
        $this->_openID = new LightOpenID();

        $this->_env = config('app.env');

        if ($this->_env === 'production') {
            $this->_domain = config('pos.production.domain');
            $this->_wsdl = config('pos.production.pos_url');
            $this->_password = config('pos.production.password');
        } else {
            $this->_domain = config('pos.local.domain');
            $this->_wsdl = config('pos.local.pos_url');
            $this->_password = config('pos.local.password');
        }
    }

    private function _openIDDispatcher(AuthRequest $request)
    {
        if (!$this->_openID->mode) {
            if (!$this->_operKeyValidate($request->input('oper'))) {
                $this->_returnError('لطفا با حساب کاربری مدیر وارد شوید');
            }
            return $this->_sendOpenIDAuthenticationRequest($request);
        } elseif ($this->_openID->mode === 'cancel') {
            $this->_returnError('تایید اعتبار توسط دفتر لغو شده است!');
        } else {
            if ($this->_openID->validate()) {
                $this->_openIDAttributes = $this->_openID->getAttributes();
                // dd($this->_openIDAttributes);
                if (isset($this->_openIDAttributes['userkey'])) {
                    $this->_getUserInfoFromPOS($request);
                    //dd("eeeee");
                    //$request->input('hash');
                    $output = $this->encrypt_decrypt('decrypt', '%expkh*', $request->input('hash'));
                    //dd($output);
                    $array = explode(',', $output);
                    //dd($array);
                    if ($array[1] !== $request->input('ver_code')) {
                        $this->_returnError('تایید دفتر !');
                    }
                    $array = explode('|', $output);

                    //$array = array("C++", "C", "JavaScript", "jQuery", "PHP");
                    // $removedVal = array_slice($array, 0, -1);
                    // print_r($removedVal);
                    // dd($removedVal);
                    $this->_pkhRole = json_encode(array_slice($array, 0, -1));
                    // $count= count($array)
                    // $this->_pkhRole=[$array[0],$array[1]];
                    // dd($this->_pkhRole);
                    return $this->_doLogin($request);
                } else {
                    $this->_returnError('اطلاعات هویتی شما در سرویس دهنده تعیین هویت اشتباه ثبت شده است!');
                }
            } else {
                $this->_returnError('تایید اعتبار توسط دفتر لغو شده است!');
            }
        }
    }

    private function _operKeyValidate($key): bool
    {
        if (strpos($key, 'u') !== NULL) {
            $code_array = explode('u', $key);

            if ($code_array[1] >= 1 && $code_array[1] <= 99) {
                $this->_operType = $code_array[1];

                return TRUE;
            }
            return FALSE;
        } else
            return FALSE;
    }

    private function _sendOpenIDAuthenticationRequest(AuthRequest $request)
    {
        // We must FORCE consumer to use pishkhan authentication (identity) server
        $this->_openID->identity = 'http://auth.epishkhan.ir/identity/' .
            $request->input('oper');
        // $request->input('office');

        // We use AX protocol to get userkey from authentication (identity) server
        $this->_openID->required = ['userkey', 'operkey'];//???????????????????????????????????????????
        // $this->_openID->required = ['operkey'];
        // Sending redirect header to user's browser
//        dd($this->_openID->authUrl());
        return redirect()->to($this->_openID->authUrl());
    }

    private function _getUserInfoFromPOS(AuthRequest $request)
    {
        // dd($request);
        // try {
        $result = ppgService::userInfo($request->input('ver_code'), $this->_openIDAttributes['userkey'], $this->_openIDAttributes['operkey']);

        // dd($result);
        if ($result['statusCode'] == 200) {
            // return $validateResult['message'];
            $this->_userInfo = $result['data'];
        } elseif ($result['statusCode'] == 500) {
            $this->_returnError($result['message']);
        } else {
            $this->_returnError(' خطا در اتصال به وب سرویس ');
        }
        // $soapClient = new SoapClient($this->_wsdl);
        // $this->_userInfo = $soapClient->info(
        //     [
        //         'domain' => $this->_domain,
        //         'pass' => $this->_password,
        //         'user_key' => $this->_openIDAttributes['userkey']
        //     ]
        // );
        // // dd( $this->_userInfo);
        if (
            isset($this->_userInfo->office) &&
            // isset($this->_userInfo->operator) &&
            is_object($this->_userInfo->office)
            // is_object($this->_userInfo->operator) &&
        ) {
            return TRUE;
        } else {
            $this->_returnError('اطلاعات دفتر از سرویس واسط دریافت نمی شود!');
        }
        // } catch (\Exception $e)
        // {
        //     // dd($e->getMessage());
        //     Log::emergency('Occurrence point => PishkhanController (_getUserInfoFromPOS method) ***** ' . $e->getMessage());
        //     $this->_returnError('داطلاعات دفتر از سرویس واسط دریافت نمی شود!');
        // }
    }

    private function _doLogin(AuthRequest $request)
    {
        // dd($this->_operType);
        $helper = new HelperController();
        $userRepo = new UserRepository();
        // $loginCodeRepo = new LoginCodeRepository();
        $accessTokenRepo = new AccessTokenRepository();
        $userInfo = $userRepo->getByOfficeID($this->_openIDAttributes['userkey']);

        // dd('test');
        if (is_null($userInfo)) {
            $this->_userID = $this->_registerUser($userRepo, $request);
        } elseif (is_object($userInfo)) {
            $this->_userID = $userInfo->id;
            // if (Carbon::parse($userInfo->updated_at)->diffInDays(date('Y-m-d H:i:s')) > 1)
            // {
            $this->_updateUser($userRepo, $request);
            // }
            // $this->_setLoginLog($request);
            // $this->_setLoginSession($request);
            // $request->session()->save();
            // // return redirect()->route('dashboard');
        } else {
            $this->_returnError('عملیات ورود با خطا مواحه شد!');
        }

        $this->_setLoginSession($request);
        $request->session()->save();
        // return $userInfo;
        // return   $this->_userID;
        $this->_setLoginLog($request);

        $token = $helper->generateToken();
        $logedinUser = $userRepo->updateUsersToken($this->_userID, $token);
        // return $logedinUser;
        $accessTokenRepo->save($this->_userID, $this->_openIDAttributes['userkey'], $token);
        $userInfo = $userRepo->getByOfficeID($this->_openIDAttributes['userkey']);

        $login_code = rand(1000000, 99999999);

        $userRepo->updateByOfficeID(
            $this->_openIDAttributes['userkey'],
            [
                'login_code' => $login_code,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        // $disposable_token=$helper->generateToken();
        // $disposableTokenRepo = new DisposableTokenRepository();

        // $disposableTokenRepo->saveToken($this->_userInfo->office->code,$this->_userID,$disposable_token);
        // return $logedinUser;
        // $data=[
        // 'office_code'=>  $this->_openIDAttributes['userkey'],
        // 'code'=>  $login_code,
        // 'valid'=>  1,
        // ];
        // $loginCodeRepo->save($data);
        // return  $userInfo;
        if (config('app.env') === 'production') {
            return redirect()->away('https://www.bime-epishkhan.ir/?login_code=' . $login_code);
        } else {
            return redirect()->away('https://pkhinsui.icsdev.ir?login_code=' . $login_code);
        }
        //new codes for redirects =>try it later
        // $response = Http::withToken($token)->get('http://pkhinsui.icsdev.ir', [
        //     'office_code' => $this->_userInfo->office[0],
        // ]);
        // $response->redirect();
    }

    private function _registerUser(UserRepository $userRepo, AuthRequest $request)
    {
        $this->_userID = $userRepo->save(
            [
                'office_id'   => $this->_openIDAttributes['userkey'],
                'opr_id'      => $this->_userInfo->operator->id,
                'office_code' => $this->_userInfo->office->code,
                'first_name'  => $this->_userInfo->office->ceo_fname,
                'last_name'   => $this->_userInfo->office->ceo_lname,
                'mobile'      => $this->_userInfo->office->ceo_cell,
                'tel_code'    => $this->_userInfo->office->tel_code,
                'tel'         => $this->_userInfo->office->tel,
                'national_id' => $this->_userInfo->office->ceo_ssn,
                'email'       => $this->_userInfo->office->ceo_email,
                'postal_code' => $this->_userInfo->office->zip_code,
                'address'     => $this->_userInfo->office->address,
                'province_id' => $this->_userInfo->office->province_id,
                'province'    => $this->_userInfo->office->province_name,
                'city_id'     => $this->_userInfo->office->city_id,
                'city'        => $this->_userInfo->office->city_name,
                'fax'         => $this->_userInfo->office->fax,
                'balance'     => $this->_userInfo->office->credit,
                'legal_type'  => $this->_userInfo->office->legal_type,
                'legal_name'  => $this->_userInfo->office->legal_name,
                'legal_id'    => $this->_userInfo->office->legal_id,
                'opr_type'    => explode('u', $this->_userInfo->operator->code)[1],
                'ver_code'    => $request->input('ver_code'),
                'active'      => 1,
                'pkh_role'    => $this->_pkhRole,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]
        );

        if (is_integer($this->_userID)) {
            return TRUE;
        }
        //????????????????????????????????????????????????????????????????????????????????????????????????????????
        $this->_returnError('خطا در ثبت اطلاعات دفتر!');
    }

    private function _updateUser(UserRepository $userRepo, AuthRequest $request)
    {
        if ($userRepo->updateByOfficeID(
            $this->_openIDAttributes['userkey'],
            [
                'opr_id'      => $this->_userInfo->operator->id,
                'office_code' => $this->_userInfo->office->code,
                'first_name'  => $this->_userInfo->office->ceo_fname,
                'last_name'   => $this->_userInfo->office->ceo_lname,
                'mobile'      => $this->_userInfo->office->ceo_cell,
                'tel_code'    => $this->_userInfo->office->tel_code,
                'tel'         => $this->_userInfo->office->tel,
                'national_id' => $this->_userInfo->office->ceo_ssn,
                'email'       => $this->_userInfo->office->ceo_email,
                'postal_code' => $this->_userInfo->office->zip_code,
                'address'     => $this->_userInfo->office->address,
                'province_id' => $this->_userInfo->office->province_id,
                'province'    => $this->_userInfo->office->province_name,
                'city_id'     => $this->_userInfo->office->city_id,
                'city'        => $this->_userInfo->office->city_name,
                'fax'         => $this->_userInfo->office->fax,
                'balance'     => $this->_userInfo->office->credit,
                'legal_type'  => $this->_userInfo->office->legal_type,
                'legal_name'  => $this->_userInfo->office->legal_name,
                'legal_id'    => $this->_userInfo->office->legal_id,
                'opr_type'    => explode('u', $this->_userInfo->operator->code)[1],
                'ver_code'    => $request->input('ver_code'),
                'active'      => 1,
                'pkh_role'    => $this->_pkhRole,
                'updated_at'  => date('Y-m-d H:i:s'),
            ]
        )) {
            // dd( $this->_openIDAttributes['userkey']);
            return TRUE;
        }
        $this->_returnError('خطا در بروزرسانی اطلاعات دفتر!');
    }

    private function _setLoginSession(AuthRequest $request)
    {
//        Redis::set
        $request->session()->put('pishkhan_auth',
            [
                'user_id'         => $this->_userID,
                'office_id'       => $this->_openIDAttributes['userkey'],
                'opr_id'          => $this->_userInfo->operator->id,
                'office_code'     => $this->_userInfo->office->code,
                'first_name'      => $this->_userInfo->office->ceo_fname,
                'last_name'       => $this->_userInfo->office->ceo_lname,
                'mobile'          => $this->_userInfo->office->ceo_cell,
                'tel_code'        => $this->_userInfo->office->tel_code,
                'tel'             => $this->_userInfo->office->tel,
                'national_id'     => $this->_userInfo->office->ceo_ssn,
                'email'           => $this->_userInfo->office->ceo_email,
                'postal_code'     => $this->_userInfo->office->zip_code,
                'address'         => $this->_userInfo->office->address,
                'province_id'     => $this->_userInfo->office->province_id,
                'province'        => $this->_userInfo->office->province_name,
                'city_id'         => $this->_userInfo->office->city_id,
                'city'            => $this->_userInfo->office->city_name,
                'fax'             => $this->_userInfo->office->fax,
                'balance'         => $this->_userInfo->office->credit,
                'legal_type'      => $this->_userInfo->office->legal_type,
                'legal_name'      => $this->_userInfo->office->legal_name,
                'legal_id'        => $this->_userInfo->office->legal_id,
                'opr_type'        => explode('u', $this->_userInfo->operator->code)[1],
                'ver_code'        => $request->input('ver_code'),
                'active'          => 1,
                'ip'              => $request->ip(),
                'last_login'      => date('Y-m-d H:i:s'),
                'pkh_role'        => $this->_pkhRole,
                'expiration_time' => Carbon::parse(date('Y-m-d H:i:s'))->addHours(2)->format('Y:m:d H:i:s'),
            ]
        );
    }

    private function _setLoginLog(AuthRequest $request): void
    {
        Log::channel('login')->info('',
            [
                'user_id'    => $this->_userID,
                'opr_id'     => 0,
                'username'   => '',
                'ip'         => $request->ip(),
                'browser'    => $request->header('User-Agent'),
                'created_at' => Carbon::now()
            ]);
    }

    #[NoReturn] private function _returnError(string $message): void
    {
        header('Content-Type: text/html; charset=utf-8');
        die('<h1>' . $message . '</h1>');
    }

    function encrypt_decrypt($action, $key, $string): bool|string
    {
        $output = FALSE;
        $encrypt_method = "AES-256-CBC";
        $secret_key = $key;
        $secret_iv = '1234567890#';
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } elseif ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }


}
