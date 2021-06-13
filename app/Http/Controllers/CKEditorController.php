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

class CKEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('back_obt/editor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new Pageleftmodule_sub();
        $idmodule = $request->module_id;
        $idm = Pageleftmodule::where('module_id','=',$idmodule)->first();
        $add->module_id = $idm->module_id;
        $add->module_name = $idm->module_name;

        $add->modulsub_name = $request->modulsub_name;
        $add->modulsub_detail = $request->summary_ckeditor;

        if ($request->hasFile('upload')) {   
            $file = $request->file('upload');
            $contents = $file->openFile()->fread($file->getSize());             
            $add->modulsub_img = $contents;
            // Finally, save the record.
        }
        $add->save(); 
        return redirect()->route('obt.pageleft_module_sub',[
            'idmodule' => $idmodule
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $idsub = $request->modulsub_id;

        $update = Pageleftmodule_sub::find($idsub);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function upload(Request $request)
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
}
