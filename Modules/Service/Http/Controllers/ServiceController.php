<?php

namespace Modules\Service\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Modules\Service\Entities\BackgroundCertificate;
use Modules\Service\Entities\CertificateOriginality;
use phpseclib3\Crypt\Common\StreamCipher;
use function Laravel\Prompts\alert;

class ServiceController extends Controller
{
    private const MESSAGE = [
        'success' => [
            'کد یکبار مصرف ارسال شد',
        ],

        'error' => [
            'سامانه به طور موقت از دسترس خارج شده است، بعدا تلاش کنید',
            'تاریخ انقضای کد یکبار مصرف تمام شده است، مجددا تلاش کنید',
            'ثبت درخواست استعلام ناموفق بود',
            'کد پیگیری قابل بازیابی نیست',
            'در دریافت استعلام نهایی خطایی پیش آمده',
            'سرویس برای مدت کوتاهی از دسترس خارج شده، لطفا بعدا تلاش کنید',
            'سررویس استعلام فعلا غیر فعال است، لطفا به'
        ]
    ];

    private const CACHEPREFIX = 'personInfo:';

    private const PaidStatus = [
        -1, // An Error Occur and Not Payable
        0, // Not Any Error and Waiting For Payment to Show Result
        1 // Payment Was Completed
    ];

    private const PersonStatus = [
        'realPerson'  => 1,
        'legalPerson' => 2,
    ];

    private $trackingCode = NULL;

    private array $config = [];

    public function __construct()
    {
        $this->getConfig();
    }


    public function create(Request $request)
    {
        //Prevent user access if otpCode expired or user tries to access direct to this route without get otpCode.
        if (!Cache::has(self::CACHEPREFIX . $request->session()->get('hashId'))) {
            session()->forget('hashId');

            return redirect()->route('panel');
        }

        return view('dashboard::dashboard.trading-credit-inquiry', ['hashId' => $request->session()->get('hashId')])->with('success', self::MESSAGE['success'][0]);
    }


