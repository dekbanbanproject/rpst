<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Clinic_per;
use App\Clinic_drug;
use App\Clinic_locate;
use App\Clinic_sym;
use Image;
use PDF;

class ClinicreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report_symindex()
    {
        $reportsym = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->get();

        $product_a = DB::table('clinic_drug')->count();   
        $locate_a = DB::table('clinic_locate')->count();  
        $category_a = DB::table('clinic_category')->count();  
        $unit_a = DB::table('clinic_unit')->count();  
        $supplier_a = DB::table('clinic_supplier')->count(); 
        $sym_a = DB::table('clinic_sym')->count(); 
        $recieve_a = DB::table('clinic_recieve')->count();
        $pay_a = DB::table('clinic_pay')->count();
        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->count();

        return view('report.report_symindex',[
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
            
            'reportsyms'=> $reportsym
        ]);
    }
   
public function report_search(Request $request)
    {
        $datebigin = $request->DATE_BIGIN;
        $dateend = $request->DATE_END;
        // $status = $request->SEND_STATUS;
        $search = $request->get('search'); 
               
        if ($datebigin == '' || $dateend == '' ) {
              $reportsym = DB::table('clinic_sym')
                    ->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID') 
                    ->where(function($q) use ($search){                    
                          $q->where('PER_FNAME','like','%'.$search.'%'); 
                          $q->orwhere('PER_LNAME','like','%'.$search.'%');
                          $q->orwhere('PER_CID','like','%'.$search.'%');
                          $q->orwhere('PER_TEL','like','%'.$search.'%');
                      })                  
                    ->orderBy('clinic_sym.PER_ID', 'desc')->get();  
                  
                    $total = DB::table('clinic_sym')->sum('SYM_SUMTOTALPRICE'); 
                                       
                         
        } else {
                    $reportsym = DB::table('clinic_sym')
                    ->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID') 
                    ->where(function($q) use ($search){                    
                        $q->where('PER_FNAME','like','%'.$search.'%'); 
                        $q->orwhere('PER_LNAME','like','%'.$search.'%');
                        $q->orwhere('PER_CID','like','%'.$search.'%');
                        $q->orwhere('PER_TEL','like','%'.$search.'%');
                    })               
                  ->WhereBetween('SYM_DATE',[$datebigin,$dateend])  
                  ->orderBy('clinic_sym.PER_ID', 'desc')->get(); 
                  $total = DB::table('clinic_sym')->WhereBetween('SYM_DATE',[$datebigin,$dateend])->sum('SYM_SUMTOTALPRICE');
  
        }
          
        $product_a = DB::table('clinic_drug')->count();   
        $locate_a = DB::table('clinic_locate')->count();  
        $category_a = DB::table('clinic_category')->count();  
        $unit_a = DB::table('clinic_unit')->count();  
        $supplier_a = DB::table('clinic_supplier')->count(); 
        $sym_a = DB::table('clinic_sym')->count(); 
        $recieve_a = DB::table('clinic_recieve')->count();
        $pay_a = DB::table('clinic_pay')->count();
        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->count();

              return view('report.report_symindex',[  
                'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
                'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,

                  'search'=> $search,             
                  'reportsyms'=>$reportsym,            
                  'totals'=>$total,
              ]);

}
public function reportpdf(Request $request)
{
    $datebigin = $request->DATE_BIGIN;
    $dateend = $request->DATE_END;

    $data = Clinic_sym::leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID') 
            ->WhereBetween('SYM_DATE',[$datebigin,$dateend])  
            ->orderBy('clinic_sym.PER_ID', 'desc')->get();

    $fileName = 'report.pdf';
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-L',
        'orientation' => 'L',
        'default_font_size' => 17,
        'default_font'=> 'sarabun',
        'margin_left'=>5,
        'margin_right'=>5,
        'margin_top'=>10,
        'margin_bottom'=>10,
        'margin_header'=>10,
        'margin_footer'=>10,
        
    ]);

    $html = \View::make('report.reportpdf')->with('datas',$data ,'datebigins',$datebigin);
    $html = $html->render();

    $mpdf->SetHeader('Page');
    $mpdf->SetFooter('footer');
    $mpdf->WriteHTML($html);
    $mpdf->Output($fileName, 'I');
}
}