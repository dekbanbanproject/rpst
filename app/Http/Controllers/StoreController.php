<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users_permise;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Image;
use PDF;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Position;
use App\Models\Store_main;
use App\Models\Store_sub;
use App\Models\Units;
use App\Models\Category;
use App\Models\Products;

date_default_timezone_set("Asia/Bangkok");

class StoreController extends Controller
{
    function dashboard_store(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }
        $year = date('Y');
        $idstore = $data->store_id;
        $iduser = $data->id;

        $user = User::get();
        $usercount = User::count();
        $pocount = Position::count();
        $stmcount = Store_main::count();
        $stscount = Store_sub::count();
        $unitcount = Units::count();
        $catcount = Category::count();
        $prodcount = Products::count();

        $countad = User::where('admin','=','on')->count();
        $countre = User::count('read');
        $countwr = User::count('write');
        $countpr = User::count('print');

        $total = $countad. '+' .$countre. '+' .$countwr.'+' .$countpr;

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

        return view('dashbord_store', [
            'usercount'=>$usercount, 'pocount'=>$pocount, 'stmcount'=>$stmcount, 'stscount'=>$stscount,
            'unitcount'=>$unitcount, 'catcount'=>$catcount, 'prodcount'=>$prodcount,
           'data'=>$data,'user'=>$user,'total'=>$total,
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
    function editprofile(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }

        $user = User::get();

        $countad = User::where('admin','=','on')->count();
        $countre = User::count('read');
        $countwr = User::count('write');
        $countpr = User::count('print');

        $total = $countad. '+' .$countre. '+' .$countwr.'+' .$countpr;

        return view('backend/profile/editprofile', [
           'data'=>$data,
            'user'=>$user,
            'total'=>$total,
        ]);
    }
    public static function countad ($id)
    {
        $countad = User::where('id','=',$id)
        ->where('admin','!=','')
        ->count(); 
        return $countad;
    }

    public static function countpermise ($id)
    {
        $countad = User::where('id','=',$id)->where('admin','!=','')->count();
        $countre = User::where('id','=',$id)->where('read','!=','')->count();
        $countwr = User::where('id','=',$id)->where('write','!=','')->count();
        $countpr = User::where('id','=',$id)->where('print','!=','')->count(); 

        $countpermise = $countad + $countre + $countwr + $countpr;

        return $countpermise;
    }
  
    function updateprofile(Request $request)
    {
        $id = $request->id_update;

            $update= User::find($id);            
            $update->admin = $request->admin;
            $update->read = $request->read;
            $update->write = $request->write;
            $update->print = $request->print;
            $update->save();  
        return redirect()->route('editprofile');

    }

    function saveprofile(Request $request)
    {
          $add= new User();  
            $add->name = $request->name;
            $add->username = $request->username;
            $add->password = $request->password;
            $add->admin = $request->admin;
            $add->read = $request->read;
            $add->write = $request->write;
            $add->print = $request->print;
            if($request->hasFile('img')){
                $file = $request->file('img');
                $contents = $file->openFile()->fread($file->getSize());
                $add->img = $contents;
            }
            $add->save();  
        return redirect()->route('editprofile');

    }
    function updatenameprofile(Request $request)
    {
            $id = $request->id_update;

            $update= User::find($id);  
            $update->name = $request->name;
            $update->username = $request->username;
            $update->password = Hash::make($request->password);
           
            if($request->hasFile('img')){
                $file = $request->file('img');
                $contents = $file->openFile()->fread($file->getSize());
                $update->img = $contents;
            }
            $update->save();  
        return redirect()->route('editprofile');

    }


}
