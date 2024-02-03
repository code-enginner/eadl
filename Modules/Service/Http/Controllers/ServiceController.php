<?php

namespace Modules\Service\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
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
        ]
    ];

    private const REDISPREFIX = 'personInfo:';

    private array $config = [];

    public function __construct()
    {
        $this->getConfig();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('service::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //if otpCode expired or direct access to this route, return
        if (!Redis::exists(self::REDISPREFIX . $request->session()->get('hashId'))) {
            session()->forget('hashId');

            return redirect()->route('panel');
        }

        return view('dashboard::dashboard.trading-credit-inquiry', ['hashId' => $request->session()->get('hashId')])->with('success', self::MESSAGE['success'][0]);
    }

    /**
     * Send otpCode to the customer
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('service::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('service::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }


    public function registerInquiry(Request $request)
    {
        if (!Redis::exists(self::REDISPREFIX . $request->hash_id)) {
            return redirect()
                ->route('dashboard.admin')
                ->withErrors(self::MESSAGE['error'][1]);
        }

        $personInfo = json_decode(Redis::get(self::REDISPREFIX . $request->hash_id), TRUE);

        try {
            $id = BackgroundCertificate::create([
                'person_status'        => $request->person_status,
                'receiver_national_id' => $request->receiver_national_id,
                'organization_id'      => $request->organization_id,
                'receiver_job_title'   => $request->receiver_job_title,
                'office_code'          => $request->office_id,
                'otp_code'             => $request->otp_code,
                'person_national_id'   => $personInfo['nationalId'],
                'person_cellphone'     => $personInfo['cellphone'],
            ]);

            Log::channel('service')->info('Register Inquiry Success', [
                'person_status'        => $request->person_status,
                'receiver_national_id' => $request->receiver_national_id,
                'organization_id'      => $request->organization_id,
                'receiver_job_title'   => $request->receiver_job_title,
                'office_code'          => $request->office_id,
                'otp_code'             => $request->otp_code,
                'row_id'               => $id,
                'created_at'           => Carbon::now()
            ]);

            return view('dashboard::service.payment');

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

            return redirect()->route('');
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

    private function payment()
    {
        // todo use ppg service
    }


    public function getInquiry(Request $request)
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
                ->post($this->config['baseURL'], [
                    'nationalId' => $request->national_id,
                    'cellphone'  => $request->cellphone,
                ]);

            $personInfo = [
                'nationalId' => $request->national_id,
                'cellphone'   => $request->cellphone,
            ];
            //
            $hashId = md5($request->national_id);

            // Cache Personal info to store them in next step ("registerInquiry" method)
            Redis::setex("personInfo:{$hashId}", 120, json_encode($personInfo));

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
}
