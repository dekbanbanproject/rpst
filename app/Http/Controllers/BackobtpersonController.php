<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Products;
use App\Models\User;
use App\Models\users_permise;
use Illuminate\Support\Facades\Hash;
use App\Models\Position;
use App\Models\Store_main;
use App\Models\Store_sub;
use App\Models\Units;
use App\Models\Category;
use App\Models\Pageleft_one;
use App\Models\Pageleft_two;
use App\Models\Pageleft_tree;
use App\Models\Pageleft_four;
use App\Models\Pageleft_five;
use App\Models\Pageleftmodule;
use App\Models\Pageleftmodule_sub;
use App\Models\Page_group;
use App\Models\Page_slidepicture;
use App\Models\Quality;
use App\Models\Depart;
use Image;
use PDF;

date_default_timezone_set("Asia/Bangkok");

class BackobtpersonController extends Controller
{
    function position(Request $request)
    {
        if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
        ->get();

        $page1 = Pageleft_one::count();
        $page2 = Pageleft_two::count();
        $page3 = Pageleft_tree::count();
        $page4 = Pageleft_four::count();
        $page5 = Pageleft_five::count();
        $pageModulecount = Pageleftmodule::count();
        $pagegroupcount = Page_group::count();
      
        $posit = Position::get();
        $page = Pageleft_two::get();
        $pageModule = Pageleftmodule::get();
        $pagegroup = Page_group::get();
        $pagegroupright = Page_group::where('group_type', '=','2')->get();
        $qua = Quality::get();

        return view('back_obt.position',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,'pagegrouprights'=>$pagegroupright,         
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,'quas'=>$qua,
        ]);
    }
    
    function position_save(Request $request)
    {        
        $add = new Position();
        $add->POSIT_NAME = $request->POSIT_NAME;
        $add->save(); 
        return redirect()->route('obt.position');
    }

    function position_update(Request $request)
    {
        $id = $request->POSIT_ID;
        $update = Position::find($id);
        $update->POSIT_NAME = $request->POSIT_NAME;
        $update->save();

        return redirect()->route('obt.position');
    }
    function position_delete(Request $request,$id)
    {
        Position::destroy($id);
        return redirect()->route('obt.position');
    }
    function switchactive_position(Request $request)
    {
        $id = $request->position;
        $active = Position::find($id);
        $active->status = $request->onoff;
        $active->save();
    }
//==========================================================//
function depart(Request $request)
{
    if (session()->has('LogedUser')) {
    $data = User::where('id','=',session('LogedUser'))->first();
    }
    $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
    ->get();

    $page1 = Pageleft_one::count();
    $page2 = Pageleft_two::count();
    $page3 = Pageleft_tree::count();
    $page4 = Pageleft_four::count();
    $page5 = Pageleft_five::count();
    $pageModulecount = Pageleftmodule::count();
    $pagegroupcount = Page_group::count();
  
   
    $page = Pageleft_two::get();
    $pagegroupright = Page_group::where('group_type', '=','2')->get();
    $posit = Position::get();
    $dep = Depart::get();    
    $pageModule = Pageleftmodule::get();
    $pagegroup = Page_group::get();

    return view('back_obt.depart',[
        'data'=>$data,'user'=>$user,
        'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,'pagegrouprights'=>$pagegroupright,         
        'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
        'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
        'pageModulecount'=>$pageModulecount,'deps'=>$dep,
    ]);
}

function depart_save(Request $request)
{        
    $add = new Depart();
    $add->departs_name = $request->departs_name;
    $add->departs_token = $request->departs_token;
    $add->save(); 
    return redirect()->route('obt.depart');
}

function depart_update(Request $request)
{
    $id = $request->departs_id;
    $update = Depart::find($id);
    $update->departs_name = $request->departs_name;
    $update->departs_token = $request->departs_token;
    $update->save();

    return redirect()->route('obt.depart');
}
function depart_delete(Request $request,$id)
{
    Depart::destroy($id);
    return redirect()->route('obt.depart');
}
function switchactive_depart(Request $request)
{
    $id = $request->depart;
    $active = Depart::find($id);
    $active->status = $request->onoff;
    $active->save();
}
//==========================================================//

}
