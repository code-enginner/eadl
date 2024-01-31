<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Log\LoginLogController;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\PishkhanAuthRequest;
use App\Libraries\LightOpenID;
use App\Repositories\UserRepository;
use App\Repositories\AccessTokenRepository;
use App\Repositories\DisposableTokenRepository;

use App\Http\Controllers\Misc\HelperController;
use App\Services\ppgService;
use Illuminate\Support\Facades\Artisan;
use SoapClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    private $_openID = null;
    private $_openIDAttributes = [];
    private $_userInfo = [];
    private $_userID = null;
    private $_operType = null;

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

        if ($this->_env === 'production')
        {
            $this->_domain = config('pos.production.domain');
            $this->_wsdl = config('pos.production.pos_url');
            $this->_password = config('pos.production.password');
        }
        else
        {
            $this->_domain = config('pos.local.domain');
            $this->_wsdl = config('pos.local.pos_url');
            $this->_password = config('pos.local.password');
        }
    }

    private function _openIDDispatcher(AuthRequest $request)
    {
        if(!$this->_openID->mode)
        {
            if (!$this->_operkeyValidate($request->input('oper')))
                $this->_returnError('لطفا با حساب کاربری مدیر وارد شوید');

            // return view('Pages.nonAdminError');
            // return redirect()->route('nonAdminError');

            return $this->_sendOpenIDAuthenticationRequest($request);

            // return $this->_sendOpenIDAuthenticationRequest($request);
        }
        elseif ($this->_openID->mode === 'cancel')
        {
            $this->_returnError('تایید اعتبار توسط دفتر لغو شده است!');
        }
        else
        {
            if($this->_openID->validate())
            {
                $this->_openIDAttributes = $this->_openID->getAttributes();
                //    dd($this->_openIDAttributes);

                if(isset($this->_openIDAttributes['userkey']))
                {
                    $this->_getUserInfoFromPOS($request);

                    $output = $this->encrypt_decrypt('decrypt','%expkh*', $request->input('hash'));
                    // dd($output);
                    $array = explode(',', $output);
                    //dd($array);
                    if($array[1]!== $request->input('ver_code'))
                    {
                        $this->_returnError('تایید دفتر !');
                    }
                    $array=explode('|', $output);

                    //$array = array("C++", "C", "JavaScript", "jQuery", "PHP");
                    // $removedVal = array_slice($array, 0, -1);
                    // print_r($removedVal);
                    // dd($removedVal);
                    $this->_pkhRole= json_encode(array_slice($array, 0, -1));
                    return $this->_doLogin($request);
                }
                else
                {
                    $this->_returnError('اطلاعات هویتی شما در سرویس دهنده تعیین هویت اشتباه ثبت شده است!');
                }
            }
            else
            {
                $this->_returnError('تایید اعتبار توسط دفتر لغو شده است!');
            }
        }
    }

    private function _operkeyValidate($key)
    {
        if(strpos($key,'u') != null)
        {
            $code_array=explode('u',$key);

            /******* Sina modified *******/
//        if( $code_array[1] >= 1 && $code_array[1] <= 26) //Old code
            if( $code_array[1] >= 1 && $code_array[1] <= 99) //New code
            {
                $this->_operType=$code_array[1];
                return true;
            }
            return false;
        }
        else
            return false;
    }


    private function _sendOpenIDAuthenticationRequest(AuthRequest $request)
    {
        // We must FORCE consumer to use pishkhan authentication (identity) server
        $this->_openID->identity = 'http://auth.epishkhan.ir/identity/' .
            $request->input('oper');
        // $request->input('office');

        // We use AX protocol to get userkey from authentication (identity) server
        $this->_openID->required = ['userkey','operkey'];
        // $this->_openID->required = ['operkey'];

        // Sending redirect header to user's browser
        return redirect()->to($this->_openID->authUrl());
    }

    // private function _sendOpenIDAuthenticationRequest(PishkhanAuthRequest $request)
    // {
    //     // We must FORCE consumer to use pishkhan authentication (identity) server
    //     $this->_openID->identity = 'http://auth.epishkhan.ir/identity/' .
    //         $request->input('office');

    //     // We use AX protocol to get userkey from authentication (identity) server
    //     $this->_openID->required = ['userkey'];

    //     // Sending redirect header to user's browser
    //     return redirect()->to($this->_openID->authUrl());
    // }

    private function _getUserInfoFromPOS(AuthRequest $request)
    {
        // try {
        $result=ppgService::userInfo($request->input('ver_code'),$this->_openIDAttributes['userkey'],$this->_openIDAttributes['operkey']);

        //dd($result);
        if($result['statusCode'] == 200)
        {
            // return $validateResult['message'];
            $this->_userInfo=$result['data'];
        }
        elseif($result['statusCode'] == 500)
        {
            $this->_returnError( $result['message']);
        }
        else
        {
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
        //dd( $this->_userInfo);
        if (
            isset($this->_userInfo->office) &&
            // isset($this->_userInfo->operator) &&
            is_object($this->_userInfo->office)
            // is_object($this->_userInfo->operator) &&
        )
        {
            return true;
        }
        else
        {
            $this->_returnError('اطلاعات دفتر از سرویس واسط دریافت نمی شود!');
        }
        //  } catch (\Exception $e)
        //  {
        // dd($e->getMessage());
        //     Log::emergency('Occurrence point => AuthController (_getUserInfoFromPOS method) ***** ' . $e->getMessage());
        //     $this->_returnError('اطلاعات دفتر از سرویس واسط دریافت نمی شود!');
        // }
    }

    private function _doLogin(PishkhanAuthRequest $request)
    {
        // dd($this->_operType);
        $helper = new HelperController();
        $userRepo = new UserRepository();
        // $loginCodeRepo = new LoginCodeRepository();
        $accessTokenRepo = new AccessTokenRepository();
        $userInfo = $userRepo->getByOfficeID($this->_openIDAttributes['userkey']);
        // dd('test');
        if(is_null($userInfo))
        {
            $this->_userID = $this->_registerUser($userRepo,$request);
        }
        elseif (is_object($userInfo))
        {
            $this->_userID = $userInfo->id;

            // if (Carbon::parse($userInfo->updated_at)->diffInDays(date('Y-m-d H:i:s')) > 1)
            // {
            $this->_updateUser($userRepo,$request);
            // }
            // $this->_setLoginLog($request);
            // $this->_setLoginSession($request);
            // $request->session()->save();
            // // return redirect()->route('dashboard');
        }
        else
        {
            $this->_returnError('عملیات ورود با خطا مواحه شد!');
        }

        $this->_setLoginSession($request);
        $request->session()->save();
        // return $userInfo;
        // return   $this->_userID;
        $this->_setLoginLog($request);

        $token=$helper->generateToken();
        $logedinUser=$userRepo->updateUsersToken($this->_userID,$token);
        // return $logedinUser;
        $accessTokenRepo->save($this->_userID,$this->_openIDAttributes['userkey'],$token);
        $userInfo = $userRepo->getByOfficeID($this->_openIDAttributes['userkey']);

        $login_code=rand(1000000,99999999);

        $userRepo->updateByOfficeID(
            $this->_openIDAttributes['userkey'],
            [
                'login_code' => $login_code,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        //
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
        return redirect()->away('https://www.bime-epishkhan.ir/?login_code='.$login_code);

        //new codes for redirects =>try it later

        // $response = Http::withToken($token)->get('http://pkhinsui.icsdev.ir', [
        //     'office_code' => $this->_userInfo->office[0],
        // ]);
        // $response->redirect();
    }

    private function _registerUser(UserRepository $userRepo,pishkhanAuthRequest $request)
    {
        $this->_userID = $userRepo->save(
            [
                'office_id' => $this->_openIDAttributes['userkey'],
                'opr_id' => $this->_userInfo->operator->id,
                'office_code' => $this->_userInfo->office->code,
                'first_name' => $this->_userInfo->office->ceo_fname,
                'last_name' => $this->_userInfo->office->ceo_lname,
                'mobile' => $this->_userInfo->office->ceo_cell,
                'tel_code' => $this->_userInfo->office->tel_code,
                'tel' => $this->_userInfo->office->tel,
                'national_id' => $this->_userInfo->office->ceo_ssn,
                'email' => $this->_userInfo->office->ceo_email,
                'postal_code' =>  $this->_userInfo->office->zip_code,
                'address' => $this->_userInfo->office->address,
                'province_id' => $this->_userInfo->office->province_id,
                'province' =>  $this->_userInfo->office->province_name,
                'city_id' =>  $this->_userInfo->office->city_id,
                'city' =>  $this->_userInfo->office->city_name,
                'fax' =>  $this->_userInfo->office->fax,
                'balance' =>  $this->_userInfo->office->credit,
                'legal_type' =>  $this->_userInfo->office->legal_type,
                'legal_name' =>  $this->_userInfo->office->legal_name,
                'legal_id' =>  $this->_userInfo->office->legal_id,
                'opr_type' =>  explode('u', $this->_userInfo->operator->code)[1],
                'ver_code' => $request->input('ver_code'),
                'pkh_role' => $this->_pkhRole,
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        if(is_integer($this->_userID))
        {
            return true;
        }
        //????????????????????????????????????????????????????????????????????????????????????????????????????????
        $this->_returnError('خطا در ثبت اطلاعات دفتر!');
    }

    private function _updateUser(UserRepository $userRepo, pishkhanAuthRequest $request)
    {

        if($userRepo->updateByOfficeID(
            $this->_openIDAttributes['userkey'],
            [
                'opr_id' =>  $this->_userInfo->operator->id,
                'office_code' => $this->_userInfo->office->code,
                'first_name' => $this->_userInfo->office->ceo_fname,
                'last_name' => $this->_userInfo->office->ceo_lname,
                'mobile' => $this->_userInfo->office->ceo_cell,
                'tel_code' => $this->_userInfo->office->tel_code,
                'tel' => $this->_userInfo->office->tel,
                'national_id' => $this->_userInfo->office->ceo_ssn,
                'email' => $this->_userInfo->office->ceo_email,
                'postal_code' =>  $this->_userInfo->office->zip_code,
                'address' => $this->_userInfo->office->address,
                'province_id' => $this->_userInfo->office->province_id,
                'province' =>  $this->_userInfo->office->province_name,
                'city_id' =>  $this->_userInfo->office->city_id,
                'city' =>  $this->_userInfo->office->city_name,
                'fax' =>  $this->_userInfo->office->fax,
                'balance' =>  $this->_userInfo->office->credit,
                'legal_type' =>  $this->_userInfo->office->legal_type,
                'legal_name' =>  $this->_userInfo->office->legal_name,
                'legal_id' =>  $this->_userInfo->office->legal_id,
                'opr_type' =>explode('u', $this->_userInfo->operator->code)[1],
                'pkh_role' => $this->_pkhRole,
                'ver_code' => $request->input('ver_code'),
                'active' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ))
        {
            // dd( $this->_openIDAttributes['userkey']);

            return true;
        }

        $this->_returnError('خطا در بروزرسانی اطلاعات دفتر!');
    }

    private function _setLoginSession(PishkhanAuthRequest $request)
    {
        $request->session()->put(
            'pishkhan_auth',
            [
                'user_id' => $this->_userID,
                'office_id' => $this->_openIDAttributes['userkey'],
                'opr_id' => $this->_userInfo->operator->id,
                'office_code' => $this->_userInfo->office->code,
                'first_name' => $this->_userInfo->office->ceo_fname,
                'last_name' => $this->_userInfo->office->ceo_lname,
                'mobile' => $this->_userInfo->office->ceo_cell,
                'tel_code' => $this->_userInfo->office->tel_code,
                'tel' => $this->_userInfo->office->tel,
                'national_id' => $this->_userInfo->office->ceo_ssn,
                'email' => $this->_userInfo->office->ceo_email,
                'postal_code' =>  $this->_userInfo->office->zip_code,
                'address' => $this->_userInfo->office->address,
                'province_id' => $this->_userInfo->office->province_id,
                'province' =>  $this->_userInfo->office->province_name,
                'city_id' =>  $this->_userInfo->office->city_id,
                'city' =>  $this->_userInfo->office->city_name,
                'fax' =>  $this->_userInfo->office->fax,
                'balance' =>  $this->_userInfo->office->credit,
                'legal_type' =>  $this->_userInfo->office->legal_type,
                'legal_name' =>  $this->_userInfo->office->legal_name,
                'legal_id' =>  $this->_userInfo->office->legal_id,
                'opr_type' =>  explode('u', $this->_userInfo->operator->code)[1],
                'ver_code' => $request->input('ver_code'),
                'active' => 1,
                'ip' => $request->ip(),
                'ver_code' => $request->input('ver_code'),
                'pkh_role' => $this->_pkhRole,
                'last_login' => date('Y-m-d H:i:s'),
                'expiration_time' => Carbon::parse(date('Y-m-d H:i:s'))->addHours(2)->format('Y:m:d H:i:s'),

            ]
        );

        // $request->session()->put('welcome', $this->_userInfo->office[2] . ' ' . $this->_userInfo->office[3]);
    }

    private function _setLoginLog(PishkhanAuthRequest $request)
    {
        if (LoginLogController::logger(
            [
                'user_id' => $this->_userID,
                'opr_id' => 0,
                'username' => '',
                'ip' => $request->ip(),
                'browser' => $request->header('User-Agent'),
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ))
        {
            return true;
        }

        $this->_returnError('خطا در ثبت گزارش ورود دفتر!');
    }


    public function logout(Request $request)
    {
        $accessToken = $request->bearerToken();
        $accessTokenRepo = new AccessTokenRepository();
        $accessTokenRepo->deactiveToken($accessToken);
        $userRepo = new UserRepository();
        $userRepo->deactiveToken($accessToken);

        // $userRepo->updateByOfficeID(
        //     $user->office_id,
        //     [
        //        'login_code' =>null,
        //        'updated_at' => date('Y-m-d H:i:s'),
        //     ]
        //     );

        if (config('app.env') === 'production')
            $url = 'http://epishkhan.ir';
        else
            $url = 'http://dev.epishkhan.ir';

        // return response()->json(['url' => $url], 200, [], JSON_UNESCAPED_UNICODE);
        return response()->json([
            'status'=> true,
            'message' => 'خروج با موفقیت انجام شد',
            'code'=> 200,
            'data'=> null,
            'redirectUrl' => $url
        ],
            200);
    }

    private function _returnError(string $message)
    {
        header('Content-Type: text/html; charset=utf-8');
        die('<h1>' . $message . '</h1>');
    }

    public function getLoginCode(Request $request)
    {

        $userRepo = new UserRepository();
        // return $request;
        $user=$userRepo->getUserByLoginCode($request->login_code);
        // return $user;
        if($user != null && $user->token != null)
        {
            $data=[
                'token'=> $user->token,
                'operator_type'=> $user->opr_type,
                'office_code'=> $user->office_code,
                'full_name'=> $user->first_name.' '.$user->last_name,
            ];

            $userRepo->updateByOfficeID(
                $user->office_id,
                [
                    'login_code' =>null,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            );

            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'اطلاعات کاربر ارسال گردید ',
                'data' => $data,
                'redirectUrl' => null
            ],
                200);
        }
        return response()->json([
            'status' => false,
            'code' => 401,
            'message' => 'ورود شما مجاز نیست',
            'data' => null,
            'redirectUrl' => 'http://dev.epishkhan.ir',
        ],
            401);

    }

    public function fetchUserInfo($accessToken)
    {
        $office=new UserRepository;
        return $office->getUserByToken($accessToken);
    }

    // public function oneTimeToken($offi)
    // {
    //     $disposable_token=$helper->generateToken();
    //     $disposableTokenRepo = new DisposableTokenRepository();

    //     $disposableTokenRepo->saveToken($this->_userInfo->office->code,$this->_userID,$disposable_token);
    // }

    public function validateToken(Request $request)
    {
        // Artisan::call('route:cache');
        // return 'Routes cache has clear successfully !';

        if(empty($request->office_code) || empty($request->token))
        {
            return response()->json([
                'status' => false,
                'code' => -5,
                'message' => 'فیلد token و office_code اجباری می باشد  ',
                'data' => null
            ],
                400);
        }

        $disposableTokenRepo = new DisposableTokenRepository();
        $res=$disposableTokenRepo->fetchTokenStatus($request->office_code,$request->token);
        if(!$res)
        {
            return response()->json([
                'status' => false,
                'code' => -1,
                'message' => 'همچین توکنی برای این دفتر موجود نمی باشد',
                'data' => null
            ],
                200);
        }
        else
        {
            if($res->valid == -1)
            {
                return response()->json([
                    'status' => false,
                    'code' => -2,
                    'message' => ' این توکن قبلا استفاده شده است',
                    'data' => null
                ],
                    200);
            }
            else
            {
                $disposableTokenRepo->deactiveToken($res->id);
                return response()->json([
                    'status' => true,
                    'code' => 1,
                    'message' => 'توکن معتبر می باشد' ,
                    'data' => ['valid'=>1]
                ],
                    200);
            }
        }
    }

    function encrypt_decrypt($action,$key,$string ) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = $key;
        $secret_iv = '1234567890#';
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}