    public function store(Request $request)
    {
        //todo use form request
        if (!Cache::has(self::CACHEPREFIX . $request->hash_id)) {
            return redirect()
                ->route('panel')
                ->withErrors(self::MESSAGE['error'][1]);
        }

        $personInfo = json_decode(Cache::get(self::CACHEPREFIX . $request->hash_id), TRUE);

        try {
            $httpResult = Http::withBasicAuth($this->config['Username'], $this->config['Password'])
                ->withHeaders([
                    'X-API-KEY'    => $this->config['X-API-KEY'],
                    'Content-Type' => 'application/json'
                ])
                ->asJson()
                ->post($this->config['baseURL'] . '/gwaggregateg/aggregate', [
                    'usernationalCode'         => $request->receiver_national_id,
                    'organizationNationalCode' => $request->organization_id,
                    'postName'                 => $request->receiver_job_title,
                    'personTyp'                => (string)self::PersonStatus[$request->person_status],
                    'otp'                      => $request->otp_code,
                ]);

            //Returned response from API hase false
            $httpResultResponse = json_decode($httpResult->body(), TRUE);

            if ((bool)$httpResultResponse['status'] === FALSE) {
                Log::channel('service')->error('Register Inquiry | Error', [
                    'person_status'        => self::PersonStatus[$request->person_status] . ' | ' . $request->person_status,
                    'receiver_national_id' => $request->receiver_national_id,
                    'organization_id'      => $request->organization_id,
                    'receiver_job_title'   => $request->receiver_job_title,
                    'office_code'          => $request->office_id,
                    'otp_code'             => $request->otp_code,
                    'systemMessage'        => $httpResultResponse['message'],
                    'systemDebugMessage'   => $httpResultResponse['debug'],
                    'created_at'           => Carbon::now()
                ]);

                return redirect()->back()->withErrors(self::MESSAGE['error'][5]);
            }

            //Extract the trackingCode from API response and fill the "$this->trackingCode"
            $this->extractTrackingCode($httpResultResponse);

            if (is_null($this->trackingCode)) {
                return redirect()->back()->withErrors(self::MESSAGE['error'][3]);
            }

            $result = BackgroundCertificate::create([
                'person_national_id'   => $personInfo['nationalId'],
                'person_cellphone'     => $personInfo['cellphone'],
                'person_status'        => $request->person_status,
                'receiver_national_id' => $request->receiver_national_id,
                'organization_id'      => $request->organization_id,
                'receiver_job_title'   => $request->receiver_job_title,
                'office_code'          => $request->office_id,
                'otp_code'             => $request->otp_code,
                'tracking_id'          => $this->trackingCode,
                'final_message'        => NULL,
                'paid'                 => self::PaidStatus[1]
            ]);

            Log::channel('service')->info('Register Inquiry | Success', [
                'inserted_row'       => $result,
                'created_at'         => Carbon::now(),
                'persian_created_at' => Carbon::now(),
            ]);

            try {
                $finalHttpRequest = Http::withBasicAuth($this->config['Username'], $this->config['Password'])
                    ->withHeaders([
                        'X-API-KEY'    => $this->config['X-API-KEY'],
                        'Content-Type' => 'application/json'
                    ])
                    ->asJson()
                    ->post($this->config['baseURL'] . '/gwaggregateg/statusaggregate', [
                        'trackingId' => $this->trackingCode
                    ]);

                $finalResult = $finalHttpRequest->body();
                $finalResultAsArray = json_decode($finalResult, TRUE);

                if ((int)$finalResultAsArray['code'] === 200 || (int)$finalResultAsArray['code'] === 202) {
                    // todo create "transaction record" and get transaction_id for payment
                    // todo go to pos payment

                    BackgroundCertificate::where('id', $result->id)
                        ->where('tracking_id', $this->trackingCode)
                        ->where('paid', '<>', 1)
                        ->update([
                            'final_message' => $finalResultAsArray['data'],
                            'paid'          => 1
                        ]);

                    Log::channel('service')->info('Final Inquiry Result | Success', [
                        'tracking_id'     => $this->trackingCode,
                        'office_code'     => '',
                        'username'        => '',
                        'systemMessage_1' => $finalResultAsArray['message'],
                        'systemMessage_2' => $finalResultAsArray['data'],
                        'created_at'      => Carbon::now()
                    ]);

                    return view('dashboard::dashboard.inquiry-result', ['finalMessage' => $finalResultAsArray['data']]);

                } else {
                    Log::channel('service')->error('Final Inquiry Result | Error', [
                        'tracking_id'     => $this->trackingCode,
                        'office_code'     => '',
                        'username'        => '',
                        'systemMessage_2' => $finalResultAsArray['message'],
                        'systemMessage_1' => $finalResultAsArray['data'],
                        'created_at'      => Carbon::now()
                    ]);

                    return redirect()->back()->withErrors($finalResultAsArray['data']);
                }

            } catch (\Exception $exception) {
                Log::channel('service')->emergency('Final Inquiry Result | Error', [
                    'tracking_id'   => $this->trackingCode,
                    'office_code'   => '',
                    'username'      => '',
                    'systemMessage' => $exception->getMessage(),
                    'created_at'    => Carbon::now()
                ]);

                return redirect()->back()->withErrors(self::MESSAGE['error'][4]);
            }

        } catch (\Exception $exception) {
            Log::channel('service')->error('Register Inquiry | Error', [
                'person_status'        => $request->person_status,
                'receiver_national_id' => $request->receiver_national_id,
                'organization_id'      => $request->organization_id,
                'receiver_job_title'   => $request->receiver_job_title,
                'office_code'          => $request->office_id,
                'otp_code'             => $request->otp_code,
                'systemMessage'        => $exception->getMessage(),
                'created_at'           => Carbon::now()
            ]);

            return redirect()
                ->route('panel')
                ->withErrors(self::MESSAGE['error'][2]);
        }
    }


    public function getConfig()
    {
        if (config('app.env') === 'production') {
            $this->config = config('inquiry.production');
        } elseif (config('app.env') === 'local') {
            $this->config = config('inquiry.local');
        }
    }


