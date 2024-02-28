<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\PishkhanAuthService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Nwidart\Modules\Facades\Module;
use Modules\Dashboard\Services\DashboardMenuService;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('dashboard::dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dashboard::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function auth(AuthRequest $request)
    {
//        $request = [
//            'office' => '18491849',
//            'oper' => '18491849u1',
//            'ver_code' => '06ed4decc69f5962a94b638a46a135f49036299',
//            'nc' => '07327020ec555d8fd11a8dbc7ab5de8b',
//            'hash' => 'TCtUbUoyQjNOMkhEUW5SZm1adWFHd3oybmU3Z1Z6a2hQWlB1VEszSW9hZVQrZXdLYlN2dXlZSkRLYmtLcEZNYQ==',
//        ];

        (new PishkhanAuthService())->auth($request);
    }

}
