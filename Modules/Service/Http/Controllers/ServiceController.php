<?php

namespace Modules\Service\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

            Log::channel('service')->info('Get Inquiry Success', [
                'nationalId'  => $request->national_id,
                'cellphone'   => $request->cellphone,
                'office_code' => '',
                'username'    => '',
                'systemResult' => $result->body(),
                'created_at'  => Carbon::now(),
            ]);

            return view('dashboard::dashboard.trading-credit-inquiry');

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
        dd($request->all());
    }
}
