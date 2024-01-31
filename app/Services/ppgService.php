<?php

namespace App\Services;

use App\Repositories\TransactionLogRepository;
use Illuminate\Http\Request as HttpRequest;
use App\Http\Controllers\Pishkhan\PishkhanController;
use App\Repositories\ServiceLogRepository;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
class ppgService
{
    private static $_config = [];
    private static $_response = null;
    private static $_authData = null;
    private static $_log = null;
    private static $_serviceLog = null;
    private static $_logData = null;
    public static function validate($token)
    {
            self::_init();
            self::_init2($token);
            $requestContent = [
                'domain' => self::$_config['domain'],
                'password' => self::$_config['password'],
                'ver_code' => self::$_authData['ver_code'],
                'user_key' => self::$_authData['office_id'],
                'service_id' => self::$_config['validate_service_id'],
            ];
                // self::$_logData['request_content'] = json_encode($requestContent);
                // self::$_logData['method_name'] = 'userinfo';
            try
            {
                // call userinfo method from  service and get user information ...
                self::$_response = Http::withHeaders([
                    'X-API-KEY' => self::$_config['headers']['X-API-KEY'],
                ])
                ->withBasicAuth(self::$_config['api_username'], self::$_config['api_password'])
                ->timeout(45)
                ->post(self::$_config['api_url'].'/validate', [
                        "auth"=>[
                            "domain"=> $requestContent['domain'],
                            "pass"=> $requestContent['password'],
                            "service_id"=> $requestContent['service_id'],
                        ],
                        "user"=>[
                            "ver_code"=> $requestContent['ver_code'],
                            "user_key"=> $requestContent['user_key'],
                        ]
                ]);

                // self::$_logData['response_code'] = 200;
                // self::$_logData['success'] = 1;
                // self::$_logData['response_content'] = json_encode(self::$_response);
                // return self::$_response->result;
                $result =  json_decode( self::$_response->body());
                // dd($result , self::$_response->status() , self::$_response->body());
                $resultStatus =  json_decode(self::$_response->status());

                if( self::$_response->status() >= 500)
                {
                    return ['statusCode' => 408 ,  'message' => 'خطا در برقراری ارتباط '];
                }

                if($result->success)
                {
                    return ['statusCode' => 200 , 'message' => 'دفتر معتبر می باشد','data'=> $result->data];
                }
                else
                {
                    return ['statusCode' => 406 , 'message' => 'دفتر نامعتبر است'];
                }
        }
        catch (\Exception $e)
        {
            return ['statusCode' => 500 , 'message' => 'سرویس درگاه پرداخت پیشخوان در دسترس نیست . لطفا لحظاتی بعد مجددا سعی نمایید .!'];
        }
    }
    public static function registerPaymentPay($token,$order_id,$total_amount,$service_id)
    {
            self::_init();
            self::_init2($token);
            // if($service_id == 1033)
            // {
            //     $total_amount=12000;
            // }
            // return self::$_config;
            $requestContent = [
                'domain' => self::$_config['domain'],
                'password' => self::$_config['password'],
                'ver_code' =>  self::$_authData->ver_code,
                'user_key' => self::$_authData->office_id,
                'service_id' => $service_id,
                'ssn' => self::$_authData->national_id,
                'cell' => self::$_authData->mobile,
                'customer_name' => self::$_authData->first_name.' '.self::$_authData->last_name,
                "pay_type"=> 3,
                "total_amount" =>$total_amount,
                "office_income" => 0,//todo dynamic
                "order_id" => $order_id
            ];
           // var_dump($requestContent['service_id']);
            // return $requestContent;
            // self::$_logData['service_id'] = self::$_config['registerpayment_service_id'];
            self::$_logData['request_code'] = $order_id;
            self::$_logData['request_content'] = json_encode($requestContent);
            self::$_logData['method_name'] = 'registerPayment';

            try {
                self::$_response = Http::withHeaders([
                    'X-API-KEY' => self::$_config['headers']['X-API-KEY'],
                ])
                ->withBasicAuth(self::$_config['api_username'], self::$_config['api_password'])
                ->timeout(45)
                // ->debug()
                ->post(self::$_config['api_url'].'/registerpayment', [
                        "auth"=>[
                            "domain"=> $requestContent['domain'],
                            "pass"=> $requestContent['password'],
                            "service_id"=> $requestContent['service_id'],
                        ],
                        "user"=>[
                            "ver_code"=> $requestContent['ver_code'],
                            "user_key"=> $requestContent['user_key'],
                        ],
                        "order"=>[
                            "id"=> $order_id,
                            "ssn"=> $requestContent['ssn'],
                            "cell"=> $requestContent['cell'],
                            "customer_name"=> $requestContent['customer_name'],
                            "pay_type"=>  $requestContent['pay_type'],
                            "total_amount" =>$total_amount,
                            "office_income" => $requestContent['office_income']
                        ],
                ]);

                self::$_logData['response_code'] = 200;
                self::$_logData['success'] = 1;
                self::$_logData['response_content'] = json_encode(
                    self::$_response->body()
                );

                $result = json_decode(self::$_response->body());
                // return $result;

                $resultStatus = json_decode(self::$_response->status());
                //var_dump($result);die;
                if( self::$_response->status() >= 500)
                {
                    return ['statusCode' => 408 ,  'message' => 'خطا در برقراری ارتباط '];
                }
                // dd($resultStatus);
                if($result->success )
                {
                    return ['statusCode' => 200 , 'message' => 'اطلاعات کاربر با موفقیت ارسال شد','data'=> $result->data];
                }
                else
                {
                    if(isset($result->data))
                    {
                        return ['statusCode' => 200 , 'message' => 'اطلاعات کاربر با موفقیت ارسال شد','data'=> $result->data];
                    }
                    elseif($result->code == -12)
                    {
                        return ['statusCode' => 406 , 'message' => ' اطلاعات کاربر ناقص است'];
                    }
                    elseif($result->code == -13)
                    {
                        return ['statusCode' => 406 , 'message' => 'اطلاعات درخواست ناقص است'];
                    }
                    elseif($result->code == -23)
                    {
                        return ['statusCode' => 406 , 'message' => 'این سرویس به این دامنه تعلق ندارد'];
                    }
                    elseif( $result->code <= -31 && $result->code >= -39)
                    {
                        return ['statusCode' => 406 , 'message' => ' کاربر خطای اعتبار سنجی دارد'];
                    }
                    elseif( $result->code <= -41 && $result->code >= -49)
                    {
                        return ['statusCode' => 406 , 'message' => 'درخواست خطای اعتبار سنجی دارد'];
                    }
                    elseif( $result->code <= -100 )
                    {
                        return ['statusCode' => 406 , 'message' => ' خطای پایگاه داده'];
                    }
                }
            }
            catch (\Exception $e)
            {
                self::$_logData['response_code'] = 500;
                self::$_logData['success'] = -1;
                self::$_logData['response_content'] = json_encode(
                    ['Exception Message' => $e->getMessage()]
                );
                return ['statusCode' => 500 , 'message' => 'سرویس  درگاه پرداخت پیشخوان در دسترس نیست . لطفا لحظاتی بعد مجددا سعی نمایید .!'];
            }
            finally {
                Log::channel('pkhins_transaction_webservice_result')
                    ->info(json_encode(self::$_logData));
                self::$_log->save(self::$_logData);
            }
        // return false;
    }
    public static function registerPaymentCall($token,$order_id,$pay_type)
    {
        // dd($order_id);
            self::_init();
            self::_init2($token);
            $requestContent = [
                'domain' => self::$_config['domain'],
                'password' => self::$_config['password'],
                'ver_code' =>  self::$_authData->ver_code,
                'user_key' => self::$_authData->office_id,
                'service_id' => self::$_config['registerpayment_service_id'],
                'ssn' => self::$_authData->national_id,
                'cell' => self::$_authData->mobile,
                'customer_name' => self::$_authData->first_name.' '.self::$_authData->last_name,
                'pay_type' => $pay_type
            ];
            // dd( $requestContent );
            self::$_logData['request_code'] = $order_id;

            self::$_logData['request_content'] = json_encode($requestContent);
            self::$_logData['method_name'] = 'registerPayment';
            try {
                self::$_response = Http::withHeaders([
                    'X-API-KEY' => self::$_config['headers']['X-API-KEY'],
                ])
                ->withBasicAuth(self::$_config['api_username'], self::$_config['api_password'])
                ->timeout(45)
                // ->debug()
                ->post(self::$_config['api_url'].'/registerpayment', [
                        "auth"=>[
                            "domain"=> $requestContent['domain'],
                            "pass"=> $requestContent['password'],
                            "service_id"=> $requestContent['service_id'],
                        ],
                        "user"=>[
                            "ver_code"=> $requestContent['ver_code'],
                            "user_key"=> $requestContent['user_key'],
                        ],
                        "order"=>[
                            "id"=> $order_id,
                            "ssn"=> $requestContent['ssn'],
                            "cell"=> $requestContent['cell'],
                            "customer_name"=> $requestContent['customer_name'],
                            "pay_type"=> $pay_type
                        ],
                ]);

                self::$_logData['response_code'] = 200;
                self::$_logData['success'] = 1;
                self::$_logData['response_content'] = json_encode(
                    self::$_response->body()
                );

                $result = json_decode(self::$_response->body());
                // dd($result);

                $resultStatus = json_decode(self::$_response->status());

                if($result->success )
                {
                    return ['statusCode' => 200 , 'message' => 'اطلاعات کاربر با موفقیت ارسال شد','data'=> $result->data];
                }
                else
                {
                    if(isset($result->data))
                    {
                        return ['statusCode' => 200 , 'message' => 'اطلاعات کاربر با موفقیت ارسال شد','data'=> $result->data];

                    }
                    elseif($result->code == -12)
                    {
                        return ['statusCode' => 406 , 'message' => ' اطلاعات کاربر ناقص است'];

                    }
                    elseif($result->code == -13)
                    {
                        return ['statusCode' => 406 , 'message' => 'اطلاعات درخواست ناقص است'];

                    }
                    elseif( $result->code <= -31 && $result->code >= -39)
                    {
                        return ['statusCode' => 406 , 'message' => ' کاربر خطای اعتبار سنجی دارد'];

                    }
                    elseif( $result->code <= -41 && $result->code >= -49)
                    {
                        return ['statusCode' => 406 , 'message' => 'درخواست خطای اعتبار سنجی دارد'];

                    }
                    elseif( $result->code <= -100 )
                    {
                        return ['statusCode' => 406 , 'message' => ' خطای پایگاه داده'];

                    }

                }
            }
            catch (\Exception $e)
            {
                self::$_logData['response_code'] = 500;
                self::$_logData['success'] = -1;
                self::$_logData['response_content'] = json_encode(
                    ['Exception Message' => $e->getMessage()]
                );
                return ['statusCode' => 500 , 'message' => 'سرویس  درگاه پرداخت پیشخوان در دسترس نیست . لطفا لحظاتی بعد مجددا سعی نمایید .!'];

            }
            finally{
                Log::channel('pkhins_transaction_webservice_result')
                ->info(json_encode(self::$_logData));
                self::$_log->save(self::$_logData);
            }

        // return false;
    }
    public static function paymentStatus($token,$order_id,$serial,$service_id)
    {
        self::_init();
        self::_init2($token);

        $requestContent = [
            'domain' => self::$_config['domain'],
            'password' => self::$_config['password'],
            'service_id' => $service_id,
            "order_id"=> $order_id,
            "serial"=>$serial,
        ];
        self::$_logData['request_code'] = $order_id;
        self::$_logData['request_content'] = json_encode($requestContent);
        self::$_logData['method_name'] = 'paymentStatus';

        try
        {
            self::$_response = Http::withHeaders([
                'X-API-KEY' => self::$_config['headers']['X-API-KEY'],
            ])
            ->withBasicAuth(self::$_config['api_username'], self::$_config['api_password'])
            ->timeout(45)
            ->post(self::$_config['api_url'].'/paymentstatus', [
                "auth"=>[
                    "domain"=> $requestContent['domain'],
                    "pass"=> $requestContent['password'],
                    "service_id"=> $requestContent['service_id']
                ],
                "order_id"=> $order_id,
                "serial"=>$serial,
            ]);

            self::$_logData['response_code'] = 200;
            self::$_logData['success'] = 1;
            self::$_logData['response_content'] = json_encode(
                self::$_response->body()
            );

            $result =  json_decode(self::$_response->body());
            $resultStatus =  json_decode(self::$_response->status());
            // dd( $result,$resultStatus);
            if($result->success)
            {
                return ['statusCode' => 200 , 'message' => 'اطلاعات کاربر با موفقیت ارسال شد','data'=> $result->data];
            }
            else
            {
                if($result->code == -14)
                {
                    return ['statusCode' => 406 , 'message' => ' شناسه درخواست ارسال نشده است  '];
                }
                elseif($result->code == -16)
                {
                    return ['statusCode' => 406 , 'message' => '.دارند سنجی اعتبار خطای ها و'];
                }
                elseif( $result->code == -200)
                {
                    return ['statusCode' => 406 , 'message' => ' کد پرداخت نامعتبر است '];
                }
                elseif( $result->code == -201)
                {
                    return ['statusCode' => 406 , 'message' => 'شناسه فاکتور نا معتبر است.'];
                }
                elseif( $result->code == -202)
                {
                    return ['statusCode' => 406 , 'message' => ' است نامعتبر سرویس شناسه '];
                }

            }
        }
        catch (\Exception $e)
        {
            self::$_logData['response_code'] = 500;
            self::$_logData['success'] = -1;
            self::$_logData['response_content'] = json_encode(
                ['Exception Message' => $e->getMessage()]
            );
            return ['statusCode' => 500 , 'message' => 'سرویس  درگاه پرداخت پیشخوان در دسترس نیست . لطفا لحظاتی بعد مجددا سعی نمایید .!'];
        }
        finally {
            Log::channel('pkhins_transaction_webservice_result')
                ->info(json_encode(self::$_logData));
            self::$_log->save(self::$_logData);
        }

    }
    public static function userInfo($ver_code,$user_key,$oper_key)
    {
        self::_init();
        // return self::$_config;
        $requestContent = [
            'url' =>self::$_config['api_url'].'/userinfo',
            'domain' => self::$_config['domain'],
            'password' => self::$_config['password'],
            'api_username' => self::$_config['api_username'],
            'api_password' => self::$_config['api_password'],
            'ver_code' => $ver_code,
            'user_key' => $user_key,
            'oper_key' => $oper_key,
            'service_id' => self::$_config['userinfo_service_id'],
            'X-API-KEY'=>self::$_config['headers']['X-API-KEY']
        ];

        self::$_logData['request_content'] = json_encode($requestContent);
        self::$_logData['method_name'] = 'userInfo';
        self::$_logData['office_id'] = $requestContent['user_key'];
        self::$_logData['ip_address'] = Request::ip();

        // dd($requestContent);
         try{
                // call userinfo method from  service and get user information ...
            self::$_response = Http::withHeaders([
                'X-API-KEY' => self::$_config['headers']['X-API-KEY'],
            ])
            ->withBasicAuth(self::$_config['api_username'] , self::$_config['api_password'] )
            ->timeout(45)
            ->post(self::$_config['api_url'].'/userinfo', [
                    "auth"=>[
                        "domain"=> $requestContent['domain'],
                        "pass"=> $requestContent['password'],
                        "service_id"=> $requestContent['service_id'],
                    ],
                    "user"=>[
                        "ver_code" => $requestContent['ver_code'],
                        "user_key" => $requestContent['user_key'],
                        'oper_key' => $requestContent['oper_key'],
                    ]
            ]);

            // dd(self::$_response->body());
            // dd(self::$_response->body());
            $result = json_decode(self::$_response->body());
            // dd(self::$_response->status());
            $resultStatus =  json_decode(self::$_response->status());
            self::$_logData['response_code'] =$resultStatus;
            self::$_logData['success'] = 1;
            self::$_logData['response_content'] = json_encode(
                self::$_response->body()
            );

            if($result->success)
            {
                return ['statusCode' => 200 , 'message' => 'اطلاعات کاربر ارسال گردید','data'=> $result->data];
            }
            else
            {
                if($result->code >= -11 && $result->code <= -19)
                {
                    return ['statusCode' => 406 , 'message' => 'اطلاعات احراز هویت  کامل نمی باشد ','data'=> $result->data];
                }
                elseif( $result->code >= -21 && $result->code <= -29)
                {
                    return ['statusCode' => 406 , 'message' => 'اطلاعات درخواست کامل نمی باشد','data'=> $result->data];
                }
            }
        }
        catch (\Exception $e)
        {
            self::$_logData['response_code'] = 500;
            self::$_logData['success'] = -1;
            self::$_logData['response_content'] = json_encode(
                ['Exception Message' => $e->getMessage()]
            );
            return ['statusCode' => 500 , 'message' => 'سرویس درگاه پرداخت پیشخوان  در دسترس نیست . لطفا لحظاتی بعد مجددا سعی نمایید .!'];
        }
        finally {
            // var_dump(self::$_logData);die;
            Log::channel('pkhins_webservice_result')
                ->info(json_encode(self::$_logData));
            self::$_serviceLog->save(self::$_logData);
        }
    }
    private static function _init()
    {
        if (config('app.env') === 'production')
        {
            self::$_config = config('ppg.production');
        }
        else
        {
          self::$_config = config('ppg.local');
        }
        self::$_log = new TransactionLogRepository;

        self::$_serviceLog = new ServiceLogRepository;

        // dd(self::$_authData);
        // self::$_authData = session()->get('pishkhan_auth');
    }
    private static function _init2($accessToken)
    {
        $auth = new PishkhanController;
        self::$_authData=$auth->fetchUserInfo($accessToken);
        self::$_logData = [
            'office_id' => self::$_authData->office_id,
            'office_code'    => self::$_authData->office_code,
            'ip_address'     => Request::ip(),
            'created_at' => Carbon::now(),
        ];
    }
}


