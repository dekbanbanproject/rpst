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
use App\Models\Layout;
use App\Models\Page_slidepicture;
use App\Models\Quality;
use App\Models\Contact;
use Image;
use PDF;

date_default_timezone_set("Asia/Bangkok");

class BackobtController extends Controller
{
//==========================================================//
  public function dashboard_obt(Request $request)
    {
      if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }

        $page1 = Pageleft_one::count();
        $page2 = Pageleft_two::count();
        $page3 = Pageleft_tree::count();
        $page4 = Pageleft_four::count();
        $page5 = Pageleft_five::count();
        $pageModulecount = Pageleftmodule::count();
        $pagegroupcount = Page_group::count();

      return view('dashboard_obt',[
           'data'=>$data,
           'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 
           'page4'=>$page4,'page5'=>$page5,
          'pageModulecount'=>$pageModulecount,'pagegroupcount'=>$pagegroupcount,
        ]);
    }
//==========================================================//
public function contacts(Request $request)
{
  if (session()->has('LogedUser')) {
    $data = User::where('id','=',session('LogedUser'))->first();
    }

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
        $con = Contact::get();

  return view('back_obt.contacts',[
    'data'=>$data,'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,'pagegrouprights'=>$pagegroupright,         
    'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
    'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
    'pageModulecount'=>$pageModulecount,'cons'=>$con,
    ]);
}

function switchactive_contact(Request $request)
{
    $id = $request->contact;
    $active = Contact::find($id);
    $active->status = $request->onoff;
    $active->save();
}

