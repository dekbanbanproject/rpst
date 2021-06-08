<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use App\Drugitems;
use App\Opitemrece;
use App\Clinic_drug;
use Image;
use PDF;
use Auth;
use Validator;
use App\Person;
use App\Tb_opd;
use App\Tb_ipd;
use App\Models\Position;
use App\Models\Store_main;
use App\Models\Store_sub;
use App\Models\Units;
use App\Models\Category;
use App\Models\Products;

class DashbordController extends Controller
{
    public function dashbord_home(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
         }
        $year = date('Y');

        // $idstore =  Auth::user()->store_id;
         $idstore = $data->store_id;
         $iduser = $data->id;

        $recieve_aa = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->sum('REC_TOTAL');
        $order_aa = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->sum('ORDER_TOTAL');
        $pay_aa = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->sum('PAY_TOTAL');
        $total_aa = $recieve_aa - $pay_aa ;
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        $m_budget = date("m");

        $m_budget = date("m");
        if($m_budget>9){
        $yearbudget = date("Y")+544;
        }else{
        $yearbudget = date("Y")+543;
        }
        
        $year_id = $yearbudget;
    
        $year24 = $year_id - 540;  //2524
        $year23 = $year_id - 541;  //2523
        $year22 = $year_id - 542;  //2522
        $year21 = $year_id - 543;  //2521
        $year20 = $year_id - 544;  // 2520
        $year19 = $year_id - 545;  //2519
    
        $day =  date("y-m-d");
        // $year =  date("y-m-d");
        // $year = date("m");
        // $mont = date("m");
        $date = Carbon::now();

        // $opdcount = Tb_opd::count();
        // $ipdcount = Tb_ipd::count();
    
        // $opdcountL = Tb_opd::where('datescan','=',$day)->count();
        // $ipdcountL = Tb_ipd::where('datescan','=',$day)->count();
    
        // $opd123 = Tb_opd::where('datescan','like',$year23.'-01%')->sum('pages');
        // $opd223 = Tb_opd::where('datescan','like',$year23.'-02%')->sum('pages');
        // $opd323 = Tb_opd::where('datescan','like',$year23.'-03%')->sum('pages');
        // $opd423 = Tb_opd::where('datescan','like',$year23.'-04%')->sum('pages');
        // $opd523 = Tb_opd::where('datescan','like',$year23.'-05%')->sum('pages');
        // $opd623 = Tb_opd::where('datescan','like',$year23.'-06%')->sum('pages');
        // $opd723 = Tb_opd::where('datescan','like',$year23.'-07%')->sum('pages');
        // $opd823 = Tb_opd::where('datescan','like',$year23.'-08%')->sum('pages');
        // $opd923 = Tb_opd::where('datescan','like',$year23.'-09%')->sum('pages');
        // $opd1023 = Tb_opd::where('datescan','like',$year23.'-10%')->sum('pages');
        // $opd1123 = Tb_opd::where('datescan','like',$year23.'-11%')->sum('pages');
        // $opd1223 = Tb_opd::where('datescan','like',$year23.'-12%')->sum('pages');
    
     
    
        // $opd122 = Tb_opd::table('tb_opd')->where('datescan','like',$year22.'-01%')->sum('pages');
        // $opd222 = Tb_opd::where('datescan','like',$year22.'-02%')->sum('pages');
        // $opd322 = Tb_opd::where('datescan','like',$year22.'-03%')->sum('pages');
        // $opd422 = Tb_opd::where('datescan','like',$year22.'-04%')->sum('pages');
        // $opd522 = Tb_opd::where('datescan','like',$year22.'-05%')->sum('pages');
        // $opd622 = Tb_opd::where('datescan','like',$year22.'-06%')->sum('pages');
        // $opd722 = Tb_opd::where('datescan','like',$year22.'-07%')->sum('pages');
        // $opd822 = Tb_opd::where('datescan','like',$year22.'-08%')->sum('pages');
        // $opd922 = Tb_opd::where('datescan','like',$year22.'-09%')->sum('pages');
        // $opd1022 = Tb_opd::where('datescan','like',$year22.'-10%')->sum('pages');
        // $opd1122 = Tb_opd::where('datescan','like',$year22.'-11%')->sum('pages');
        // $opd1222 = Tb_opd::where('datescan','like',$year22.'-12%')->sum('pages');
    
