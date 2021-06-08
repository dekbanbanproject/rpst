<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Drug;
use App\Clinic_drug;

class Apidrugitems extends Controller
{
    function hosdrugitems()
    {
        return Clinic_drug::all();
    }
}
