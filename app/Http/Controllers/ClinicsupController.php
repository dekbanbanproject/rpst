<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Clinic_supplier;
use App\message;
use Image;
use PDF;
use Auth;

class ClinicsupController extends Controller
{

    public function supindex(Request $request,$idstore,$iduser)
    {
        $allData = Clinic_supplier::get();

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $per_sit = DB::table('permiss_list')->count();

        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();


        return view('supplier.supindex',[
            'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'data_hos'=>$data_hos, 'per_sit'=>$per_sit,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,  'order_a'=>$order_a,
           'allDatas'=>$allData
        ]);
    }

    public function create(Request $request,$idstore,$iduser)
    {

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('supplier.create',[
            'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'data_hos'=>$data_hos,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
        ]);
    }


    public function store(Request $request,$idstore,$iduser)
    {
        $add= new Clinic_supplier();
        $add->SUP_NAME = $request->sup_name;
        $add->SUP_TEL = $request->sup_tel;
        $add->SUP_ADDRESS = $request->sup_address;
        $add->save();

        return redirect()->route('sup.supindex',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function edit(Request $request,$idstore,$iduser,$id)
    {
        $data = Clinic_supplier::find($id);

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml = DB::table('users')->where('id','=',$iduser)->first();
        $permiss = DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('supplier.edit',[
            'data_hos'=>$data_hos,  'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'data' => $data
        ]);
    }


    public function update(Request $request,$idstore,$iduser,$id)
    {
        $update= Clinic_supplier::find($id);
        $update->SUP_NAME = $request->sup_name;
        $update->SUP_TEL = $request->sup_tel;
        $update->SUP_ADDRESS = $request->sup_address;
        $update->save();
        return redirect()->route('sup.supindex',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    public function sup_destroy(Request $request,$idstore,$iduser,$id)
    {
        // $id = $request->id;

        Clinic_supplier::destroy($id);

        return redirect()->route('sup.supindex',['idstore'=>$idstore,'iduser'=>$iduser]);
    }

}