    public function getOTPCode(Request $request)
    {
        //todo add form request
        try {
            $result = Http::withBasicAuth($this->config['Username'], $this->config['Password'])
                ->withHeaders([
                    'X-API-KEY'    => $this->config['X-API-KEY'],
                    'Content-Type' => 'application/json'
                ])
                ->asJson()
                ->post($this->config['baseURL'] . '/gwaggregateg/otp', [
                    'nationalId' => $request->national_id,
                    'cellphone'  => $request->cellphone,
                ]);

            $httpResult = json_decode($result, TRUE);
            if ((bool)$httpResult['status'] === FALSE) {
                Log::channel('service')->emergency('Get OTP Code | Error', [
                    'nationalId'         => $request->national_id,
                    'cellphone'          => $request->cellphone,
                    'office_code'        => '',
                    'username'           => '',
                    'systemMessage'      => $httpResult['message'],
                    'systemDebugMessage' => $httpResult['debug'] ?? NULL,
                    'created_at'         => Carbon::now()
                ]);

                return redirect()->back()->withErrors($httpResult['message']);
            }

            $personInfo = [
                'nationalId' => $request->national_id,
                'cellphone'  => $request->cellphone,
            ];
            //
            $hashId = md5($request->national_id);
            Session::put('hashId', $hashId);

            // Cache Personal info to store them in next step ("registerInquiry" method)
            Cache::put("personInfo:{$hashId}", json_encode($personInfo), 2000);

            Log::channel('service')->info('Get OTP Code | Success', [
                'nationalId'   => $request->national_id,
                'cellphone'    => $request->cellphone,
                'office_code'  => '',
                'username'     => '',
                'systemResult' => json_decode($result->body()),
                'created_at'   => Carbon::now(),
            ]);

            return redirect()->route('services.create')->with('hashId', $hashId);

        } catch (\Exception $exception) {
            Log::channel('service')->emergency('Get OTP Code | Error', [
                'nationalId'    => $request->national_id,
                'cellphone'     => $request->cellphone,
                'office_code'   => '',
                'username'      => '',
                'systemMessage' => $exception->getMessage(),
                'created_at'    => Carbon::now()
            ]);

            return redirect()->back()->withErrors(self::MESSAGE['error'][0]);
        }
    }


    public function paymentRegisterCreate()
    {
        /*if (!Cache::has(self::CACHEPREFIX . session()->get('hashId'))) {
            session()->forget('hashId');

            return redirect()->route('panel');
        }*/
        //todo check redis key exist

        return view('dashboard::dashboard.payment-form');
    }

    public function paymentRegisterStore(Request $request)
    {
        //todo use ppgService
        dd($request->all());
    }


    private function extractTrackingCode($response)
    {
//        dd('extractTrackingCode', $response);
        $string = $response['data'];
        //
        preg_match('/\b([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})\b/', $string, $matches);

        $this->trackingCode = $matches[1];
    }


    public function confirmationStore(Request $request)
    {
        Http::withBasicAuth($this->config['Username'], $this->config['Password'])
            ->withHeaders([
                'X-API-KEY'    => $this->config['X-API-KEY'],
                'Content-Type' => 'application/json'
            ])
            ->asJson()
            ->post($this->config['baseURL'] . '/clearence', [
                'No'                 => '',
                'IssueDate'          => '',
                'CallerNationalCode' => '',
                'CallerPostTitle'    => '',
            ]);
    }


    public function backgroundStore(Request $request)
    {
        try {
            $result = Http::withBasicAuth($this->config['Username'], $this->config['Password'])
                ->withHeaders([
                    'X-API-KEY'    => $this->config['X-API-KEY'],
                    'Content-Type' => 'application/json'
                ])
                ->asJson()
                ->post($this->config['baseURL'] . '/clearence', [
                    "No"                 => $request->no,
                    "IssueDate"          => $request->issue_date,
                    "CallerNationalCode" => $request->caller_national_code,
                    "CallerPostTitle"    => $request->caller_post_title
                ]);

            $finalResultAsArray = json_decode($result->body(), TRUE);

            CertificateOriginality::create([
                'no'                   => $request->no,
                'issue_date'           => $request->issue_date,
                'caller_national_code' => $request->caller_national_code,
                'caller_post_title'    => $request->caller_post_title,
                'office_code'          => '',
                'paid'                 => 0,
                'final_message'        => NULL
            ]);


            //todo handle error result: redirect and prevent to payment
            //todo go to payment and after success payment return to result page

            Log::channel('service')->error('Register Background | Success', [
                "No"                 => $request->no,
                "IssueDate"          => $request->issue_date,
                "CallerNationalCode" => $request->caller_national_code,
                "CallerPostTitle"    => $request->caller_post_title,
                'data'               => $finalResultAsArray,
                'created_at'         => Carbon::now()
            ]);

            return view('dashboard::dashboard.inquiry-result', ['finalMessage' => $finalResultAsArray['result']['data']['ResultValue']]);

        } catch (\Exception $exception) {
            Log::channel('service')->error('Register Background | Error', [
                "No"                 => $request->no,
                "IssueDate"          => $request->issue_date,
                "CallerNationalCode" => $request->caller_national_code,
                "CallerPostTitle"    => $request->caller_post_title,
                'systemMessage'      => $exception->getMessage(),
                'created_at'         => Carbon::now()
            ]);

            return redirect()->back()->withErrors(self::MESSAGE['error'][6]);
        }
    }
}