function contact_delete(Request $request,$id)
{
    Contact::destroy($id);
    return redirect()->route('obt.contacts');
}
//==========================================================//
    function pagepicture_slide(Request $request)
    {
        if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
        ->get();

        // $pageModule_count = Pageleftmodule::count();
        $page1 = Pageleft_one::count();
        $page2 = Pageleft_two::count();
        $page3 = Pageleft_tree::count();
        $page4 = Pageleft_four::count();
        $page5 = Pageleft_five::count();
    
        $posit = Position::get();
        $page = Pageleft_two::get();
        $pageModule = Pageleftmodule::get();
        $pagegroup = Page_group::get();
        $pagePic = Page_slidepicture::get();

        $pageModulecount = Pageleftmodule::count();
        $pagegroupcount = Page_group::count();

        return view('back_obt.pagepicture_slide',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,        
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,'pagePics'=>$pagePic,
        ]);
    }
    function pagepicture_slide_add(Request $request)
    {
        if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
        ->get();

        // $pageModule_count = Pageleftmodule::count();
        $page1 = Pageleft_one::count();
        $page2 = Pageleft_two::count();
        $page3 = Pageleft_tree::count();
        $page4 = Pageleft_four::count();
        $page5 = Pageleft_five::count();
    
        $posit = Position::get();
        $page = Pageleft_two::get();
        $pageModule = Pageleftmodule::get();
        $pagegroup = Page_group::get();
        $pagePic = Page_slidepicture::get();

        $pageModulecount = Pageleftmodule::count();
        $pagegroupcount = Page_group::count();

        return view('back_obt.pagepicture_slide_add',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,        
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,
            'pagePics'=>$pagePic,
        ]);
    }
    // function pagepicture_slide_save(Request $request)
    // {                      
    //         $image = $request->file('img');
    //         $imagename = $image->getClientOriginalName();
    //         $image->move(public_path('uploads'), $imagename);

    //         $add = new Page_picture();
    //         $add->picture_name = $request->picture_name;
    //         $add->picture = $imagename;
    //         $add->save(); 
    //         return response()->json(['success' =>$imagename]);
       
    // }
    // function pagepicture_slide_delete(Request $request,$id)
    // {
    //     Page_picture::destroy($id);
    //     return redirect()->route('obt.pagepicture_slide');
    // }
    function switchactive_picture(Request $request)
    {
        $id = $request->picture;
        $active = Page_slidepicture::find($id);
        $active->status = $request->onoff;
        $active->save();
    }

    //==========================================================//
    function page_group(Request $request)
    {
        if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
        ->get();

        // $pageModule_count = Pageleftmodule::count();
        $page1 = Pageleft_one::count();
        $page2 = Pageleft_two::count();
        $page3 = Pageleft_tree::count();
        $page4 = Pageleft_four::count();
        $page5 = Pageleft_five::count();
      
        $posit = Position::get();
        $lay = Layout::get();
        $page = Pageleft_two::get();
        $pageModule = Pageleftmodule::get();
        $pagegroup = Page_group::orderBy('group_id', 'desc')->get();
        $pageModulecount = Pageleftmodule::count();
        $pagegroupcount = Page_group::count();

        return view('back_obt.page_group',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,        
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,'lays'=>$lay,
            'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,
        ]);
    }
    function page_group_save(Request $request)
    {        
        $add = new Page_group();
        $add->group_name = $request->group_name;
        $add->layout_id = $request->layout_id;
        $add->save(); 
        return redirect()->route('obt.page_group');
    }
    function page_group_update(Request $request)
    {
        $id = $request->group_id;
        $update = Page_group::find($id);
        $update->group_name = $request->group_name;
        $update->layout_id = $request->layout_id;
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

    function pageleft_module(Request $request)
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
        $pageModule = Pageleftmodule::orderBy('module_id','desc')->get();
      

        return view('back_obt.pageleft_module',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,             
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,'pageModulecount'=>$pageModulecount,
        ]);
    }
    function pageleft_module_add(Request $request)
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
        $pagegroup = Page_group::where('status','=','true')->get();

        return view('back_obt.pageleft_module_add',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,'pagegroups'=>$pagegroup,            
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5, 'pagegroupcount'=>$pagegroupcount, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,
        ]);
    }
    function pageleft_module_save(Request $request)
    {        
        $add = new Pageleftmodule();
        $add->module_name = $request->module_name;
        $add->module_detail = $request->summary_ckeditor;

        $idgroup = $request->group_id;
        $idg = Page_group::where('group_id', $idgroup)->first();
        $add->group_id = $idg->group_id;
        $add->group_name = $idg->group_name;
        $add->save(); 
        return redirect()->route('obt.pageleft_module');
    }
    function pageleft_module_edit(Request $request,$id)
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
              
        $pageModule = Pageleftmodule::where('module_id','=',$id)->first();
        $pagegroup = Page_group::where('status','=','true')->get();

        return view('back_obt.pageleft_module_edit',[
            'data'=>$data,'user'=>$user,            
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,'pagegroups'=>$pagegroup, 
            'page5'=>$page5, 'pageModules'=>$pageModule,
            'pageModulecount'=>$pageModulecount,'pagegroupcount'=>$pagegroupcount, 
        ]);
    }

    function pageleft_module_update(Request $request)
    {
        $id = $request->module_id;
        $update = Pageleftmodule::find($id);
        $update->module_name = $request->module_name;
        $update->module_detail = $request->summary_ckeditor;

        $idgroup = $request->group_id;
        $idg = Page_group::where('group_id', $idgroup)->first();
        $update->group_id = $idg->group_id;
        $update->group_name = $idg->group_name;

        $update->save();

        return redirect()->route('obt.pageleft_module');
    }
    function pageleft_module_delete(Request $request,$id)
    {
      Pageleftmodule::destroy($id);
        return redirect()->route('obt.pageleft_module');
    }
    function switchactive_module(Request $request)
    {
        $id = $request->module;
        $active = Pageleftmodule::find($id);
        $active->status = $request->onoff;
        $active->save();
    }
