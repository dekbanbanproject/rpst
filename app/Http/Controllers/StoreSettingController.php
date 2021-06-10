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

class StoreSettingController extends Controller
{
    function infoperson(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }
        $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
        ->get();
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

        return view('setting/infoperson', [
           'data'=>$data,
            'user'=>$user,
            'usercount'=>$usercount, 'pocount'=>$pocount, 'stmcount'=>$stmcount, 'stscount'=>$stscount,
            'unitcount'=>$unitcount, 'catcount'=>$catcount, 'prodcount'=>$prodcount,
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
    function profile_save(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }
            $iduser = $request->id_update;
            $add= new User(); 
            $add->cid = $request->cid; 
            $add->name = $request->name;
            $add->lname = $request->lname;
            $add->username = $request->username;
            $add->password = $request->password;
            $add->linetoken = $request->linetoken;
            $add->position = $request->position;
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
            return redirect()->route('per.infoperson',[
                'data'=>$data,
                'iduser'=>$iduser,
            ]);

    }
    function profile_update(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }
           
            $iduser = $request->id_update;

            $update= User::find($iduser);
            $update->cid = $request->cid;  
            $update->name = $request->name;
            $update->lname = $request->lname;
            $update->username = $request->username;
            $update->password = Hash::make($request->password);
            $update->linetoken = $request->linetoken;
            $update->position = $request->position;
           
            if($request->hasFile('img')){
                $file = $request->file('img');
                $contents = $file->openFile()->fread($file->getSize());
                $update->img = $contents;
            }
            $update->save();

            return redirect()->route('per.infoperson',[
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
        return redirect()->route('per.infoperson',[
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
            return redirect()->route('per.infoperson',[
                'data'=>$data,
                'iduser'=>$iduser,
            ]);
    }
    function position_save(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
            }
            $iduser = $request->id_update;
            $add= new Position();  
            $add->POSIT_NAME = $request->POSIT_NAME;           
            $add->save();  
            return redirect()->route('per.infoperson',[
                'data'=>$data,
                'iduser'=>$iduser,
            ]);

    }

//=========================================================// 
    function infoposition(Request $request)
    {
    if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')
        ->get();
        $usercount = User::count();
        $pocount = Position::count();
        $stmcount = Store_main::count();
        $stscount = Store_sub::count();
        $unitcount = Units::count();
        $catcount = Category::count();
        $prodcount = Products::count();

        $posit = Position::get();

        return view('setting/infoposition',[
            'data'=>$data,'user'=>$user,'posits'=>$posit,               
            'usercount'=>$usercount, 'pocount'=>$pocount, 'stmcount'=>$stmcount, 'stscount'=>$stscount,
            'unitcount'=>$unitcount, 'catcount'=>$catcount, 'prodcount'=>$prodcount,
        ]);
    }
    function positionsave(Request $request)
    {
        $add= new Position();
        $add->POSIT_NAME = $request->POSIT_NAME;
        $add->save();
        return redirect()->route('per.infoposition');
    }
    function position_update(Request $request)
    {
        $id = $request->POSIT_ID;
        $update = Position::find($id);
        $update->POSIT_NAME = $request->POSIT_NAME;
        $update->save();

        return redirect()->route('per.infoposition');
    }
    function position_delete(Request $request,$id)
    {
        Position::destroy($id);
        return redirect()->route('per.infoposition');
    }
//=========================================================//
    function storemains(Request $request)
    {
    if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $sto = Store_main::leftJoin('users','users.id','=','store_mains.PER_ID')->get();
        $user = User::leftJoin('positions','users.position','=','positions.POSIT_ID')->get();
        $usercount = User::count();
        $pocount = Position::count();
        $stmcount = Store_main::count();
        $stscount = Store_sub::count();
        $unitcount = Units::count();
        $catcount = Category::count();
        $prodcount = Products::count();

        $posit = Position::get();

        return view('setting/storemains',[
            'data'=>$data,'stos'=>$sto,'posits'=>$posit,'user'=>$user,             
            'usercount'=>$usercount, 'pocount'=>$pocount, 'stmcount'=>$stmcount, 'stscount'=>$stscount,
            'unitcount'=>$unitcount, 'catcount'=>$catcount, 'prodcount'=>$prodcount,
        ]);
    }
    function storemains_save(Request $request)
    {
        $add= new Store_main();
        $add->STORE_NAME = $request->STORE_NAME;
        $add->STORE_LINETOKEN = $request->STORE_LINETOKEN;

        $userid = $request->PER_ID;
        $iduser = User::where('id','=',$userid)->first();

        $add->PER_ID = $iduser->id;
        $add->PER_NAME =  $iduser->name. ' ' .$iduser->lname;
        $add->save();
        return redirect()->route('per.storemains');
    }
    function storemains_update(Request $request)
    {
        $id = $request->STORE_ID;
        $update = Store_main::find($id);
        $update->STORE_NAME = $request->STORE_NAME;
        $update->STORE_LINETOKEN = $request->STORE_LINETOKEN;

        $userid = $request->PER_ID;
        $iduser = User::where('id','=',$userid)->first();

        $update->PER_ID = $iduser->id;
        $update->PER_NAME = $iduser->name. ' ' .$iduser->lname;
        $update->save();

        return redirect()->route('per.storemains');
    }
    function storemains_delete(Request $request,$id)
    {
        Store_main::destroy($id);
        return redirect()->route('per.storemains');
    }
//=========================================================//
function storesub(Request $request)
    {
    if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $stosub = Store_sub::leftJoin('users','users.id','=','store_subs.PER_ID')->get();

        $user = User::get();
        $usercount = User::count();
        $pocount = Position::count();
        $stmcount = Store_main::count();
        $stscount = Store_sub::count();
        $unitcount = Units::count();
        $catcount = Category::count();
        $prodcount = Products::count();

        $posit = Position::get();

        return view('setting/storesub',[
            'data'=>$data,'stosubs'=>$stosub,'posits'=>$posit,'user'=>$user,             
            'usercount'=>$usercount, 'pocount'=>$pocount, 'stmcount'=>$stmcount, 'stscount'=>$stscount,
            'unitcount'=>$unitcount, 'catcount'=>$catcount, 'prodcount'=>$prodcount,
        ]);
    }
    function storesub_save(Request $request)
    {
        $add= new Store_sub();
        $add->STORE_SUB_NAME = $request->STORE_SUB_NAME;
        $add->STORE_SUB_LINETOKEN = $request->STORE_SUB_LINETOKEN;

        $userid = $request->PER_ID;
        $iduser = User::where('id','=',$userid)->first();

        $add->PER_ID = $iduser->id;
        $add->PER_NAME =  $iduser->name. ' ' .$iduser->lname;
        $add->save();
        return redirect()->route('per.storesub');
    }
    function storesub_update(Request $request)
    {
        $id = $request->STORE_SUB_ID;
        $update = Store_sub::find($id);
        $update->STORE_SUB_NAME = $request->STORE_SUB_NAME;
        $update->STORE_SUB_LINETOKEN = $request->STORE_SUB_LINETOKEN;

        $userid = $request->PER_ID;
        $iduser = User::where('id','=',$userid)->first();

        $update->PER_ID = $iduser->id;
        $update->PER_NAME = $iduser->name. ' ' .$iduser->lname;
        $update->save();

        return redirect()->route('per.storesub');
    }
    function storesub_delete(Request $request,$id)
    {
        Store_sub::destroy($id);
        return redirect()->route('per.storesub');
    }
//=========================================================//
   
function unit(Request $request)
    {
    if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $unit = Units::get();

        $usercount = User::count();
        $pocount = Position::count();
        $stmcount = Store_main::count();
        $stscount = Store_sub::count();
        $unitcount = Units::count();
        $catcount = Category::count();
        $prodcount = Products::count();

        $posit = Position::get();

        return view('setting/units',[
            'data'=>$data,'units'=>$unit,'posits'=>$posit,               
            'usercount'=>$usercount, 'pocount'=>$pocount, 'stmcount'=>$stmcount, 'stscount'=>$stscount,
            'unitcount'=>$unitcount, 'catcount'=>$catcount, 'prodcount'=>$prodcount,
        ]);
    }
    function unit_save(Request $request)
    {
        $add= new Units();
        $add->UNITS_NAME = $request->UNITS_NAME;
        $add->save();
        return redirect()->route('per.unit');
    }
    function unit_update(Request $request)
    {
        $id = $request->UNITS_ID;
        $update = Units::find($id);
        $update->UNITS_NAME = $request->UNITS_NAME;
        $update->save();

        return redirect()->route('per.unit');
    }
    function unit_delete(Request $request,$id)
    {
        Units::destroy($id);
        return redirect()->route('per.unit');
    }
    //=========================================================//
   
function category(Request $request)
{
if (session()->has('LogedUser')) {
    $data = User::where('id','=',session('LogedUser'))->first();
    }
    $cat = Category::get();

    $usercount = User::count();
    $pocount = Position::count();
    $stmcount = Store_main::count();
    $stscount = Store_sub::count();
    $unitcount = Units::count();
    $catcount = Category::count();
    $prodcount = Products::count();

    $posit = Position::get();
   
    return view('setting/categorys',[
        'data'=>$data,'cats'=>$cat,'posits'=>$posit,           
        'usercount'=>$usercount, 'pocount'=>$pocount, 'stmcount'=>$stmcount, 'stscount'=>$stscount,
        'unitcount'=>$unitcount, 'catcount'=>$catcount, 'prodcount'=>$prodcount,
    ]);
}
function category_save(Request $request)
{
    $add= new Category();
    $add->CAT_NAME = $request->CAT_NAME;
    $add->save();
    return redirect()->route('per.category');
}
function category_update(Request $request)
{
    $id = $request->CAT_ID;
    $update = Category::find($id);
    $update->CAT_NAME = $request->CAT_NAME;
    $update->save();

    return redirect()->route('per.category');
}
function category_delete(Request $request,$id)
{
    Category::destroy($id);
    return redirect()->route('per.category');
}
//=========================================================//
  
    function products(Request $request)
    {
    if (session()->has('LogedUser')) {
        $data = User::where('id','=',session('LogedUser'))->first();
        }
        $pro = Products::get();

        $usercount = User::count();
        $pocount = Position::count();
        $stmcount = Store_main::count();
        $stscount = Store_sub::count();
        $unitcount = Units::count();
        $catcount = Category::count();
        $prodcount = Products::count();

        $posit = Position::get();
        $unit = Units::get();
        $cat = Category::get();
        return view('setting/products',[
            'data'=>$data,'pros'=>$pro,'posits'=>$posit,'units'=>$unit, 'cats'=>$cat,                
            'usercount'=>$usercount, 'pocount'=>$pocount, 'stmcount'=>$stmcount, 'stscount'=>$stscount,
            'unitcount'=>$unitcount, 'catcount'=>$catcount, 'prodcount'=>$prodcount,
        ]);
    }
    function products_save(Request $request)
    {
        $add= new Products();
        $add->PRO_CODE = $request->PRO_CODE;
        $add->PRO_NAME = $request->PRO_NAME;
        $add->PRO_QTY = $request->PRO_QTY;
        $add->PRO_UNIT = $request->PRO_UNIT;
        $add->PRO_CAT = $request->PRO_CAT;
        $add->PRO_PRICE = $request->PRO_PRICE;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $contents = $file->openFile()->fread($file->getSize());
            $add->PRO_PIC = $contents;
        }
        $add->save();
        return redirect()->route('per.products');
    }
    function products_update(Request $request)
    {
        $id = $request->PRO_ID;
        $update = Products::find($id);
        $update->PRO_CODE = $request->PRO_CODE;
        $update->PRO_NAME = $request->PRO_NAME;
        $update->PRO_QTY = $request->PRO_QTY;
        $update->PRO_UNIT = $request->PRO_UNIT;
        $update->PRO_CAT = $request->PRO_CAT;
        $update->PRO_PRICE = $request->PRO_PRICE;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $contents = $file->openFile()->fread($file->getSize());
            $update->PRO_PIC = $contents;
        }
        $update->save();

        return redirect()->route('per.products');
    }
    function products_delete(Request $request,$id)
    {
        Products::destroy($id);
        return redirect()->route('per.products');
    }
//=========================================================//

}
