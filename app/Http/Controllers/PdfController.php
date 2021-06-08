<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Units;
use App\Category;
use App\Clinic_orders;
use App\Orders_detail;
use App\Supplies;
use App\Clinic_drug;
use App\Products;
use Image;
use PDF;
use Auth;

date_default_timezone_set("Asia/Bangkok");

class PdfController extends Controller
{
    public function pdf_sticker(Request $request)
    {
//         $idstore =  Auth::user()->store_id;

// $id = $request->DRUG_ID;

//         $drug = Clinic_drug::where('DRUG_ID','=',$id)->first();

//         $pdf = PDF::loadView('pdf.pdf_sticker',[
//             'drugs' => $drug,
//             ]);
//         return $pdf->stream();

    }
    public function productspdf(Request $request)
    {
        // $Pro = DB::table('products')->leftjoin('units','products.PRO_UNIT','units.UNITS_ID')->leftjoin('category','products.PRO_CAT','category.CAT_ID')->get();
        // $unit = DB::table('units')->get();
        // $CAT = DB::table('category')->get();

        // $pdf = PDF::loadView('pdf.productspdf',[
        //     'Pros' => $Pro,
        //     'units' => $unit,
        //     'CATS' => $CAT,
        //     ]);
        // return $pdf->stream();

    }
    public function pdf_order(Request $request)
    {
        // PDF::fake();
        // PDF::assertViewIs('pdf.pdf_order');
        // PDF::assertSee('pdf_order');
        $drug = Clinic_drug::get();

                $pdf = PDF::loadView('pdf.pdf_order',[
                    'drugs' => $drug,
                    ]);
                return $pdf->stream();

    }

}
// $pdf = PDF::loadView('pdf_view', $data);
// return $pdf->download('medium.pdf');
