<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use App\Permiss;
use App\Permisslist;
use Image;
use PDF;
use Auth;
class StaffController extends Controller
{

    public function settingdashboard(Request $request)
    {
        $allData = User::get();
        $idstore =  Auth::user()->store_id;
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

        return view('settingdashboard',compact('allData'));
    }
    public function index(Request $request)
    {
        $idstore =  Auth::user()->store_id;
        $iduser =  Auth::user()->id;

        $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')
        ->where('users.store_id','=',$idstore)->get();

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

        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pm =  DB::table('permiss')->get();
        $permiss_list =  DB::table('permiss_list')->get();


        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('staff.index',[
            'data_hos'=>$data_hos,'pms'=>$pm,'permiss_list'=>$permiss_list,   'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'allData' => $allData,

        ]);
    }
    public function create(Request $request)
    {
        $idstore =  Auth::user()->store_id;
        $iduser =  Auth::user()->id;

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
        $store = DB::table('clinic_locate')->get();
        $position = DB::table('clinic_position')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('staff.create',[
            'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'stores' => $store,'positions' => $position
        ]);
    }

    public function store(Request $request)
    {


        $add= new User();
        $add->name = $request->name;
        $add->lname = $request->lname;
        $add->email = $request->email;
        $add->facebook = $request->facebook;
        $add->linetoken = $request->linetoken;
        $add->cid = $request->cid;
        $add->store_id = $request->STORE;
        $add->position = $request->position;
        $add->password = bcrypt($request->password);
        $add->status = $request->status;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $contents = $file->openFile()->fread($file->getSize());
            $add->img = $contents;
        }
        $add->save();

        return redirect()->route('staff.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request,$id)
    {
        $data = User::find($id);
        $idstore =  Auth::user()->store_id;
        $iduser =  Auth::user()->id;

        // $pml =  DB::table('users')->where('id','=',$iduser)->first();
        // $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();

        $store = DB::table('clinic_locate')->get();
        $position = DB::table('clinic_position')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('staff.edit',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'data' => $data,'stores' => $store,'positions' => $position
        ]);
    }
    function switchactivepermiss(Request $request)
    {
        $id = $request->permiss;
        $activePRO = Permiss::find($id);
        $activePRO->PERMISS_STATUS = $request->onoff;
        $activePRO->save();
    }

    public function update(Request $request, $id)
    {
        $update= User::find($id);
        $update->name = $request->name;
        $update->lname = $request->lname;
        $update->position = $request->position;
        $update->email = $request->email;
        $update->facebook = $request->facebook;
        $update->linetoken = $request->linetoken;
        $update->store_id = $request->STORE;
        $update->password = bcrypt($request->password);
        $update->status = $request->status;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $contents = $file->openFile()->fread($file->getSize());
            $update->img = $contents;
        }
        $update->save();
        return redirect()->route('staff.index')->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    public function destroy(Request $request,$id)
    {
        $id = $request->id;
        User::destroy($id);

        return redirect()->route('staff.index');
    }
    public function permiss(Request $request)
    {
        $idstore =  Auth::user()->store_id;

        $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')
        ->where('users.store_id','=',$idstore)->get();

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
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $permiss =  DB::table('permiss')->get();
        return view('staff.permiss',[
            'data_hos'=>$data_hos,  'permiss'=>$permiss,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'allData' => $allData,
        ]);
    }

    public function permisslist(Request $request,$id)
    {
        $idstore =  Auth::user()->store_id;

        $pml =  DB::table('users')->where('id','=',$id)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$id)->get();
        $permiss_u =  DB::table('users')->where('id','=',$id)->get();

        $allData = User::leftjoin('clinic_locate','users.store_id','=','clinic_locate.LOCATE_ID')->where('users.store_id','=',$idstore)->get();

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
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        return view('staff.permisslist',[
            'data_hos'=>$data_hos,
            'permiss'=>$permiss, 'permiss_u'=>$permiss_u,
            'pmls'=>$pml,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'allData' => $allData,
        ]);
    }
    public function permisslist_save(Request $request)
    {
        $iduser = $request->PERMISS_LIST_USER;

        // Permisslist::where('PERMISS_LIST_USER','=',$iduser)->delete();

        // $add = new Permisslist;
        // $add->PERMISS_LIST_USER = $iduser;
        // $add->PERMISS_LIST_HO =  $request->HOS_MISS;
        // $add->PERMISS_LIST_ME = $request->MEDICAL_MISS;
        // $add->PERMISS_LIST_DELETE = $request->DELETE_MISS;
        // $add->PERMISS_LIST_EDIT = $request->EDIT_MISS;
        // $add->PERMISS_LIST_ADD = $request->ADD_MISS;
        // $add->PERMISS_LIST_CLAIM = $request->CLAIM_MISS;
        // $add->PERMISS_LIST_REPORT = $request->REPORT_MISS;
        // $add->save();

        $update = User::find($iduser);
        $update->user_add = $request->ADD_MISS;
        $update->user_edit = $request->EDIT_MISS;
        $update->user_delete = $request->DELETE_MISS;
        $update->user_medic = $request->MEDICAL_MISS;
        $update->user_rep = $request->REPORT_MISS;
        $update->user_claim = $request->CLAIM_MISS;
        $update->user_hos =  $request->HOS_MISS;
        $update->save();



        $id =  Auth::user()->id;

        return redirect()->route('staff.permisslist',[
            'id' => $id
        ]);
    }

    public function permiss_save(Request $request)
    {
        $iduser = $request->PERMISS_LIST_USER;
        $code = $request->PERMISS_CODE;

        $add = new Permisslist;
        $add->PERMISS_LIST_CODE = $code;
        $add->PERMISS_LIST_USER = $iduser;
        $add->PERMISS_LIST_STATUS = 'True';
        $add->save();

        return redirect()->route('staff.index');
    }
}
