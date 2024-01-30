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
            'درخواست استعلام با موفقیت انجام شد',
            '',
            '',
            '',
            '',
        ],

        'error' => [
            '',
            '',
            '',
            '',
        ]
    ];

    private const CONFIG = [];

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
    public function create()
    {
        return view('service::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $config = [];
        //
        if (config('app.env') === 'production') {
            $config = config('inquiry.production');
        } elseif (config('app.env') === 'local') {
            $config = config('inquiry.local');
        }

        //todo add form request

        try {
            $result = Http::withBasicAuth($config['Username'], $config['Password'])
                ->withHeaders([
                    'X-API-KEY'    => $config['X-API-KEY'],
                    'Content-Type' => 'application/json'
                ])
                ->asJson()
                ->post($config['baseURL'], [
                    'nationalId' => $request->national_id,
                    'cellphone'  => $request->cellphone,
                ]);

            $person_info[$request->national_id] = [
                'national_id' => $request->national_id,
                'cellphone' => $request->cellphone,
            ];

            Redis::setex("personInfo:{$request->national_id}", 120, json_encode($person_info));

            Log::channel('service')->info('Get Inquiry Success', [
                'nationalId'   => $request->national_id,
                'cellphone'    => $request->cellphone,
                'office_code'  => '',
                'username'     => '',
                'systemResult' => $result->body(),
                'created_at'   => Carbon::now(),
            ]);

            return view('dashboard::dashboard.trading-credit-inquiry', ['']);

        } catch (\Exception $exception) {
            Log::channel('service')->info('Get Inquiry Error', [
                'nationalId'    => $request->national_id,
                'cellphone'     => $request->cellphone,
                'office_code'   => '',
                'username'      => '',
                'systemMessage' => $exception->getMessage(),
                'created_at'    => Carbon::now()
            ]);

            return redirect()->back()->withErrors('');
        }
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
        try {
            $id = BackgroundCertificate::create([
                'person_status'        => $request->person_status,
                'receiver_national_id' => $request->receiver_national_id,
                'organization_id'      => $request->organization_id,
                'receiver_job_title'   => $request->receiver_job_title,
                'office_code'          => $request->office_id,
                'otp_code'             => $request->otp_code,
                'person_national_id'   => Redis::get('person_national_id'),
                'person_cellphone'     => Redis::get('person_cellphone'),
            ]);



            Redis::

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
            Log::channel('service')->info('Register Inquiry Error', [
                'person_status'        => $request->person_status,
                'receiver_national_id' => $request->receiver_national_id,
                'organization_id'      => $request->organization_id,
                'receiver_job_title'   => $request->receiver_job_title,
                'office_code'          => $request->office_id,
                'otp_code'             => $request->otp_code,
                'systemMessage'        => $exception->getMessage(),
                'created_at'           => Carbon::now()
            ]);
        }


    }
}