        // $opd1 = Tb_opd::where('datescan','like',$year21.'-01%')->sum('pages');
        // $opd2 = Tb_opd::where('datescan','like',$year21.'-02%')->sum('pages');
        // $opd3 = Tb_opd::where('datescan','like',$year21.'-03%')->sum('pages');
        // $opd4 = Tb_opd::where('datescan','like',$year21.'-04%')->sum('pages');
        // $opd5 = Tb_opd::where('datescan','like',$year21.'-05%')->sum('pages');
        // $opd6 = Tb_opd::where('datescan','like',$year21.'-06%')->sum('pages');
        // $opd7 = Tb_opd::where('datescan','like',$year21.'-07%')->sum('pages');
        // $opd8 = Tb_opd::where('datescan','like',$year21.'-08%')->sum('pages');
        // $opd9 = Tb_opd::where('datescan','like',$year21.'-09%')->sum('pages');
        // $opd10 = Tb_opd::where('datescan','like',$year21.'-10%')->sum('pages');
        // $opd11 = Tb_opd::where('datescan','like',$year21.'-11%')->sum('pages');
        // $opd12 = Tb_opd::where('datescan','like',$year21.'-12%')->sum('pages');
    
        // $opd11 = Tb_opd::where('datescan','like',$year20.'-01%')->sum('pages');
        // $opd21 = Tb_opd::where('datescan','like',$year20.'-02%')->sum('pages');
        // $opd31 = Tb_opd::where('datescan','like',$year20.'-03%')->sum('pages');
        // $opd41 = Tb_opd::where('datescan','like',$year20.'-04%')->sum('pages');
        // $opd51 = Tb_opd::where('datescan','like',$year20.'-05%')->sum('pages');
        // $opd61 = Tb_opd::where('datescan','like',$year20.'-06%')->sum('pages');
        // $opd71 = Tb_opd::where('datescan','like',$year20.'-07%')->sum('pages');
        // $opd81 = Tb_opd::where('datescan','like',$year20.'-08%')->sum('pages');
        // $opd91 = Tb_opd::where('datescan','like',$year20.'-09%')->sum('pages');
        // $opd101 = Tb_opd::where('datescan','like',$year20.'-10%')->sum('pages');
        // $opd111 = Tb_opd::where('datescan','like',$year20.'-11%')->sum('pages');
        // $opd121 = Tb_opd::where('datescan','like',$year20.'-12%')->sum('pages');
    
        // $opd12 = Tb_opd::where('datescan','like',$year19.'-01%')->sum('pages');
        // $opd22 = Tb_opd::where('datescan','like',$year19.'-02%')->sum('pages');
        // $opd32 = Tb_opd::where('datescan','like',$year19.'-03%')->sum('pages');
        // $opd42 = Tb_opd::where('datescan','like',$year19.'-04%')->sum('pages');
        // $opd52 = Tb_opd::where('datescan','like',$year19.'-05%')->sum('pages');
        // $opd62 = Tb_opd::where('datescan','like',$year19.'-06%')->sum('pages');
        // $opd72 = Tb_opd::where('datescan','like',$year19.'-07%')->sum('pages');
        // $opd82 = Tb_opd::where('datescan','like',$year19.'-08%')->sum('pages');
        // $opd92 = Tb_opd::where('datescan','like',$year19.'-09%')->sum('pages');
        // $opd102 = Tb_opd::where('datescan','like',$year19.'-10%')->sum('pages');
        // $opd112 = Tb_opd::where('datescan','like',$year19.'-11%')->sum('pages');
        // $opd122 = Tb_opd::where('datescan','like',$year19.'-12%')->sum('pages');
        $usercount = User::count();
        $opdcount = DB::connection('mysql3')->table('tb_opd')->count();
        $ipdcount = DB::connection('mysql3')->table('tb_ipd')->count();
    
