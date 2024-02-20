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
            'کد پیگیری قابل بازیابی نیست'
        ]
    ];

    private const CACHEPREFIX = 'personInfo:';

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
                ])->post($this->config['baseURL'], [
                    'usernationalCode'         => $request->receiver_national_id,
                    'organizationNationalCode' => $request->organization_id,
                    'postName'                 => $request->receiver_job_title,
                    'personTyp'                => $request->person_status,
                    'otp'                      => $request->otp_code,
                ]);

            //Returned response from API hase false
            $httpResultResponse = json_decode($httpResult->body(), TRUE);
            if ((bool)$httpResultResponse['status'] === FALSE) {
                return redirect()->back()->withErrors($httpResultResponse['message']);
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
                'tracking_id' => $this->trackingCode
            ]);

            Log::channel('service')->info('Register Inquiry Success', [
                'inserted_row'       => $result,
                'created_at'         => Carbon::now(),
                'persian_created_at' => Carbon::now(),
            ]);
            //todo get response from API
            return redirect()->route('services.payment.register.create');

        } catch (\Exception $exception) {
            Log::channel('service')->error('Register Inquiry Error', [
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
                ->timeout(30)
                ->post($this->config['baseURL'] . 'otp', [
                    'nationalId' => $request->national_id,
                    'cellphone'  => $request->cellphone,
                ]);

            $httpResult = json_decode($result, TRUE);
            if ((bool)$httpResult['status'] === FALSE) {
                Log::channel('service')->emergency('Get Inquiry Error', [
                    'nationalId'    => $request->national_id,
                    'cellphone'     => $request->cellphone,
                    'office_code'   => '',
                    'username'      => '',
                    'systemMessage' => $httpResult['message'],
                    'created_at'    => Carbon::now()
                ]);
            }
            dd($httpResult);

            $personInfo = [
                'nationalId' => $request->national_id,
                'cellphone'  => $request->cellphone,
            ];
            //
            $hashId = md5($request->national_id);
            Session::put('hashId', $hashId);

            // Cache Personal info to store them in next step ("registerInquiry" method)
            Cache::put("personInfo:{$hashId}", json_encode($personInfo), 2000);

            Log::channel('service')->info('Get Inquiry Success', [
                'nationalId'   => $request->national_id,
                'cellphone'    => $request->cellphone,
                'office_code'  => '',
                'username'     => '',
                'systemResult' => json_decode($result->body()),
                'created_at'   => Carbon::now(),
            ]);

            return redirect()->route('services.create')->with('hashId', $hashId);

        } catch (\Exception $exception) {
            Log::channel('service')->emergency('Get Inquiry Error', [
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
        if (!Cache::has(self::CACHEPREFIX . session()->get('hashId'))) {
            session()->forget('hashId');

            return redirect()->route('panel');
        }
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
        $tmp = json_decode($response);
        $string = $tmp['result']['data'];
        //
        preg_match('/\b([a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12})\b/', $string, $matches);

        $this->trackingCode = $matches[1];
    }
}
