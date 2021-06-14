<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pageleft_one;
use App\Models\Pageleft_two;
use App\Models\Pageleft_tree;
use App\Models\Pageleft_four;
use App\Models\Pageleft_five;
use App\Models\Pageleftmodule;
use App\Models\Pageleftmodule_sub;
use App\Models\Page_group;
use App\Models\Page_picture;
use App\Models\Page_slidepicture;


class PictureController extends Controller
{
    public function index()
    {
        return view('image_upload');
    }

     function store(Request $request)
    {

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $imagename = $file->getClientOriginalName();
            $contents = $file->openFile()->fread($file->getSize());

            $file->move(public_path('images'), $imagename);
           
            //Upload File
            // $image->storeAs('/uploads', $imagename);

            $add = new Page_slidepicture();
            $add->img = $contents;
            $add->filename = $imagename;
            $add->save(); 

            // if($request->hasFile('DRUG_IMG')){
            //     $file = $request->file('DRUG_IMG');
            //     $contents = $file->openFile()->fread($file->getSize());
            //     $add->DRUG_IMG = $contents;
        }

        return redirect()->route('obt.pagepicture_slide');
        // return response()->json(['success' =>$imagename]);
    }

    public function uploadpic_delete(Request $request)
    {
        $imagename = $request->get('filename');
        Page_slidepicture::where('filename', $imagename)->delete();
        $path = public_path().'/images/'.$imagename;

        // Page_slidepicture::destroy($filename);

        if (file_exists($path)){
            unlink($path);
        }
        return $filename;
    }
 function upload_pic_delete(Request $request,$id)
    {
        Page_slidepicture::destroy($id);
      return redirect()->route('obt.pagepicture_slide');
    }
}
