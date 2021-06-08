<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator ;
use App\Rent_Detail;
use App\Rent;
use App\Menuleft;
use App\Article;
use App\Posts;
use App\User;
// use Excel;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $year = date('Y');

        $m1 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-01%')->count();
            $m2 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-02%')->count();
            $m3 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-03%')->count();
            $m4 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-04%')->count();
            $m5 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-05%')->count();
            $m6 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-06%')->count();
            $m7 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-07%')->count();
            $m8 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-08%')->count();
            $m9 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-09%')->count();
            $m10 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-10%')->count();
            $m11 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-11%')->count();
            $m12 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->where('SYM_DATE','like',$year.'-12%')->count();

            $w1 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-01%')->count();
            $w2 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-02%')->count();
            $w3 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-03%')->count();
            $w4 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-04%')->count();
            $w5 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-05%')->count();
            $w6 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-06%')->count();
            $w7 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-07%')->count();
            $w8 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-08%')->count();
            $w9 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-09%')->count();
            $w10 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-10%')->count();
            $w11 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-11%')->count();
            $w12 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->where('SYM_DATE','like',$year.'-12%')->count();

            $z1 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-01%')->count();
            $z2 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-02%')->count();
            $z3 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-03%')->count();
            $z4 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-04%')->count();
            $z5 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-05%')->count();
            $z6 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-06%')->count();
            $z7 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-07%')->count();
            $z8 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-08%')->count();
            $z9 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-09%')->count();
            $z10 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-10%')->count();
            $z11 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-11%')->count();
            $z12 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->where('SYM_DATE','like',$year.'-12%')->count();


            $s1 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-01%')->count();
            $s2 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-02%')->count();
            $s3 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-03%')->count();
            $s4 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-04%')->count();
            $s5 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-06%')->count();
            $s6 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-06%')->count();
            $s7 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-07%')->count();
            $s8 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-08%')->count();
            $s9 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-09%')->count();
            $s10 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-10%')->count();
            $s11 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-11%')->count();
            $s12 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->where('SYM_DATE','like',$year.'-12%')->count();

            $am_1 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[1,12])->count();
            $am_2 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[13,25])->count();
            $am_3 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[26,35])->count();
        $am_4 = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->WhereBetween('PER_AGE',[36,120])->count();

        $cat_1 = DB::table('clinic_category')->where('CAT_ID','=',1)->count();
            $cat_2 = DB::table('clinic_category')->where('CAT_ID','=',2)->count();
            $cat_3 = DB::table('clinic_category')->where('CAT_ID','=',3)->count();
            $cat_4 = DB::table('clinic_category')->where('CAT_ID','=',4)->count();
            $cat_5 = DB::table('clinic_category')->where('CAT_ID','=',5)->count();
            $cat_6 = DB::table('clinic_category')->where('CAT_ID','=',6)->count();
            $cat_7 = DB::table('clinic_category')->where('CAT_ID','=',7)->count();
            $cat_8 = DB::table('clinic_category')->where('CAT_ID','=',8)->count();
            $cat_9 = DB::table('clinic_category')->where('CAT_ID','=',9)->count();
            $cat_10 = DB::table('clinic_category')->where('CAT_ID','=',10)->count();
            $cat_11 = DB::table('clinic_category')->where('CAT_ID','=',11)->count();
            $cat_12 = DB::table('clinic_category')->where('CAT_ID','=',12)->count();
            $cat_13 = DB::table('clinic_category')->where('CAT_ID','=',13)->count();
            $cat_14 = DB::table('clinic_category')->where('CAT_ID','=',14)->count();
            $cat_15 = DB::table('clinic_category')->where('CAT_ID','=',15)->count();
        $cat_16 = DB::table('clinic_category')->where('CAT_ID','=',16)->count();

        $cat_piechart = DB::table('clinic_drug')
                        ->select(DB::raw('count(*) as cat_count,CAT_NAME'),'CAT_NAME')
                        ->leftJoin('clinic_category','clinic_drug.CAT_ID','=','clinic_category.CAT_ID')
                        ->groupBy('CAT_NAME')
                        ->get();

        $sup_rec1 = DB::table('clinic_supplier')->where('SUP_ID','=',1)->count();
            $sup_rec2 = DB::table('clinic_supplier')->where('SUP_ID','=',2)->count();
            $sup_rec3 = DB::table('clinic_supplier')->where('SUP_ID','=',3)->count();
            $sup_rec4 = DB::table('clinic_supplier')->where('SUP_ID','=',4)->count();
            $sup_rec5 = DB::table('clinic_supplier')->where('SUP_ID','=',5)->count();
            $sup_rec6 = DB::table('clinic_supplier')->where('SUP_ID','=',6)->count();
            $sup_rec7 = DB::table('clinic_supplier')->where('SUP_ID','=',7)->count();
            $sup_rec8 = DB::table('clinic_supplier')->where('SUP_ID','=',8)->count();
            $sup_rec9 = DB::table('clinic_supplier')->where('SUP_ID','=',9)->count();
            $sup_rec10 = DB::table('clinic_supplier')->where('SUP_ID','=',10)->count();
            $sup_rec11 = DB::table('clinic_supplier')->where('SUP_ID','=',11)->count();
            $sup_rec12 = DB::table('clinic_supplier')->where('SUP_ID','=',12)->count();
            $sup_rec13 = DB::table('clinic_supplier')->where('SUP_ID','=',13)->count();
            $sup_rec14 = DB::table('clinic_supplier')->where('SUP_ID','=',14)->count();
        $sup_rec15 = DB::table('clinic_supplier')->where('SUP_ID','=',15)->count();
        $sup_piechart = DB::table('clinic_recieve')
                ->select(DB::raw('count(*) as sup_count,SUP_NAME'),'SUP_NAME')
                ->leftJoin('clinic_supplier','clinic_recieve.REC_SUP','=','clinic_supplier.SUP_ID')
                ->groupBy('SUP_NAME')
                ->get();

        $lo_rec1 = DB::table('clinic_locate')->where('LOCATE_ID','=',1)->count();
            $lo_rec2 = DB::table('clinic_locate')->where('LOCATE_ID','=',2)->count();
            $lo_rec3 = DB::table('clinic_locate')->where('LOCATE_ID','=',3)->count();
            $lo_rec4 = DB::table('clinic_locate')->where('LOCATE_ID','=',4)->count();
            $lo_rec5 = DB::table('clinic_locate')->where('LOCATE_ID','=',5)->count();
            $lo_rec6 = DB::table('clinic_locate')->where('LOCATE_ID','=',6)->count();
            $lo_rec7 = DB::table('clinic_locate')->where('LOCATE_ID','=',7)->count();
            $lo_rec8 = DB::table('clinic_locate')->where('LOCATE_ID','=',8)->count();
            $lo_rec9 = DB::table('clinic_locate')->where('LOCATE_ID','=',9)->count();
            $lo_rec10 = DB::table('clinic_locate')->where('LOCATE_ID','=',10)->count();
            $lo_rec11 = DB::table('clinic_locate')->where('LOCATE_ID','=',11)->count();
            $lo_rec12 = DB::table('clinic_locate')->where('LOCATE_ID','=',12)->count();
            $lo_rec13 = DB::table('clinic_locate')->where('LOCATE_ID','=',13)->count();
            $lo_rec14 = DB::table('clinic_locate')->where('LOCATE_ID','=',14)->count();
            $lo_rec15 = DB::table('clinic_locate')->where('LOCATE_ID','=',15)->count();
            $lo_rec16 = DB::table('clinic_locate')->where('LOCATE_ID','=',16)->count();
            $lo_rec17 = DB::table('clinic_locate')->where('LOCATE_ID','=',17)->count();
            $lo_rec18 = DB::table('clinic_locate')->where('LOCATE_ID','=',18)->count();
            $lo_rec19 = DB::table('clinic_locate')->where('LOCATE_ID','=',19)->count();
            $lo_rec20 = DB::table('clinic_locate')->where('LOCATE_ID','=',20)->count();
            $lo_rec21 = DB::table('clinic_locate')->where('LOCATE_ID','=',21)->count();
            $lo_rec22 = DB::table('clinic_locate')->where('LOCATE_ID','=',22)->count();
            $lo_rec23 = DB::table('clinic_locate')->where('LOCATE_ID','=',23)->count();
            $lo_rec24 = DB::table('clinic_locate')->where('LOCATE_ID','=',24)->count();
            $lo_rec25 = DB::table('clinic_locate')->where('LOCATE_ID','=',25)->count();
        $lo_rec26 = DB::table('clinic_locate')->where('LOCATE_ID','=',26)->count();

        $lo_piechart = DB::table('clinic_pay')
                ->select(DB::raw('count(*) as store_count,LOCATE_NAME'),'LOCATE_NAME')
                ->leftJoin('clinic_locate','clinic_pay.PAY_STORE','=','clinic_locate.LOCATE_ID')
                ->groupBy('LOCATE_NAME')
                ->get();



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

        $p_c1 = DB::table('clinic_drug')->where('DRUG_ID','=',1)->count();
            $p_c2 = DB::table('clinic_drug')->where('DRUG_ID','=',2)->count();
            $p_c3 = DB::table('clinic_drug')->where('DRUG_ID','=',3)->count();
            $p_c4 = DB::table('clinic_drug')->where('DRUG_ID','=',4)->count();
            $p_c5 = DB::table('clinic_drug')->where('DRUG_ID','=',5)->count();
            $p_c6 = DB::table('clinic_drug')->where('DRUG_ID','=',6)->count();
            $p_c7 = DB::table('clinic_drug')->where('DRUG_ID','=',7)->count();
            $p_c8 = DB::table('clinic_drug')->where('DRUG_ID','=',8)->count();
            $p_c9 = DB::table('clinic_drug')->where('DRUG_ID','=',9)->count();
            $p_c10 = DB::table('clinic_drug')->where('DRUG_ID','=',10)->count();
            $p_c11 = DB::table('clinic_drug')->where('DRUG_ID','=',11)->count();
            $p_c12 = DB::table('clinic_drug')->where('DRUG_ID','=',12)->count();
            $p_c13 = DB::table('clinic_drug')->where('DRUG_ID','=',13)->count();
            $p_c14 = DB::table('clinic_drug')->where('DRUG_ID','=',14)->count();
            $p_c15 = DB::table('clinic_drug')->where('DRUG_ID','=',15)->count();
            $p_c16 = DB::table('clinic_drug')->where('DRUG_ID','=',16)->count();
            $p_c17 = DB::table('clinic_drug')->where('DRUG_ID','=',17)->count();
            $p_c18 = DB::table('clinic_drug')->where('DRUG_ID','=',18)->count();
            $p_c19 = DB::table('clinic_drug')->where('DRUG_ID','=',19)->count();
            $p_c20 = DB::table('clinic_drug')->where('DRUG_ID','=',20)->count();
            $p_c21 = DB::table('clinic_drug')->where('DRUG_ID','=',21)->count();
            $p_c22 = DB::table('clinic_drug')->where('DRUG_ID','=',22)->count();
            $p_c23 = DB::table('clinic_drug')->where('DRUG_ID','=',23)->count();
            $p_c24 = DB::table('clinic_drug')->where('DRUG_ID','=',24)->count();
        $p_c25 = DB::table('clinic_drug')->where('DRUG_ID','=',25)->count();

        $chart_drug = DB::table('clinic_drug')
                ->select(DB::raw('count(*) as drug_count,DRUG_NAME'),'DRUG_NAME')
                ->groupBy('DRUG_NAME')
                ->get();


        $drugs1 = DB::table('clinic_drug')->where('DRUG_ID','=',1)->count();
        $drug_piechart = DB::table('clinic_pay_store')
                ->select(DB::raw('count(*) as drugs_count,DRUG_NAME'),'DRUG_NAME')
                ->leftJoin('clinic_drug','clinic_pay_store.PAYDETAIL_DRUG_ID','=','clinic_drug.DRUG_ID')
                ->where('STORE_LOCATE_ID','=',$idstore)
                ->groupBy('DRUG_NAME')
                ->get();

        $drugs11 = DB::table('clinic_drug')->where('DRUG_ID','=',1)->count();
        $drug_recieve = DB::table('clinic_recieve_store')
                ->select(DB::raw('count(*) as drug_rec_count,DRUG_NAME'),'DRUG_NAME')
                ->leftJoin('clinic_drug','clinic_recieve_store.STORE_RECIEVE_DRUG_ID','=','clinic_drug.DRUG_ID')
                ->where('STORE_LOCATE_ID','=',$idstore)
                ->groupBy('DRUG_NAME')
                ->get();

        $drugs_or = DB::table('clinic_drug')->where('DRUG_ID','=',1)->count();
        $drug_order = DB::table('clinic_orders_detail')
                ->select(DB::raw('count(*) as drug_order_count,DRUG_NAME'),'DRUG_NAME')
                ->leftJoin('clinic_drug','clinic_orders_detail.ORDER_DETAIL_DRUG_ID','=','clinic_drug.DRUG_ID')
                ->where('ORDER_DETAIL_STORE','=',$idstore)
                ->groupBy('DRUG_NAME')
                ->get();

        $recieve_aa = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->sum('REC_TOTAL');
        $order_aa = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->sum('ORDER_TOTAL');
        $pay_aa = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->sum('PAY_TOTAL');

        $total_aa = $recieve_aa - $pay_aa ;
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();


        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('settingdashboard',[
            'data_hos'=>$data_hos,
           'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'p_c1' => $p_c1,'p_c2' => $p_c2,'p_c3' => $p_c3,'p_c4' => $p_c4,'p_c5' => $p_c5,'p_c6' => $p_c6,'p_c7' => $p_c7,'p_c8' => $p_c8,'p_c9' => $p_c9,'p_c10' => $p_c10, 'p_c11' => $p_c11, 'p_c12' => $p_c12,
            'p_c13' => $p_c13,'p_c14' => $p_c14,'p_c15' => $p_c15,'p_c16' => $p_c16,'p_c17' => $p_c17,'p_c18' => $p_c18,'p_c19' => $p_c19,'p_c20' => $p_c20,'p_c21' => $p_c21,'p_c22' => $p_c22, 'p_c23' => $p_c23, 'p_c24' => $p_c24,
            'p_c25' => $p_c25,
            'sup_piecharts' => $sup_piechart,
            'lopiechart' => $lo_piechart,
            'drug_piecharts' => $drug_piechart,
            'order_a'=>$order_a,
            'chart_drugs' => $chart_drug,
            'drugs11'=>$drugs11,'drug_recieves'=>$drug_recieve,
            'drugs_or'=>$drugs_or,'drug_orders'=>$drug_order,

            'order_aa'=>$order_aa,'recieve_aa' => $recieve_aa,'pay_aa' => $pay_aa,'total_aa' => $total_aa,


            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
            'm1' => $m1,'m2' => $m2,'m3' => $m3,'m4' => $m4,'m5' => $m5,'m6' => $m6,'m7' => $m7,'m8' => $m8,'m9' => $m9,'m10' => $m10, 'm11' => $m11, 'm12' => $m12,
            'w1' => $w1, 'w2' => $w2, 'w3' => $w3, 'w4' => $w4,'w5' => $w5, 'w6' => $w6,'w7' => $w7,'w8' => $w8,'w9' => $w9,'w10' => $w10,'w11' => $w11,'w12' => $w12,
            'z1' => $z1, 'z2' => $z2, 'z3' => $z3, 'z4' => $z4,'z5' => $z5, 'z6' => $z6,'z7' => $z7,'z8' => $z8,'z9' => $z9,'z10' => $z10,'z11' => $z11,'z12' => $z12,
            's1' => $s1, 's2' => $s2, 's3' => $s3, 's4' => $s4,'s5' => $s5, 's6' => $s6,'s7' => $s7,'s8' => $s8,'s9' => $s9,'s10' => $s10,'s11' => $s11,'s12' => $s12,
            'am_1' => $am_1,
            'am_2' => $am_2,
            'am_3' => $am_3,
            'am_4' => $am_4,
            'cat_1' => $cat_1,
            'cat_2' => $cat_2,
            'cat_3' => $cat_3,
            'cat_4' => $cat_4,
            'cat_5' => $cat_5,
            'cat_6' => $cat_6,
            'cat_7' => $cat_7,
            'cat_8' => $cat_8,
            'cat_9' => $cat_9,
            'cat_10' => $cat_10,
            'cat_11' => $cat_11,
            'cat_12' => $cat_12,
            'cat_13' => $cat_13,
            'cat_14' => $cat_14,
            'cat_15' => $cat_15,
            'cat_16' => $cat_16,
            'cat_piecharts' => $cat_piechart,
        ]);
    }


}