        $opdcountL = DB::connection('mysql3')->table('tb_opd')->where('datescan','=',$day)->count();
        $ipdcountL = DB::connection('mysql3')->table('tb_ipd')->where('datescan','=',$day)->count();
    
        $opd123 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-01%')->sum('pages');
        $opd223 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-02%')->sum('pages');
        $opd323 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-03%')->sum('pages');
        $opd423 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-04%')->sum('pages');
        $opd523 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-05%')->sum('pages');
        $opd623 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-06%')->sum('pages');
        $opd723 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-07%')->sum('pages');
        $opd823 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-08%')->sum('pages');
        $opd923 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-09%')->sum('pages');
        $opd1023 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-10%')->sum('pages');
        $opd1123 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-11%')->sum('pages');
        $opd1223 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-12%')->sum('pages');
    
     
    
        $opd122 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-01%')->sum('pages');
        $opd222 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-02%')->sum('pages');
        $opd322 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-03%')->sum('pages');
        $opd422 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-04%')->sum('pages');
        $opd522 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-05%')->sum('pages');
        $opd622 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-06%')->sum('pages');
        $opd722 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-07%')->sum('pages');
        $opd822 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-08%')->sum('pages');
        $opd922 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-09%')->sum('pages');
        $opd1022 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-10%')->sum('pages');
        $opd1122 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-11%')->sum('pages');
        $opd1222 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-12%')->sum('pages');
    
        $opd1 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-01%')->sum('pages');
        $opd2 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-02%')->sum('pages');
        $opd3 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-03%')->sum('pages');
        $opd4 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-04%')->sum('pages');
        $opd5 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-05%')->sum('pages');
        $opd6 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-06%')->sum('pages');
        $opd7 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-07%')->sum('pages');
        $opd8 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-08%')->sum('pages');
        $opd9 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-09%')->sum('pages');
        $opd10 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-10%')->sum('pages');
        $opd11 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-11%')->sum('pages');
        $opd12 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-12%')->sum('pages');
    
        $opd11 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-01%')->sum('pages');
        $opd21 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-02%')->sum('pages');
        $opd31 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-03%')->sum('pages');
        $opd41 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-04%')->sum('pages');
        $opd51 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-05%')->sum('pages');
        $opd61 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-06%')->sum('pages');
        $opd71 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-07%')->sum('pages');
        $opd81 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-08%')->sum('pages');
        $opd91 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-09%')->sum('pages');
        $opd101 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-10%')->sum('pages');
        $opd111 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-11%')->sum('pages');
        $opd121 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-12%')->sum('pages');
    
        $opd12 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-01%')->sum('pages');
        $opd22 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-02%')->sum('pages');
        $opd32 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-03%')->sum('pages');
        $opd42 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-04%')->sum('pages');
        $opd52 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-05%')->sum('pages');
        $opd62 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-06%')->sum('pages');
        $opd72 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-07%')->sum('pages');
        $opd82 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-08%')->sum('pages');
        $opd92 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-09%')->sum('pages');
        $opd102 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-10%')->sum('pages');
        $opd112 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-11%')->sum('pages');
        $opd122 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-12%')->sum('pages');

