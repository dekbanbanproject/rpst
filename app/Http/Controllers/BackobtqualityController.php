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
use Image;
use PDF;

date_default_timezone_set("Asia/Bangkok");

class BackobtqualityController extends Controller
{

    function quality(Request $request)
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

        return view('back_obt.quality',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,'pagegrouprights'=>$pagegroupright,         
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,'quas'=>$qua,
        ]);
    }
    function quality_add(Request $request)
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
        $pageModule = Pageleftmodule::where('status','=','true')->get();
        $pagegroup = Page_group::where('status','=','true')->get();

        return view('back_obt.quality_add',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,            
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,
        ]);
    }
    function quality_save(Request $request)
    {        
        $add = new Quality();
        $add->quality_name = $request->quality_name;
        $add->quality_detail = $request->summary_ckeditor;
        $add->quality_namesub = $request->quality_namesub;

        $idgroup = $request->group_id;
        $idg = Page_group::where('group_id', $idgroup)->first();
        $add->group_id = $idg->group_id;
        $add->group_name = $idg->group_name;

        $idmodule = $request->module_id;
        $idmo = Pageleftmodule::where('module_id', $idmodule)->first();
        $add->module_id = $idmo->module_id;
        $add->module_name = $idmo->module_name;

        $add->save(); 
        return redirect()->route('obt.quality');
    }

    function quality_edit(Request $request,$id)
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
              
        $qua = Quality::where('quality_id','=',$id)->first();
        $pageModule = Pageleftmodule::where('status','=','true')->get();
        $pagegroup = Page_group::where('status','=','true')->get();

        return view('back_obt.quality_edit',[
            'data'=>$data,'user'=>$user,            
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,'pagegroups'=>$pagegroup, 
            'page5'=>$page5, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,'pagegroupcount'=>$pagegroupcount,'quas'=>$qua, 
        ]);
    }
    function quality_update(Request $request)
    {
        $id = $request->quality_id;
        $update = Quality::find($id);
        $update->quality_name = $request->quality_name;
        $update->quality_namesub = $request->quality_namesub;
        $update->quality_detail = $request->summary_ckeditor;

        $idgroup = $request->group_id;
        $idg = Page_group::where('group_id', $idgroup)->first();
        $update->group_id = $idg->group_id;
        $update->group_name = $idg->group_name;

        $idmodule = $request->module_id;
        $idmo = Pageleftmodule::where('module_id', $idmodule)->first();
        $update->module_id = $idmo->module_id;
        $update->module_name = $idmo->module_name;

        $update->save();

        return redirect()->route('obt.quality');
    }
    function quality_delete(Request $request,$id)
    {
        Quality::destroy($id);
        return redirect()->route('obt.quality');
    }
    function switchactive_quality(Request $request)
    {
        $id = $request->qulity;
        $active = Quality::find($id);
        $active->status = $request->onoff;
        $active->save();
    }
//==========================================================//

}
