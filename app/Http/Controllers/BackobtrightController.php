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

use Image;
use PDF;

date_default_timezone_set("Asia/Bangkok");

class BackobtrightController extends Controller
{

    function page_groupright(Request $request)
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
      
        $posit = Position::get();
        $page = Pageleft_two::get();
        $pageModule = Pageleftmodule::get();
        $pagegroup = Page_group::get();
        $pagegroupright = Page_group::where('group_type', '=','2')->get();
        $pageModulecount = Pageleftmodule::count();
        $pagegroupcount = Page_group::count();

        return view('back_obt.page_groupright',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,'pagegrouprights'=>$pagegroupright,         
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,
        ]);
    }
    function page_group_save(Request $request)
    {        
        $add = new Page_group();
        $add->group_name = $request->group_name;
        $add->save(); 
        return redirect()->route('obt.page_group');
    }
    function page_group_update(Request $request)
    {
        $id = $request->group_id;
        $update = Page_group::find($id);
        $update->group_name = $request->group_name;
        $update->save();

        return redirect()->route('obt.page_group');
    }
    function page_group_delete(Request $request,$id)
    {
        Page_group::destroy($id);
        return redirect()->route('obt.page_group');
    }
    function switchactive_group(Request $request)
    {
        $id = $request->group;
        $active = Page_group::find($id);
        $active->status = $request->onoff;
        $active->save();
    }
//==========================================================//

}