        return view('dashbord_home',[
            'data'=>$data, 'usercount'=>$usercount,
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,  
            'recieve_aa' => $recieve_aa,'pay_aa' => $pay_aa,'total_aa' => $total_aa,
            'opdcount'=>$opdcount,'ipdcount'=>$ipdcount,'opdcountL'=>$opdcountL,'ipdcountL'=>$ipdcountL,
            'opd1'=>$opd1,'opd2'=>$opd2, 'opd3'=>$opd3,'opd4'=>$opd4, 'opd5'=>$opd5,'opd6'=>$opd6, 
            'opd7'=>$opd7,'opd8'=>$opd8, 'opd9'=>$opd9,'opd10'=>$opd10,'opd11'=>$opd11,'opd12'=>$opd12,    
            'opd11'=>$opd11,'opd21'=>$opd21, 'opd31'=>$opd31,'opd41'=>$opd41, 'opd51'=>$opd51,'opd61'=>$opd61, 
            'opd71'=>$opd71,'opd81'=>$opd81, 'opd91'=>$opd91,'opd101'=>$opd101,'opd111'=>$opd111,'opd121'=>$opd121,    
            'opd12'=>$opd12,'opd22'=>$opd22, 'opd32'=>$opd32,'opd42'=>$opd42, 'opd52'=>$opd52,'opd62'=>$opd62, 
            'opd72'=>$opd72,'opd82'=>$opd82, 'opd92'=>$opd92,'opd102'=>$opd102,'opd112'=>$opd112,'opd122'=>$opd122,    
            'opd122'=>$opd122,'opd222'=>$opd222, 'opd322'=>$opd322,'opd422'=>$opd422, 'opd522'=>$opd522,'opd622'=>$opd622, 
            'opd722'=>$opd722,'opd822'=>$opd822, 'opd922'=>$opd922,'opd1022'=>$opd1022,'opd1122'=>$opd1122,'opd1222'=>$opd1222, 
            'opd123'=>$opd123,'opd223'=>$opd223, 'opd323'=>$opd323,'opd423'=>$opd423, 'opd523'=>$opd523,'opd623'=>$opd623, 
            'opd723'=>$opd723,'opd823'=>$opd823, 'opd923'=>$opd923,'opd1023'=>$opd1023,'opd1123'=>$opd1123,'opd1223'=>$opd1223,
        ]);
    }
    public function dashbord_medical(Request $request,$idstore,$iduser)
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

        return view('dashbord_medical',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
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
    public function dashboard_hos(Request $request,$idstore,$iduser)
    {
        $per_co1 = Person::where('house_regist_type_id','=','1')->count();
        $per_co2 = Person::where('house_regist_type_id','=','2')->count();
        $per_co3 = Person::where('house_regist_type_id','=','3')->count();
        $per_co4 = Person::where('house_regist_type_id','=','4')->count();

        $per_00 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','00')->count();
        $per_02 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','02')->count();
        $per_09 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','09')->count();
        $per_25 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','25')->count();
        $per_26 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','26')->count();
        $per_27 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','27')->count();
        $per_28 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','28')->count();
        $per_29 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','29')->count();
        $per_45 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','45')->count();
        $per_46 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','46')->count();
        $per_47 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','47')->count();
        $per_71 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','71')->count();
        $per_72 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','72')->count();
        $per_73 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','73')->count();
        $per_74 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','74')->count();
        $per_75 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','75')->count();
        $per_76 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','76')->count();
        $per_77 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','77')->count();
        $per_78 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','78')->count();
        $per_79 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','79')->count();
        $per_80 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','80')->count();
        $per_81 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','81')->count();
        $per_82 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','82')->count();
        $per_87 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','87')->count();
        $per_88 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','88')->count();
        $per_89 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','89')->count();
        $per_90 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','90')->count();
        $per_L0 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L0')->count();
        $per_L1 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L1')->count();
        $per_L2 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L2')->count();
        $per_L3 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L3')->count();
        $per_L4 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L4')->count();
        $per_L5 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L5')->count();
        $per_L6 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L6')->count();
        $per_L9 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L9')->count();
        $per_ND = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','ND')->count();
        $per_nu = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','nu')->count();
        $per_NV = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','NV')->count();
        $per_O1 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O1')->count();
        $per_O2 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O2')->count();
        $per_O3 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O3')->count();
        $per_O4 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O4')->count();
        $per_O5 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O5')->count();
        $per_P1 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','P1')->count();
        $per_P2 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','P2')->count();
        $per_P3 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','P3')->count();
        $per_S1 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','S1')->count();
        $per_S2 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','S2')->count();
        $per_S3 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','S3')->count();
        $per_S6 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','S6')->count();
        $per_ST = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','ST')->count();
        $per_VD = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','VD')->count();

        $per_moo_0 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','1')->where('death','=','N')->count();
        $per_moo_1 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','2')->where('death','=','N')->count();
        $per_moo_2 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','3')->where('death','=','N')->count();
        $per_moo_3 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','4')->where('death','=','N')->count();
        $per_moo_4 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','5')->where('death','=','N')->count();
        $per_moo_5 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','6')->where('death','=','N')->count();
        $per_moo_6 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','7')->where('death','=','N')->count();
        $per_moo_7 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','8')->where('death','=','N')->count();
        $per_moo_8 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','9')->where('death','=','N')->count();
        $per_moo_9 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','10')->where('death','=','N')->count();
        $per_moo_10 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','11')->where('death','=','N')->count();
        $per_moo_11 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','12')->where('death','=','N')->count();
        $per_moo_12 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','13')->where('death','=','N')->count();

        $per_anc1 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2015-10-1', '2016-09-30'])->count();
        $per_anc2 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2016-10-1', '2017-09-30'])->count();
        $per_anc3 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2017-10-1', '2018-09-30'])->count();
        $per_anc4 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2018-10-1', '2019-09-30'])->count();
        $per_anc5 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2019-10-1', '2020-09-30'])->count();
        $per_anc6 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2020-10-1', '2021-09-30'])->count();
        $per_anc7 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2021-10-1', '2022-09-30'])->count();
        $per_anc8 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2022-10-1', '2023-09-30'])->count();
        $per_anc9 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2023-10-1', '2024-09-30'])->count();
        $per_anc10 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2024-10-1', '2025-09-30'])->count();
        $per_anc11 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2025-10-1', '2026-09-30'])->count();
        $per_anc12 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2026-10-1', '2027-09-30'])->count();
        $per_anc13 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2027-10-1', '2028-09-30'])->count();

        //==================================================================DM=================================================================================//

        $per_dm01 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2007-10-1', '2008-09-30'])->count();
        $per_dm02 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2008-10-1', '2009-09-30'])->count();
        $per_dm03 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2009-10-1', '2010-09-30'])->count();
        $per_dm04 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2010-10-1', '2011-09-30'])->count();
        $per_dm05 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2011-10-1', '2012-09-30'])->count();
        $per_dm06 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2012-10-1', '2013-09-30'])->count();
        $per_dm07 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2013-10-1', '2014-09-30'])->count();
        $per_dm08 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2014-10-1', '2015-09-30'])->count();

        $per_dm1 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2015-10-1', '2016-09-30'])->count();
        $per_dm2 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2016-10-1', '2017-09-30'])->count();
        $per_dm3 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2017-10-1', '2018-09-30'])->count();
        $per_dm4 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2018-10-1', '2019-09-30'])->count();
        $per_dm5 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2019-10-1', '2020-09-30'])->count();
        $per_dm6 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2020-10-1', '2021-09-30'])->count();
        $per_dm7 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2021-10-1', '2022-09-30'])->count();
        $per_dm8 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2022-10-1', '2023-09-30'])->count();
        $per_dm9 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2023-10-1', '2024-09-30'])->count();
        $per_dm10 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2024-10-1', '2025-09-30'])->count();
        $per_dm11 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2025-10-1', '2026-09-30'])->count();
        $per_dm12 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2026-10-1', '2027-09-30'])->count();
        $per_dm13 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2027-10-1', '2028-09-30'])->count();

        //==================================================================HT=================================================================================//
        $per_ht1 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2007-10-1', '2008-09-30'])->count();
        $per_ht2 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2008-10-1', '2009-09-30'])->count();
        $per_ht3 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2009-10-1', '2010-09-30'])->count();
        $per_ht4 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2010-10-1', '2011-09-30'])->count();
        $per_ht5 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2011-10-1', '2012-09-30'])->count();
        $per_ht6 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2012-10-1', '2013-09-30'])->count();
        $per_ht7 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2013-10-1', '2014-09-30'])->count();
        $per_ht8 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2014-10-1', '2015-09-30'])->count();
        $per_ht9 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2015-10-1', '2016-09-30'])->count();
        $per_ht10 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2016-10-1', '2017-09-30'])->count();
        $per_ht11 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2017-10-1', '2018-09-30'])->count();
        $per_ht12 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2018-10-1', '2019-09-30'])->count();
        $per_ht13 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2019-10-1', '2020-09-30'])->count();
        $per_ht14 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2020-10-1', '2021-09-30'])->count();
        $per_ht15 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2021-10-1', '2022-09-30'])->count();
        $per_ht16 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2022-10-1', '2023-09-30'])->count();
        $per_ht17 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2023-10-1', '2024-09-30'])->count();
        $per_ht18 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2024-10-1', '2025-09-30'])->count();
        $per_ht19 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2025-10-1', '2026-09-30'])->count();
        $per_ht20 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2026-10-1', '2027-09-30'])->count();
    $per_ht21 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2027-10-1', '2028-09-30'])->count();

        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
        return view('dashboard_hos',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'per_ht1'=>$per_ht1,'per_ht2'=>$per_ht2,'per_ht3'=>$per_ht3,'per_ht4'=>$per_ht4,'per_ht5'=>$per_ht5,'per_ht6'=>$per_ht6,'per_ht7'=>$per_ht7,'per_ht8'=>$per_ht8,
            'per_ht9'=>$per_ht9,'per_ht10'=>$per_ht10,'per_ht11'=>$per_ht11,'per_ht12'=>$per_ht12,'per_ht13'=>$per_ht13,'per_ht14'=>$per_ht14,'per_ht15'=>$per_ht15,'per_ht16'=>$per_ht16,
            'per_ht17'=>$per_ht17,'per_ht18'=>$per_ht18,'per_ht19'=>$per_ht19,'per_ht20'=>$per_ht20,'per_ht21'=>$per_ht21,

            'per_dm1'=>$per_dm1,'per_dm2'=>$per_dm2,'per_dm3'=>$per_dm3,'per_dm4'=>$per_dm4,'per_dm5'=>$per_dm5,'per_dm6'=>$per_dm6,'per_dm7'=>$per_dm7,'per_dm8'=>$per_dm8,
            'per_dm9'=>$per_dm9,'per_dm10'=>$per_dm10,'per_dm11'=>$per_dm11,'per_dm12'=>$per_dm12,'per_dm13'=>$per_dm13,
            'per_dm01'=>$per_dm01,'per_dm02'=>$per_dm02,'per_dm03'=>$per_dm03,'per_dm04'=>$per_dm04,
            'per_dm05'=>$per_dm05,'per_dm06'=>$per_dm06,'per_dm07'=>$per_dm07,'per_dm08'=>$per_dm08,
            'per_anc1'=>$per_anc1, 'per_anc2'=>$per_anc2, 'per_anc3'=>$per_anc3, 'per_anc4'=>$per_anc4, 'per_anc5'=>$per_anc5, 'per_anc6'=>$per_anc6, 'per_anc7'=>$per_anc7,
            'per_anc8'=>$per_anc8, 'per_anc9'=>$per_anc9, 'per_anc10'=>$per_anc10, 'per_anc11'=>$per_anc11, 'per_anc12'=>$per_anc12, 'per_anc13'=>$per_anc13,
            'per_moo_0'=>$per_moo_0, 'per_moo_1'=>$per_moo_1, 'per_moo_2'=>$per_moo_2, 'per_moo_3'=>$per_moo_3, 'per_moo_4'=>$per_moo_4,
            'per_moo_5'=>$per_moo_5, 'per_moo_6'=>$per_moo_6, 'per_moo_7'=>$per_moo_7, 'per_moo_8'=>$per_moo_8, 'per_moo_9'=>$per_moo_9,
            'per_moo_10'=>$per_moo_10, 'per_moo_11'=>$per_moo_11, 'per_moo_12'=>$per_moo_12,
            'per_co1'=>$per_co1, 'per_co2'=>$per_co2, 'per_co3'=>$per_co3, 'per_co4'=>$per_co4,
            'per_00'=>$per_00,'per_02'=>$per_02,'per_09'=>$per_09,'per_25'=>$per_25,'per_26'=>$per_26,'per_27'=>$per_27,'per_28'=>$per_28,
            'per_29'=>$per_29,'per_45'=>$per_45,'per_46'=>$per_46,'per_47'=>$per_47,'per_71'=>$per_71,'per_72'=>$per_72,'per_73'=>$per_73,'per_74'=>$per_74,'per_75'=>$per_75,'per_76'=>$per_76,
            'per_77'=>$per_77,'per_78'=>$per_78,'per_79'=>$per_79,'per_80'=>$per_80,'per_81'=>$per_81,'per_82'=>$per_82,'per_87'=>$per_87,'per_88'=>$per_88,'per_89'=>$per_89,'per_90'=>$per_90,
            'per_L0'=>$per_L0,'per_L1'=>$per_L1,'per_L2'=>$per_L2,'per_L3'=>$per_L3,'per_90'=>$per_90,'per_82'=>$per_82,'per_87'=>$per_87,'per_88'=>$per_88,'per_89'=>$per_89,'per_L4'=>$per_L4,
            'per_L5'=>$per_L5,'per_L6'=>$per_L6,'per_L9'=>$per_L9,'per_ND'=>$per_ND,'per_nu'=>$per_nu,'per_NV'=>$per_NV,'per_O1'=>$per_O1,'per_O2'=>$per_O2,'per_O3'=>$per_O3,'per_O4'=>$per_O4,
            'per_O5'=>$per_O5,'per_P1'=>$per_P1,'per_P2'=>$per_P2,'per_P3'=>$per_P3,'per_S1'=>$per_S1,'per_S2'=>$per_S2,'per_S3'=>$per_S3,'per_S6'=>$per_S6,'per_ST'=>$per_ST,'per_VD'=>$per_VD,
            ]);
    }

    public function sss(Request $request)
    {
        $item = DB::connection('mysql2')->table('person')->leftjoin('hdc_nhso','person.cid','=','hdc_nhso.Person_ID')->where('death','=','N')->get();
        $Pttype = Pttype::get();
        $tumbon = DB::table('clinic_locate')->get();
        $Hm = DB::table('clinic_hmain')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        return view('hos.sss',[
            'data_hos'=>$data_hos,
            'items'=>$item,
            'Pttypes' => $Pttype,
            'tumbons' => $tumbon,
            'Hms' => $Hm
        ]);

    }
    public function hdc(Request $request)
    {
        $per = Person::where('death','=','N')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        return view('hos.hdc',[
            'data_hos'=>$data_hos,
            'pers'=>$per
        ]);

    }
    public function api_hdc(Request $request)
    {
        $per = Person::where('death','=','N')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
         return response()->json([
            'data_hos'=>$data_hos,
            'status'=>true,
            'response'=>$per,
            'message'=>'All person'
        ], 200);
    }
    public static function sumdrug_hos_qty($icode)
    {
        //  $sumrecieve  =  Clinic_recieve_store::where('STORE_RECIEVE_DRUG_ID','=',$id)->sum('STORE_RECIEVE_DRUG_QTY');
        //  $sumpay  =  Clinic_pay_store::where('PAYDETAIL_DRUG_ID','=',$id)->sum('PAYDETAIL_DRUG_QTY');
         $sumdrug_opitem  =  Opitemrece::where('icode','=',$icode)->sum('qty');

         $totalvalue =   $sumdrug_opitem ;

       return $totalvalue ;
    }

    public function drug_hos(Request $request)
    {
        $idstore =  Auth::user()->store_id;

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

        $drug_hos = Drugitems::where('istatus','=','Y')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        return view('hos.drug_hos',[
            'data_hos'=>$data_hos,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'drug_hoss' => $drug_hos,

        ]);
    }

    public function drug_hos_save(Request $request)
    {
        if($request->store_id != '' || $request->store_id != null){

        $store_id = $request->store_id;
        $d_icode = $request->icode;
        $d_name = $request->name;
        $d_strength = $request->strength;
        $d_units = $request->units;
        $d_unitprice = $request->unitprice;
        $d_unitcost = $request->unitcost;
        $d_did = $request->did;
        $d_istatus = $request->istatus;
        $d_therapeutic = $request->therapeutic;
        $d_qty = $request->qty;

        $number =count($store_id);
        $count = 0;
        for($count = 0; $count< $number; $count++)
        {
            $add= new Clinic_drug();
            $add->DRUG_CODE = $d_icode[$count];
            $add->DRUG_NAME = $d_name[$count];

            if($d_units[$count] == 'TABLET'){
                $add->DRUG_UNIT = 1;
           }elseif($d_units[$count] == 'เม็ด'){
                $add->DRUG_UNIT = 2;
           }elseif($d_units[$count] == 'CAPSULE'){
                $add->DRUG_UNIT = 3;
           }elseif($d_units[$count] == 'TAB'){
                $add->DRUG_UNIT = 4;
            }elseif($d_units[$count] == 'ขวด (10 ML.)'){
                $add->DRUG_UNIT = 5;
            }elseif($d_units[$count] == 'ขวด (60 ML.)'){
                $add->DRUG_UNIT = 6;
            }elseif($d_units[$count] == 'ขวด (120 ML.)'){
                $add->DRUG_UNIT = 7;
            }elseif($d_units[$count] == 'ขวด (180 ML)'){
                $add->DRUG_UNIT = 8;
            }elseif($d_units[$count] == 'ขวด (240 ML)'){
                $add->DRUG_UNIT = 9;
            }elseif($d_units[$count] == 'AMP (1 ml.)'){
                $add->DRUG_UNIT = 10;
            }elseif($d_units[$count] == 'หลอด (15 G.)'){
                $add->DRUG_UNIT = 11;
            }elseif($d_units[$count] == 'ขวด (450 ML.)'){
                $add->DRUG_UNIT = 12;
            }elseif($d_units[$count] == 'BAG (500 ML.)'){
                $add->DRUG_UNIT = 13;
            }elseif($d_units[$count] == 'BAG (1000 ML.)'){
                $add->DRUG_UNIT = 14;
            }elseif($d_units[$count] == 'AMP (2 ml.)'){
                $DRUG_UNIT = 15;
            }elseif($d_units[$count] == 'AMP (3 ML.)'){
                $add->DRUG_UNIT = 16;
            }elseif($d_units[$count] == 'หลอด (30 G.)'){
                $add->DRUG_UNIT = 17;
            }elseif($d_units[$count] == 'หลอด (45 G.)'){
                $add->DRUG_UNIT = 18;
            }elseif($d_units[$count] == 'ซอง (3.3 G.)'){
                $add->DRUG_UNIT = 19;
            }elseif($d_units[$count] == 'ซอง (6.97 G.)'){
                $add->DRUG_UNIT = 20;
            }elseif($d_units[$count] == 'หลอด (5 G.)'){
                $add->DRUG_UNIT = 21;
           }else{
                $add->DRUG_UNIT = '';
           }

            $add->DRUG_STRENGTH = $d_strength[$count];
            $add->DRUG_UNIT_PRICE = $d_unitprice[$count];
            $add->DRUG_UNIT_PRICE_COST = $d_unitcost[$count];
            $add->DRUG_DID = $d_did[$count];
            $add->STATUS = $d_istatus[$count];
            $add->THERAPEUTIC = $d_therapeutic[$count];
            $add->DRUG_STORE = $store_id[$count];
            $add->save();
         }
        }
        return redirect()->route('hos.drug_hos')->with('success','นำเข้ารายการยาเรียบร้อยแล้ว');

    }




}
