<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use App\Permiss;
use App\Permisslist;
use Image;
use PDF;
use Auth;
class ReportController extends Controller
{

    public function report_dashboard(Request $request,$idstore,$iduser)
    {

        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
        $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

        $order_rep_count = DB::table('clinic_orders')->count();
        $pay_rep_count = DB::table('clinic_orders')->count();
        $recieve_rep_count = DB::table('clinic_recieve')->count();

        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pm =  DB::table('permiss')->get();
        $permiss_list =  DB::table('permiss_list')->get();

        $drugs_or = DB::table('clinic_orders')->count();
        $drugs_rec = DB::table('clinic_recieve')->count();
        $drugs_pay = DB::table('clinic_pay')->count();

        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('report/report_dashboard',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'drugs_or' => $drugs_or, 'drugs_rec' => $drugs_rec, 'drugs_pay' => $drugs_pay,
            'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
            'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
        ]);
    }

    //**************  report_orders   *******************//
    public function report_orders(Request $request,$idstore,$iduser)
    {
            $pml = DB::table('users')->where('id','=',$iduser)->first();
            $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
            $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

            $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
            $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
            $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
            $locate_a = DB::table('clinic_locate')->count();
            $category_a = DB::table('clinic_category')->count();
            $unit_a = DB::table('clinic_unit')->count();
            $supplier_a = DB::table('clinic_supplier')->count();
            $sym_a = DB::table('clinic_sym')->count();
            $per_a = DB::table('clinic_per')->count();
            $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
            $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

            $order_rep_count = DB::table('clinic_orders')->count();
            $pay_rep_count = DB::table('clinic_orders')->count();
            $recieve_rep_count = DB::table('clinic_recieve')->count();

           
            // $pm =  DB::table('permiss')->get();
        $permiss_list =  DB::table('permiss_list')->get();
 
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        $order_rep = DB::table('clinic_orders')->limit('20')->orderBy('ORDER_DATE','desc')->get();

        $order_rep_search = DB::table('clinic_orders')->limit('20')->orderBy('ORDER_DATE','desc')->get();

        $order_review =DB::table('clinic_orders_detail')
        ->leftjoin('clinic_orders','clinic_orders.ORDER_ID','=','clinic_orders_detail.ORDER_ID')
        ->leftjoin('clinic_unit','clinic_orders_detail.ORDER_DETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')->limit('20')
        ->orderby('ORDER_DATE','desc')
        ->get();

        $sum_order_review =DB::table('clinic_orders_detail')
        ->leftjoin('clinic_orders','clinic_orders.ORDER_ID','=','clinic_orders_detail.ORDER_ID')->limit('20')
        ->orderby('ORDER_DATE','desc')
        ->sum('ORDER_DETAIL_DRUG_TOTAL');

        return view('report/report_orders',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'sum_order_review' => $sum_order_review,
            'order_reps'=>$order_rep, 'order_rep_searchs'=>$order_rep_search,'order_reviews'=>$order_review,
            'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
            'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
        ]);
    }
    public function report_orders_search(Request $request)
    {
        $iduser =  $request->USER_ID;
        $idstore = $request->STORE_ID;
        $st_date = $request->START_DATE;
        $en_date = $request->END_DATE;

        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
        $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

        $order_rep_count = DB::table('clinic_orders')->count();
        $pay_rep_count = DB::table('clinic_orders')->count();
        $recieve_rep_count = DB::table('clinic_recieve')->count();

      
        // $pm =  DB::table('permiss')->get();
     

        $permiss_list =  DB::table('permiss_list')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        $order_rep = DB::table('clinic_orders')->limit('20')->orderBy('ORDER_DATE','desc')->get();

        $order_rep_search = DB::table('clinic_orders')->WhereBetween('ORDER_DATE',[$st_date,$en_date])->limit('20')->orderBy('ORDER_DATE','desc')->get();

        $order_review =DB::table('clinic_orders_detail')
        ->leftjoin('clinic_orders','clinic_orders.ORDER_ID','=','clinic_orders_detail.ORDER_ID')
        ->leftjoin('clinic_unit','clinic_orders_detail.ORDER_DETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')
        ->WhereBetween('clinic_orders.ORDER_DATE',[$st_date,$en_date])
        ->limit('20')
        ->orderby('clinic_orders.ORDER_DATE','desc')
        ->get();

        $sum_order_review =DB::table('clinic_orders_detail')
        ->leftjoin('clinic_orders','clinic_orders.ORDER_ID','=','clinic_orders_detail.ORDER_ID')
        ->WhereBetween('clinic_orders.ORDER_DATE',[$st_date,$en_date])
        ->orderby('ORDER_DATE','desc')
        ->sum('ORDER_DETAIL_DRUG_TOTAL');

        return view('report/report_orders',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'sum_order_review' => $sum_order_review,
            'order_reps'=>$order_rep, 'order_rep_searchs'=>$order_rep_search,'order_reviews'=>$order_review,
            'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
            'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
        ]);
    }
    public function report_orders_rep(Request $request,$idstore, $iduser,$id)
    {

            $pml = DB::table('users')->where('id','=',$iduser)->first();
            $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
            $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

            $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
            $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
            $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
            $locate_a = DB::table('clinic_locate')->count();
            $category_a = DB::table('clinic_category')->count();
            $unit_a = DB::table('clinic_unit')->count();
            $supplier_a = DB::table('clinic_supplier')->count();
            $sym_a = DB::table('clinic_sym')->count();
            $per_a = DB::table('clinic_per')->count();
            $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
            $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

            $order_rep_count = DB::table('clinic_orders')->count();
            $pay_rep_count = DB::table('clinic_orders')->count();
            $recieve_rep_count = DB::table('clinic_recieve')->count();

          
            // $pm =  DB::table('permiss')->get();
      
        $permiss_list =  DB::table('permiss_list')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();



        // $order_rep = DB::table('clinic_orders')->where('clinic_orders.ORDER_ID','=',$id)->get();
        $order_rep = DB::table('clinic_orders')->orderBy('ORDER_DATE','desc')->get();
        $order_rep_search = DB::table('clinic_orders')->limit('20')->orderBy('ORDER_DATE','desc')->get();

        $order_review =DB::table('clinic_orders')->leftjoin('clinic_orders_detail','clinic_orders.ORDER_ID','=','clinic_orders_detail.ORDER_ID')
        ->leftjoin('clinic_unit','clinic_orders_detail.ORDER_DETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')
        ->where('clinic_orders.ORDER_ID','=',$id)->get();

        $sum_order_review =DB::table('clinic_orders_detail')
        ->leftjoin('clinic_orders','clinic_orders.ORDER_ID','=','clinic_orders_detail.ORDER_ID')
        ->where('clinic_orders.ORDER_ID','=',$id)
        ->orderby('ORDER_DATE','desc')
        ->sum('ORDER_DETAIL_DRUG_TOTAL');

        return view('report/report_orders',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'idstore'=>$idstore, 'sum_order_review' => $sum_order_review,
            'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
            'order_reps'=>$order_rep, 'order_rep_searchs'=>$order_rep_search,'order_reviews'=>$order_review,
            'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
        ]);
    }
    public function excel_orders(Request $request,$idstore,$iduser,$id)
    {

        $pml = DB::table('users')->where('id','=',$iduser)->first();
            $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
            $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

            $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
            $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
            $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
            $locate_a = DB::table('clinic_locate')->count();
            $category_a = DB::table('clinic_category')->count();
            $unit_a = DB::table('clinic_unit')->count();
            $supplier_a = DB::table('clinic_supplier')->count();
            $sym_a = DB::table('clinic_sym')->count();
            $per_a = DB::table('clinic_per')->count();
            $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
            $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
            $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
            $pm =  DB::table('permiss')->get();
        $permiss_list =  DB::table('permiss_list')->get();

        $order_rep = DB::table('clinic_orders')->where('clinic_orders.ORDER_ID','=',$id)->get();

        $order_review =DB::table('clinic_orders')->leftjoin('clinic_orders_detail','clinic_orders.ORDER_ID','=','clinic_orders_detail.ORDER_ID')
        ->leftjoin('clinic_unit','clinic_orders_detail.ORDER_DETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')
        ->where('clinic_orders.ORDER_ID','=',$id)->get();

        $sum_order_review =DB::table('clinic_orders_detail')
        ->leftjoin('clinic_orders','clinic_orders.ORDER_ID','=','clinic_orders_detail.ORDER_ID')
        ->where('clinic_orders.ORDER_ID','=',$id)
        ->orderby('ORDER_DATE','desc')
        ->sum('ORDER_DETAIL_DRUG_TOTAL');

        return view('report/excel_orders',[
            'idstore'=>$idstore, 'sum_order_review' => $sum_order_review,
            'order_reps'=>$order_rep,'order_reviews'=>$order_review,
            'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            ]);
    }
    //*********************************  END    *************************************//



   //**********************************  report_recieve  ************ *******************//
   public function report_recieve(Request $request,$idstore,$iduser)
   {
           $pml = DB::table('users')->where('id','=',$iduser)->first();
           $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
           $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

           $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
           $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
           $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
           $locate_a = DB::table('clinic_locate')->count();
           $category_a = DB::table('clinic_category')->count();
           $unit_a = DB::table('clinic_unit')->count();
           $supplier_a = DB::table('clinic_supplier')->count();
           $sym_a = DB::table('clinic_sym')->count();
           $per_a = DB::table('clinic_per')->count();
           $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
           $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

           $order_rep_count = DB::table('clinic_orders')->count();
            $pay_rep_count = DB::table('clinic_orders')->count();
           $recieve_rep_count = DB::table('clinic_recieve')->count();

    //        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
    //        $pm =  DB::table('permiss')->get();
    //    $permiss_list =  DB::table('permiss_list')->get();
    
    $permiss_list =  DB::table('permiss_list')->get();
    $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
    $pml =  DB::table('users')->where('id','=',$iduser)->first();
    $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
    $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

       $recieve_rep = DB::table('clinic_recieve')->limit('20')->orderBy('REC_DATE','desc')->get();
       $recieve_rep_search = DB::table('clinic_recieve')->limit('20')->orderBy('REC_DATE','desc')->get();
       $recieve_review =DB::table('clinic_recieve_store')
       ->leftjoin('clinic_recieve','clinic_recieve.REC_ID','=','clinic_recieve_store.REC_ID')
       ->leftjoin('clinic_unit','clinic_recieve_store.STORE_RECIEVE_DRUG_UNIT','=','clinic_unit.UNIT_ID')->limit('20')
       ->orderby('REC_DATE','desc')
       ->get();

       $sum_recieve_review =DB::table('clinic_recieve_store')
       ->leftjoin('clinic_recieve','clinic_recieve.REC_ID','=','clinic_recieve_store.REC_ID')
       ->leftjoin('clinic_unit','clinic_recieve_store.STORE_RECIEVE_DRUG_UNIT','=','clinic_unit.UNIT_ID')->limit('20')
       ->orderby('REC_DATE','desc')
       ->sum('STORE_RECIEVE_DRUG_TOTAL');

       return view('report/report_recieve',[
        'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
        'sum_recieve_review'=>$sum_recieve_review,
           'recieve_reps'=>$recieve_rep, 'recieve_rep_searchs'=>$recieve_rep_search,'recieve_reviews'=>$recieve_review,
           'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
           'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
           'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
           'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
       ]);
   }
   public function report_recieve_search(Request $request)
   {
       $iduser =  $request->USER_ID;
       $idstore = $request->STORE_ID;
       $st_date = $request->START_DATE;
       $en_date = $request->END_DATE;

       $pml = DB::table('users')->where('id','=',$iduser)->first();
       $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
       $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

       $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
       $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
       $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
       $locate_a = DB::table('clinic_locate')->count();
       $category_a = DB::table('clinic_category')->count();
       $unit_a = DB::table('clinic_unit')->count();
       $supplier_a = DB::table('clinic_supplier')->count();
       $sym_a = DB::table('clinic_sym')->count();
       $per_a = DB::table('clinic_per')->count();
       $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
       $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

       $order_rep_count = DB::table('clinic_orders')->count();
       $pay_rep_count = DB::table('clinic_orders')->count();
       $recieve_rep_count = DB::table('clinic_recieve')->count();

    //    $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
    //    $pm =  DB::table('permiss')->get();
    //    $permiss_list =  DB::table('permiss_list')->get();
    $permiss_list =  DB::table('permiss_list')->get();
    $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
    $pml =  DB::table('users')->where('id','=',$iduser)->first();
    $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
    $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

       $recieve_rep = DB::table('clinic_recieve')->limit('20')->orderBy('REC_DATE','desc')->get();
       $recieve_rep_search = DB::table('clinic_recieve')->WhereBetween('REC_DATE',[$st_date,$en_date])->limit('20')->orderBy('REC_DATE','desc')->get();
       $recieve_review =DB::table('clinic_recieve_store')
       ->leftjoin('clinic_recieve','clinic_recieve.REC_ID','=','clinic_recieve_store.REC_ID')
       ->leftjoin('clinic_unit','clinic_recieve_store.STORE_RECIEVE_DRUG_UNIT','=','clinic_unit.UNIT_ID')
       ->WhereBetween('clinic_recieve.REC_DATE',[$st_date,$en_date])
       ->limit('20')
       ->orderby('REC_DATE','desc')
       ->get();

       $sum_recieve_review =DB::table('clinic_recieve_store')
       ->leftjoin('clinic_recieve','clinic_recieve.REC_ID','=','clinic_recieve_store.REC_ID')
       ->leftjoin('clinic_unit','clinic_recieve_store.STORE_RECIEVE_DRUG_UNIT','=','clinic_unit.UNIT_ID')
       ->WhereBetween('clinic_recieve.REC_DATE',[$st_date,$en_date])
       ->orderby('REC_DATE','desc')
       ->sum('STORE_RECIEVE_DRUG_TOTAL');

       return view('report/report_recieve',[
        'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
        'sum_recieve_review'=>$sum_recieve_review,
        'recieve_reps'=>$recieve_rep, 'recieve_rep_searchs'=>$recieve_rep_search,'recieve_reviews'=>$recieve_review,
           'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
           'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
           'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
           'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
       ]);
   }
   public function report_recieve_rep(Request $request,$idstore, $iduser,$id)
   {

           $pml = DB::table('users')->where('id','=',$iduser)->first();
           $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
           $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

           $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
           $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
           $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
           $locate_a = DB::table('clinic_locate')->count();
           $category_a = DB::table('clinic_category')->count();
           $unit_a = DB::table('clinic_unit')->count();
           $supplier_a = DB::table('clinic_supplier')->count();
           $sym_a = DB::table('clinic_sym')->count();
           $per_a = DB::table('clinic_per')->count();
           $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
           $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

           $order_rep_count = DB::table('clinic_orders')->count();
           $pay_rep_count = DB::table('clinic_orders')->count();
           $recieve_rep_count = DB::table('clinic_recieve')->count();

    //        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
    //        $pm =  DB::table('permiss')->get();
    //    $permiss_list =  DB::table('permiss_list')->get();
    $permiss_list =  DB::table('permiss_list')->get();
    $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
    $pml =  DB::table('users')->where('id','=',$iduser)->first();
    $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
    $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

       $recieve_rep = DB::table('clinic_recieve')->limit('20')->orderBy('REC_DATE','desc')->get();
       $recieve_rep_search = DB::table('clinic_recieve')->limit('20')->orderBy('REC_DATE','desc')->get();

       $recieve_review =DB::table('clinic_recieve')
       ->leftjoin('clinic_recieve_store','clinic_recieve.REC_ID','=','clinic_recieve_store.REC_ID')
       ->leftjoin('clinic_unit','clinic_recieve_store.STORE_RECIEVE_DRUG_UNIT','=','clinic_unit.UNIT_ID')
       ->where('clinic_recieve.REC_ID','=',$id)->get();

       $sum_recieve_review =DB::table('clinic_recieve_store')
       ->leftjoin('clinic_recieve','clinic_recieve.REC_ID','=','clinic_recieve_store.REC_ID')
       ->leftjoin('clinic_unit','clinic_recieve_store.STORE_RECIEVE_DRUG_UNIT','=','clinic_unit.UNIT_ID')
       ->where('clinic_recieve.REC_ID','=',$id)
       ->orderby('REC_DATE','desc')
       ->sum('STORE_RECIEVE_DRUG_TOTAL');

       return view('report/report_recieve',[
        'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
           'idstore'=>$idstore, 'sum_recieve_review'=>$sum_recieve_review,
           'recieve_reps'=>$recieve_rep, 'recieve_rep_searchs'=>$recieve_rep_search,'recieve_reviews'=>$recieve_review,
           'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
           'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
           'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
           'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
       ]);
   }
   public function excel_recieve(Request $request,$idstore,$iduser,$id)
   {

       $pml = DB::table('users')->where('id','=',$iduser)->first();
           $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
           $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

           $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
           $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
           $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
           $locate_a = DB::table('clinic_locate')->count();
           $category_a = DB::table('clinic_category')->count();
           $unit_a = DB::table('clinic_unit')->count();
           $supplier_a = DB::table('clinic_supplier')->count();
           $sym_a = DB::table('clinic_sym')->count();
           $per_a = DB::table('clinic_per')->count();
           $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
           $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
           $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
           $pm =  DB::table('permiss')->get();
       $permiss_list =  DB::table('permiss_list')->get();

       $recieve_rep = DB::table('clinic_recieve')->where('clinic_recieve.REC_ID','=',$id)->get();

       $recieve_review =DB::table('clinic_recieve')
       ->leftjoin('clinic_recieve_store','clinic_recieve.REC_ID','=','clinic_recieve_store.REC_ID')
       ->leftjoin('clinic_unit','clinic_recieve_store.STORE_RECIEVE_DRUG_UNIT','=','clinic_unit.UNIT_ID')
       ->where('clinic_recieve.REC_ID','=',$id)->get();

       $sum_recieve_review =DB::table('clinic_recieve_store')
       ->leftjoin('clinic_recieve','clinic_recieve.REC_ID','=','clinic_recieve_store.REC_ID')
       ->leftjoin('clinic_unit','clinic_recieve_store.STORE_RECIEVE_DRUG_UNIT','=','clinic_unit.UNIT_ID')
       ->where('clinic_recieve.REC_ID','=',$id)
       ->orderby('REC_DATE','desc')
       ->sum('STORE_RECIEVE_DRUG_TOTAL');

       return view('report/excel_recieve',[
           'idstore'=>$idstore, 'sum_recieve_review'=>$sum_recieve_review,
           'recieve_reps'=>$recieve_rep,'recieve_reviews'=>$recieve_review,
           'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
           'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
           'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
           ]);
   }
   //*********************************  END    *************************************//



     //**********************************  report_pays  ************ *******************//
     public function report_pays(Request $request,$idstore,$iduser)
     {
             $pml = DB::table('users')->where('id','=',$iduser)->first();
             $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
             $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

             $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
             $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
             $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
             $locate_a = DB::table('clinic_locate')->count();
             $category_a = DB::table('clinic_category')->count();
             $unit_a = DB::table('clinic_unit')->count();
             $supplier_a = DB::table('clinic_supplier')->count();
             $sym_a = DB::table('clinic_sym')->count();
             $per_a = DB::table('clinic_per')->count();
             $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
             $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

             $order_rep_count = DB::table('clinic_orders')->count();
             $pay_rep_count = DB::table('clinic_orders')->count();
            $recieve_rep_count = DB::table('clinic_recieve')->count();

        //      $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        //      $pm =  DB::table('permiss')->get();
        //  $permiss_list =  DB::table('permiss_list')->get();
        $permiss_list =  DB::table('permiss_list')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

         $pay_rep = DB::table('clinic_pay')->limit('20')->orderBy('PAY_DATE','desc')->get();
         $pay_rep_search = DB::table('clinic_pay')->limit('20')->orderBy('PAY_DATE','desc')->get();
         $pay_review =DB::table('clinic_pay_store')
         ->leftjoin('clinic_pay','clinic_pay.PAY_ID','=','clinic_pay_store.PAYDETAIL_PAY_ID')
         ->leftjoin('clinic_unit','clinic_pay_store.PAYDETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')->limit('20')
         ->orderby('PAY_DATE','desc')
         ->get();

         $sum_pay_review =DB::table('clinic_pay_store')
         ->leftjoin('clinic_pay','clinic_pay.PAY_ID','=','clinic_pay_store.PAYDETAIL_PAY_ID')
         ->leftjoin('clinic_unit','clinic_pay_store.PAYDETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')->limit('20')
         ->orderby('PAY_DATE','desc')
         ->sum('PAYDETAIL_DRUG_PRICE_TOTAL');

         return view('report/report_pays',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'sum_pay_review'=>$sum_pay_review,
             'pay_reps'=>$pay_rep, 'pay_rep_searchs'=>$pay_rep_search,'pay_reviews'=>$pay_review,
             'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
             'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
             'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
             'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
         ]);
     }
     public function report_pays_search(Request $request)
     {
         $iduser =  $request->USER_ID;
         $idstore = $request->STORE_ID;
         $st_date = $request->START_DATE;
         $en_date = $request->END_DATE;

         $pml = DB::table('users')->where('id','=',$iduser)->first();
         $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
         $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

         $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
         $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
         $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
         $locate_a = DB::table('clinic_locate')->count();
         $category_a = DB::table('clinic_category')->count();
         $unit_a = DB::table('clinic_unit')->count();
         $supplier_a = DB::table('clinic_supplier')->count();
         $sym_a = DB::table('clinic_sym')->count();
         $per_a = DB::table('clinic_per')->count();
         $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
         $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

         $order_rep_count = DB::table('clinic_orders')->count();
         $pay_rep_count = DB::table('clinic_orders')->count();
         $recieve_rep_count = DB::table('clinic_recieve')->count();

        //  $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        //  $pm =  DB::table('permiss')->get();
        //  $permiss_list =  DB::table('permiss_list')->get();
        $permiss_list =  DB::table('permiss_list')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

         $pay_rep = DB::table('clinic_pay')->limit('20')->orderBy('PAY_DATE','desc')->get();
         $pay_rep_search = DB::table('clinic_pay')->WhereBetween('PAY_DATE',[$st_date,$en_date])->limit('20')->orderBy('PAY_DATE','desc')->get();

         $pay_review =DB::table('clinic_pay_store')
         ->leftjoin('clinic_pay','clinic_pay.PAY_ID','=','clinic_pay_store.PAYDETAIL_PAY_ID')
         ->leftjoin('clinic_unit','clinic_pay_store.PAYDETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')
         ->WhereBetween('clinic_pay.PAY_DATE',[$st_date,$en_date])
         ->limit('20')
         ->orderby('clinic_pay.PAY_DATE','desc')
         ->get();


         $sum_pay_review =DB::table('clinic_pay_store')
         ->leftjoin('clinic_pay','clinic_pay.PAY_ID','=','clinic_pay_store.PAYDETAIL_PAY_ID')
         ->leftjoin('clinic_unit','clinic_pay_store.PAYDETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')
         ->WhereBetween('clinic_pay.PAY_DATE',[$st_date,$en_date])
         ->orderby('PAY_DATE','desc')
         ->sum('PAYDETAIL_DRUG_PRICE_TOTAL');

         return view('report/report_pays',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'sum_pay_review'=>$sum_pay_review,
          'pay_reps'=>$pay_rep, 'pay_rep_searchs'=>$pay_rep_search,'pay_reviews'=>$pay_review,
          'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
             'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
             'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
             'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
         ]);
     }
     public function report_pays_rep(Request $request,$idstore, $iduser,$id)
     {

             $pml = DB::table('users')->where('id','=',$iduser)->first();
             $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
             $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

             $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
             $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
             $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
             $locate_a = DB::table('clinic_locate')->count();
             $category_a = DB::table('clinic_category')->count();
             $unit_a = DB::table('clinic_unit')->count();
             $supplier_a = DB::table('clinic_supplier')->count();
             $sym_a = DB::table('clinic_sym')->count();
             $per_a = DB::table('clinic_per')->count();
             $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
             $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

             $order_rep_count = DB::table('clinic_orders')->count();
             $pay_rep_count = DB::table('clinic_orders')->count();
             $recieve_rep_count = DB::table('clinic_recieve')->count();

        //      $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        //      $pm =  DB::table('permiss')->get();
        //  $permiss_list =  DB::table('permiss_list')->get();
        $permiss_list =  DB::table('permiss_list')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

         $pay_rep = DB::table('clinic_pay')->limit('20')->orderBy('PAY_DATE','desc')->get();
         $pay_rep_search = DB::table('clinic_pay')->limit('20')->orderBy('PAY_DATE','desc')->get();


         $pay_review =DB::table('clinic_pay')->leftjoin('clinic_pay_store','clinic_pay.PAY_ID','=','clinic_pay_store.PAYDETAIL_PAY_ID')
         ->leftjoin('clinic_unit','clinic_pay_store.PAYDETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')
         ->where('clinic_pay.PAY_ID','=',$id)->get();

         $sum_pay_review =DB::table('clinic_pay_store')
         ->leftjoin('clinic_pay','clinic_pay.PAY_ID','=','clinic_pay_store.PAYDETAIL_PAY_ID')
         ->leftjoin('clinic_unit','clinic_pay_store.PAYDETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')
         ->where('clinic_pay.PAY_ID','=',$id)
         ->orderby('PAY_DATE','desc')
         ->sum('PAYDETAIL_DRUG_PRICE_TOTAL');

         return view('report/report_pays',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
             'idstore'=>$idstore, 'sum_pay_review'=>$sum_pay_review,
             'pay_reps'=>$pay_rep, 'pay_rep_searchs'=>$pay_rep_search,'pay_reviews'=>$pay_review,
             'order_rep_count' => $order_rep_count,'pay_rep_count' => $pay_rep_count,'recieve_rep_count' => $recieve_rep_count,
             'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
             'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
             'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
         ]);
     }
     public function excel_pays(Request $request,$idstore,$iduser,$id)
     {

         $pml = DB::table('users')->where('id','=',$iduser)->first();
             $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
             $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

             $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
             $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
             $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
             $locate_a = DB::table('clinic_locate')->count();
             $category_a = DB::table('clinic_category')->count();
             $unit_a = DB::table('clinic_unit')->count();
             $supplier_a = DB::table('clinic_supplier')->count();
             $sym_a = DB::table('clinic_sym')->count();
             $per_a = DB::table('clinic_per')->count();
             $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
             $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
             $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
             $pm =  DB::table('permiss')->get();
         $permiss_list =  DB::table('permiss_list')->get();

         $pay_rep = DB::table('clinic_pay')->where('clinic_pay.PAY_ID','=',$id)->get();

         $pay_review =DB::table('clinic_pay')->leftjoin('clinic_pay_store','clinic_pay.PAY_ID','=','clinic_pay_store.PAYDETAIL_PAY_ID')
         ->leftjoin('clinic_unit','clinic_pay_store.PAYDETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')
         ->where('clinic_pay.PAY_ID','=',$id)->get();

         $sum_pay_review =DB::table('clinic_pay_store')
         ->leftjoin('clinic_pay','clinic_pay.PAY_ID','=','clinic_pay_store.PAYDETAIL_PAY_ID')
         ->leftjoin('clinic_unit','clinic_pay_store.PAYDETAIL_DRUG_UNIT','=','clinic_unit.UNIT_ID')
         ->where('clinic_pay.PAY_ID','=',$id)
         ->orderby('PAY_DATE','desc')
         ->sum('PAYDETAIL_DRUG_PRICE_TOTAL');
         
         return view('report/excel_pays',[
             'idstore'=>$idstore, 'sum_pay_review'=>$sum_pay_review,
             'pay_reps'=>$pay_rep,'pay_reviews'=>$pay_review,
             'data_hos'=>$data_hos,'permiss'=>$permiss,'pmls'=>$pml, 'allData' => $allData,
             'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
             'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
             ]);
     }
     //*********************************  END    *************************************//

    public function create()
    {
        $idstore =  Auth::user()->store_id;
        $iduser =  Auth::user()->id;

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();

        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $store = DB::table('clinic_locate')->get();
        $position = DB::table('clinic_position')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();


        return view('staff.create',[
            'data_hos'=>$data_hos,'permiss'=>$permiss,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'stores' => $store,'positions' => $position
        ]);
    }

    public function store(Request $request)
    {

        $add= new User();
        $add->name = $request->name;
        $add->lname = $request->lname;
        $add->email = $request->email;
        $add->facebook = $request->facebook;
        $add->linetoken = $request->linetoken;
        $add->cid = $request->cid;
        $add->store_id = $request->STORE;
        $add->position = $request->position;
        $add->password = bcrypt($request->password);
        $add->status = $request->status;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $contents = $file->openFile()->fread($file->getSize());
            $add->img = $contents;
        }
        $add->save();

        return redirect()->route('staff.index');
    }

    public function edit(Request $request,$id)
    {
        $data = User::find($id);
        $idstore =  Auth::user()->store_id;
        $iduser =  Auth::user()->id;

        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();

        $store = DB::table('clinic_locate')->get();
        $position = DB::table('clinic_position')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        return view('staff.edit',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'data' => $data,'stores' => $store,'positions' => $position
        ]);
    }
    function switchactivepermiss(Request $request)
    {
        $id = $request->permiss;
        $activePRO = Permiss::find($id);
        $activePRO->PERMISS_STATUS = $request->onoff;
        $activePRO->save();
    }

    public function update(Request $request, $id)
    {
        $update= User::find($id);
        $update->name = $request->name;
        $update->lname = $request->lname;
        $update->position = $request->position;
        $update->email = $request->email;
        $update->facebook = $request->facebook;
        $update->linetoken = $request->linetoken;
        $update->store_id = $request->STORE;
        $update->password = bcrypt($request->password);
        $update->status = $request->status;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $contents = $file->openFile()->fread($file->getSize());
            $update->img = $contents;
        }
        $update->save();
        return redirect()->route('staff.index')->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    public function destroy(Request $request,$id)
    {
        $id = $request->id;
        User::destroy($id);

        return redirect()->route('staff.index');
    }

    public function permisslist_save(Request $request)
    {
        $iduser = $request->PERMISS_LIST_USER;

        Permisslist::where('PERMISS_LIST_USER','=',$iduser)->delete();

        $add = new Permisslist;
        $add->PERMISS_LIST_USER = $iduser;
        $add->PERMISS_LIST_HO =  $request->HOS_MISS;
        $add->PERMISS_LIST_ME = $request->MEDICAL_MISS;
        $add->PERMISS_LIST_DELETE = $request->DELETE_MISS;
        $add->PERMISS_LIST_EDIT = $request->EDIT_MISS;
        $add->PERMISS_LIST_ADD = $request->ADD_MISS;
        $add->PERMISS_LIST_CLAIM = $request->CLAIM_MISS;
        $add->save();

        $id =  Auth::user()->id;

        return redirect()->route('staff.permisslist',[
            'id' => $id
        ]);
    }


}
