<?php

namespace App\Http\Controllers\Misc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Str;
use DateTime;

class HelperController extends Controller
{
    /** 
     * 
     */
    public function generateToken()
    {
        return hash('sha256',Str::random(150));
    }
}