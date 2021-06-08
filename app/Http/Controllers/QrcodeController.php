<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Sentinel;
use App\User;
use App\message;
use Image;
use PDF;
use Auth;

class QrcodeController extends Controller
{
    public function readQrcode(Request $request) {

		$idstore =  Auth::user()->store_id;

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();

		return view('Qrcode.scan',[
			'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
		]);
	}
    public function createQrcode(Request $request) {

        return view('Qrcode.createqrcode');
    }
}
