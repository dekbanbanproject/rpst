<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\users_permise;
use Illuminate\Support\Facades\Hash;
use App\Models\Position;
use App\Models\Store_main;
use App\Models\Store_sub;
use App\Models\Units;
use App\Models\Category;
use App\Models\Products;

date_default_timezone_set("Asia/Bangkok");

class ConfigController extends Controller
{
    function profile_edit(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }

        $user = User::where('id','=',$data->id)->get();
        $usercount = User::count();
        $countad = User::where('admin','=','on')->count();
        $countre = User::count('read');
        $countwr = User::count('write');
        $countpr = User::count('print');

        $total = $countad. '+' .$countre. '+' .$countwr.'+' .$countpr;

        return view('profile/profile_edit', [
           'data'=>$data,
            'user'=>$user,
            'usercount'=>$usercount,
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
        return redirect()->route('pro.profile_edit');

    }
    function profile_update(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }
           
            $iduser = $request->id_update;

            $update= User::find($iduser);  
            $update->name = $request->name;
            $update->username = $request->username;
            $update->password = Hash::make($request->password);
           
            if($request->hasFile('img')){
                $file = $request->file('img');
                $contents = $file->openFile()->fread($file->getSize());
                $update->img = $contents;
            }
            $update->save();

        return redirect()->route('pro.profile_edit',[
            'data'=>$data,
            'iduser'=>$iduser,
        ]);

    }
    function changpassword(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }
        $iduser = $request->id_update;
        $pass = User::find($iduser);
        $pass->password = Hash::make($request->password);
        $pass->save();
        return redirect()->route('pro.profile_edit',[
            'data'=>$data,
            'iduser'=>$iduser,
        ]);
    }
    function profile_permiss_update(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }
        $iduser = $request->id_update;

            $update= User::find($iduser);            
            $update->admin = $request->admin;
            $update->read = $request->read;
            $update->write = $request->write;
            $update->print = $request->print;
            $update->save();  
            return redirect()->route('pro.profile_edit',[
                'data'=>$data,
                'iduser'=>$iduser,
            ]);

    }
}