//==========================================================//

    function pageleft_module_sub(Request $request,$idmodule)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }
            $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
            ->get();

        $pageModule_count = Pageleftmodule::count();
        $page1 = Pageleft_one::count();
        $page2 = Pageleft_two::count();
        $page3 = Pageleft_tree::count();
        $page4 = Pageleft_four::count();
        $page5 = Pageleft_five::count();
      
        $posit = Position::get();
        $page = Pageleft_two::get();
        $pageModule = Pageleftmodule::where('module_id','=',$idmodule)->first();
        $pageModulesub = Pageleftmodule_sub::leftJoin('pageleftmodules','pageleftmodule_subs.module_id','=','pageleftmodules.module_id')
        ->where('pageleftmodule_subs.module_id','=',$idmodule)
        ->get();

        return view('back_obt.pageleft_module_sub',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,             
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5, 'pageModule_count'=>$pageModule_count, 'pageModules'=>$pageModule, 'pageModulesubs'=>$pageModulesub,
        ]);
    }

    function upload(Request $request)
    {        
   
       if($request->hasFile('upload')) {
        //get filename with extension
        $filenamewithextension = $request->file('upload')->getClientOriginalName();
  
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
  
        //get file extension
        $extension = $request->file('upload')->getClientOriginalExtension();
  
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
  
        //Upload File
        $request->file('upload')->storeAs('public/uploads', $filenametostore);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('storage/app/public/uploads/'.$filenametostore);
        $msg = 'Image successfully uploaded';
        $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
         
        // Render HTML output
        @header('Content-type: text/html; charset=utf-8');
        echo $re;
    }
    }
    public function pageleft_module_sub_save(Request $request)
    {
        $request->validate([
            'modulsub_name' => 'required'
        ]);

        $idmodule = $request->module_id;
        $idm = Pageleftmodule::where('module_id','=',$idmodule)->first();
        $mid = $idm->module_id;
        $mnam = $idm->module_name;      
        if ($request->hasFile('img')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->img->store('uploads', 'public');
            $file = $request->file('img');
            $contents = $file->openFile()->fread($file->getSize());
               
            $add = new Pageleftmodule_sub([
                "modulsub_name" => $request->get('modulsub_name'),
                "modulsub_detail" => $request->get('modulsub_detail'),
                "module_id" => $mid,
                "module_name" => $mnam
                // "modulsub_img" => $request->img->hashName()                
            ]);
            
            $add->modulsub_img = $contents;
            $add->save(); // Finally, save the record.
        }

        return redirect()->route('obt.pageleft_module_sub',[
                    'idmodule' => $idmodule
                ]);

    }
    public function update(Request $request)
    {
       $id = $request->modulsub_id;

        $update = Pageleftmodule_sub::find($id);

        // $idmodule = $request->module_id;
        // $idm = Pageleftmodule::where('module_id','=',$idmodule)->first();
        // $update->module_id = $idm->module_id;
        // $update->module_name = $idm->module_name;

        $update->modulsub_name = $request->modulsub_name;
        $update->modulsub_detail = $request->summary_ckeditor;

        if ($request->hasFile('upload')) {   
            $file = $request->file('upload');
            $contents = $file->openFile()->fread($file->getSize());             
            $update->modulsub_img = $contents;
        }
        $update->save(); 
        return redirect()->route('obt.pageleft_module_sub',[
            'idmodule' => $idmodule
        ]);
    }
    // function pageleft_module_sub_save(Request $request)
    // {
      

    //     $idmodule = $request->PAGE_LEFT_MODULE_ID;
    //     $add= new Pageleftmodule_sub();
    //     $add->PAGE_LEFT_MODULE_SUB_NAME = $request->PAGE_LEFT_MODULE_SUB_NAME;
    //     $add->PAGE_LEFT_MODULE_SUB_DETAIL = $request->myeditor;

    //     $idm = Pageleftmodule::where('PAGE_LEFT_MODULE_ID','=',$idmodule)->first();
    //     $add->PAGE_LEFT_MODULE_ID = $idm->PAGE_LEFT_MODULE_ID;
    //     $add->PAGE_LEFT_MODULE_NAME = $idm->PAGE_LEFT_MODULE_NAME;

    //     if ($request->hasFile('file')) {

    //         $request->validate([
    //             'img' => 'required|mimes:jpeg,bmp,png,csv,txt,xlx,xls,pdf|max:3060'
    //         ]);

    //         $request->file->store('uploads', 'public');
    //     }
    //     $add->save();
    //     return redirect()->route('obt.pageleft_module_sub',[
    //         'idmodule'=>$idmodule
    //     ]);
    // }

    // $req->validate([
    //     'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
    //     ]);

    //     $fileModel = new File;

    //     if($req->file()) {
    //         $fileName = time().'_'.$req->file->getClientOriginalName();
    //         $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

    //         $fileModel->name = time().'_'.$req->file->getClientOriginalName();
    //         $fileModel->file_path = '/storage/' . $filePath;
    //         $fileModel->save();

    //         return back()
    //         ->with('success','File has been uploaded.')
    //         ->with('file', $fileName);
    //     }

        // $request->upload->move(public_path('storage/uploads'),
        // $request->file('upload')->getClientOriginalName());
        // echo json_encode(array('file_name'=>
        // $request->file('upload')->getClientOriginalName()));      
    // }
    // function upload_ckeditor(Request $request)
    // {  
    //     $request->upload->move(public_path('storage/uploads'),
    //     $request->file('upload')->getClientOriginalName());
    //     echo json_encode(array('file_name'=>
    //     $request->file('upload')->getClientOriginalName()));      
    // }

    function file_browser()
    {      
        $paths = glob(public_path('storage/uploads/*'));
        $fileNames = array();
        foreach($paths as $path){
          array_push($fileNames,basename($path));
        }
        $datas = array(
          'fileNames' => $fileNames
        );        
        return view('module/file_browser')->with($datas);
    }

  //=========================================================// 
  function pageleft_ones(Request $request)
  {
  if (session()->has('LogedUser')) {
      $data = User::where('id','=',session('LogedUser'))->first();
      }
      $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
      ->get();
      $pageModule_count = Pageleftmodule::count();
      $page1 = Pageleft_one::count();
      $page2 = Pageleft_two::count();
      $page3 = Pageleft_tree::count();
      $page4 = Pageleft_four::count();
      $page5 = Pageleft_five::count();
    
      $posit = Position::get();
      $page = Pageleft_one::get();

      return view('back_obt.pageleft_ones',[
          'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,             
          'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
          'page5'=>$page5,'pageModule_count'=>$pageModule_count,
      ]);
  }
  function pageleft_ones_save(Request $request)
    {
        $add= new Pageleft_one();
        $add->PAGE_LEFT_ONE_NAME = $request->PAGE_LEFT_ONE_NAME;
        $add->save();
        return redirect()->route('obt.pageleft_ones');
    }
    function pageleft_ones_update(Request $request)
    {
        $id = $request->PAGE_LEFT_ONE_ID;
        $update = Pageleft_one::find($id);
        $update->PAGE_LEFT_ONE_NAME = $request->PAGE_LEFT_ONE_NAME;
        $update->save();

        return redirect()->route('obt.pageleft_ones');
    }
    function pageleft_ones_delete(Request $request,$id)
    {
      Pageleft_one::destroy($id);
        return redirect()->route('obt.pageleft_ones');
    }

  //=========================================================// 
    function pageleft_twos(Request $request)
    {
    if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
        ->get();
        $pageModule_count = Pageleftmodule::count();
        $page1 = Pageleft_one::count();
        $page2 = Pageleft_two::count();
        $page3 = Pageleft_tree::count();
        $page4 = Pageleft_four::count();
        $page5 = Pageleft_five::count();
      
        $posit = Position::get();
        $page = Pageleft_two::get();

        return view('back_obt.pageleft_twos',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,'pages'=>$page,             
            'page1'=>$page1, 'page2'=>$page2, 'page3'=>$page3, 'page4'=>$page4,
            'page5'=>$page5,'pageModule_count'=>$pageModule_count,
        ]);
    }
    function pageleft_twos_save(Request $request)
    {
        $add= new Pageleft_two();
        $add->PAGE_LEFT_TWO_NAME = $request->PAGE_LEFT_TWO_NAME;
        $add->save();
        return redirect()->route('obt.pageleft_twos');
    }
    function pageleft_twos_update(Request $request)
    {
        $id = $request->PAGE_LEFT_TWO_ID;
        $update = Pageleft_two::find($id);
        $update->PAGE_LEFT_TWO_NAME = $request->PAGE_LEFT_TWO_NAME;
        $update->save();

        return redirect()->route('obt.pageleft_twos');
    }
    function pageleft_twos_delete(Request $request,$id)
    {
      Pageleft_two::destroy($id);
        return redirect()->route('obt.pageleft_twos');
    }


}
