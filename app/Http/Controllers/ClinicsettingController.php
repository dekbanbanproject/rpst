<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Clinic_per;
use App\Clinic_drug;
use App\Clinic_locate;
use App\Clinic_recieve;
use App\Clinic_recieve_detail;
use App\Clinic_recieve_store;
use App\Clinic_stock;
use App\Clinic_category;
use App\Clinic_unit;
use App\Clinic_pay;
use App\Clinic_pay_store;
use App\Clinic_sym_detail;
use App\Clinic_orders;
use App\Clinic_orders_detail;
use App\Drugitems;
use App\Opitemrece;
use App\User;
use App\Imports\Drugimport;
use Maatwebsite\Excel\Facades\Excel;
use Image;
use PDF;
use Auth;

class ClinicsettingController extends Controller
{
    public function sticker(Request $request,$idstore,$iduser)
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

        $datebigin = $request->DATE_BIGIN;
        $dateend = $request->DATE_END;


        $drug = DB::table('clinic_drug')
        ->where('DRUG_STORE','=',$idstore)
        ->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('setting.sticker',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'drugs' =>$drug, 'order_a' =>$order_a,
        ]);
    }
    public function stickerbarcodeprint(Request $request,$idstore,$iduser,$id)
    {
      
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();

        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

        $datebigin = $request->DATE_BIGIN;
        $dateend = $request->DATE_END;

        $drug = Clinic_drug::where('DRUG_ID','=',$id)->first();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('setting.stickerbarcodeprint',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,  'order_a'=>$order_a,
            'drugs' =>$drug,
        ]);
    }
    public function stickerqrcodeprint(Request $request,$idstore,$iduser,$id)
    {
       

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();

        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

        $datebigin = $request->DATE_BIGIN;
        $dateend = $request->DATE_END;

        $drug = Clinic_drug::where('DRUG_ID','=',$id)->first();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('setting.stickerqrcodeprint',[
         'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'drugs' =>$drug,
        ]);
    }
    public function unit(Request $request,$idstore,$iduser)
    {
        $unit = DB::table('clinic_unit')->get();
        // $idstore =  Auth::user()->store_id;
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();

        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
        return view('setting.unit',[
            'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'data_hos'=>$data_hos,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'units'=>$unit
        ]);
    }
    public function unit_save(Request $request)
    {
        $idstore = $request->idstore;
        $iduser = $request->iduser;
        $add= new Clinic_unit();
        $add->UNIT_NAME = $request->UNIT_NAME;
        $add->save();
        return redirect()->route('setting.unit',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function unit_update(Request $request)
    {
        $idstore = $request->idstore;
        $iduser = $request->iduser;
        $id = $request->UNIT_ID;
        $update = Clinic_unit::find($id);
        $update->UNIT_NAME = $request->UNIT_NAME;
        $update->save();

        return redirect()->route('setting.unit',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }
    public function unitdestroy(Request $request,$idstore,$iduser,$id)
    {
        Clinic_unit::destroy($id);
        return redirect()->route('setting.unit',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','ลบข้อมูลเรียบร้อยแล้ว');
    }

    public function category(Request $request,$idstore,$iduser)
    {
        $cat = DB::table('clinic_category')->get();
        // $idstore =  Auth::user()->store_id;
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();

        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
        return view('setting.category',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'cats'=>$cat
        ]);
    }
    public function category_save(Request $request)
    {
        $idstore = $request->idstore;
        $iduser = $request->iduser;
        $add= new Clinic_category();
        $add->CAT_NAME = $request->CAT_NAME;
        $add->save();
        return redirect()->route('setting.category',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function category_update(Request $request)
    {
        $idstore = $request->idstore;
        $iduser = $request->iduser;
        $id = $request->CAT_ID;
        $update = Clinic_category::find($id);
        $update->CAT_NAME = $request->CAT_NAME;
        $update->save();

        return redirect()->route('setting.category',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }
    public function categorydestroy(Request $request,$idstore,$iduser,$id)
    {
        Clinic_category::destroy($id);
        return redirect()->route('setting.category',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','ลบข้อมูลเรียบร้อยแล้ว');
    }
    public function locate(Request $request,$idstore,$iduser)
    {
        $locate = DB::table('clinic_locate')->get();


        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();

        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
        return view('setting.locate',[
            'data_hos'=>$data_hos,'idstore'=>$idstore,'iduser'=>$iduser, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'locates'=>$locate
        ]);
    }
    public function locate_save(Request $request)
    {
        $idstore = $request->idstore;
        $iduser = $request->iduser;

        $add= new Clinic_locate();
        $add->LOCATE_CODE = $request->LOCATE_CODE;
        $add->LOCATE_NAME = $request->LOCATE_NAME;
        $add->save();
        return redirect()->route('setting.locate',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function locate_update(Request $request)
    {
        $idstore = $request->idstore;
        $iduser = $request->iduser;

        $id = $request->LOCATE_ID;
        $update = Clinic_locate::find($id);
        $update->LOCATE_CODE = $request->LOCATE_CODE;
        $update->LOCATE_NAME = $request->LOCATE_NAME;
        $update->save();

        return redirect()->route('setting.locate',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }
    public function locatedestroy(Request $request,$idstore,$iduser,$id)
    {
        Clinic_locate::destroy($id);
        return redirect()->route('setting.locate',['idstore'=>$idstore,'iduser'=>$iduser]);
    }
    //============================================= Drug  =======================================================//

    function drug_excel(Request $request)
    {
        $idstore =  $request->store_id;
        $iduser =  $request->user_id;

        $file = $request->DRUG_EXCEL;
        Excel::import(new Drugimport,$file);
       return redirect()->route('setting.drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','นำเข้าข้อมูลเรียบร้อยแล้ว');
    }
   
    public function drug(Request $request,$idstore,$iduser)
    {
        $drug = DB::table('clinic_drug')
        ->leftjoin('clinic_unit','clinic_drug.DRUG_UNIT','=','clinic_unit.UNIT_ID')
        ->leftjoin('clinic_category','clinic_drug.CAT_ID','=','clinic_category.CAT_ID')
        // ->leftjoin('users','clinic_drug.DRUG_STORE','=','users.store_id')
        ->where('DRUG_STORE','=',$idstore)
        ->get();

        $cat = DB::table('clinic_category')->get();
        $unit = DB::table('clinic_unit')->get();

        // $drug = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->get();

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
        return view('setting.drug',[
            'data_hos'=>$data_hos,'idstore'=>$idstore,'iduser'=>$iduser, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'drugs'=>$drug,
            'units'=>$unit,
            'cats'=>$cat
        ]);
    }
    public function drug_create(Request $request,$idstore,$iduser)
    {
        $drug = DB::table('clinic_drug')
        ->leftjoin('clinic_unit','clinic_drug.DRUG_UNIT','=','clinic_unit.UNIT_ID')
        ->leftjoin('clinic_category','clinic_drug.CAT_ID','=','clinic_category.CAT_ID')
        // ->leftjoin('users','clinic_drug.DRUG_STORE','=','users.store_id')
        ->where('DRUG_STORE','=',$idstore)
        ->get();

        $cat = DB::table('clinic_category')->get();
        $unit = DB::table('clinic_unit')->get();

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();

        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
        return view('setting.drug_create',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'drugs'=>$drug,
            'units'=>$unit,
            'cats'=>$cat
        ]);
    }
    public function drug_save(Request $request)
    {
       $idstore = $request->idstore;
       $iduser = $request->iduser;
        $add= new Clinic_drug();
        $add->DRUG_CODE = $request->DRUG_CODE;
        $add->DRUG_NAME = $request->DRUG_NAME;
        $add->DRUG_UNIT = $request->DRUG_UNIT;
        $add->CAT_ID = $request->DRUG_CAT;
        $add->DRUG_STORE = $idstore;
        if($request->hasFile('DRUG_IMG')){
            $file = $request->file('DRUG_IMG');
            $contents = $file->openFile()->fread($file->getSize());
            $add->DRUG_IMG = $contents;
        }
        $add->save();
        return redirect()->route('setting.drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }
    public function drug_edit(Request $request,$idstore,$iduser,$id)
    {
        $drug = Clinic_drug::where('DRUG_ID','=',$id)->first();

        $cat = DB::table('clinic_category')->get();
        $unit = DB::table('clinic_unit')->get();

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
        return view('setting.drug_edit',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'drugs'=>$drug,
            'units'=>$unit,
            'cats'=>$cat
        ]);
    }
    public function drug_update(Request $request)
    {

        $idstore = $request->idstore;
        $iduser = $request->iduser;
        $id = $request->DRUG_ID;
        $update = Clinic_drug::find($id);
        $update->DRUG_NAME = $request->DRUG_NAME;
        $update->DRUG_CODE = $request->DRUG_CODE;
        $update->DRUG_UNIT = $request->DRUG_UNIT;
        $update->CAT_ID = $request->DRUG_CAT;

        $update->DRUG_STORE = $idstore;
        if($request->hasFile('DRUG_IMG')){
            $file = $request->file('DRUG_IMG');
            $contents = $file->openFile()->fread($file->getSize());
            $update->DRUG_IMG = $contents;
        }
        $update->save();

        return redirect()->route('setting.drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }
    public function drugdestroy(Request $request,$idstore,$iduser,$id)
    {

        Clinic_drug::destroy($id);
        return redirect()->route('setting.drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','ลบข้อมูลเรียบร้อยแล้ว');
    }


    //-----------------------Order---Drug------------------------------------------------------//
    public function order(Request $request,$idstore,$iduser)
    {
        $drug = DB::table('clinic_drug')->get();
        $unit = DB::table('clinic_unit')->get();
        $order = DB::table('clinic_orders')->leftjoin('clinic_supplier','clinic_orders.ORDER_SUP','clinic_supplier.SUP_ID')
        ->leftjoin('users','clinic_orders.ORDER_STAFF','users.id')
        ->where('ORDER_STORE','=',$idstore)
        ->get();

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('setting.order',[
            'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'drugs'=>$drug,
            'units'=>$unit,
            'orders'=>$order,
        ]);
    }
    public function order_add(Request $request,$idstore,$iduser)
    {
        $drug = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->get();
        $unit = DB::table('clinic_unit')->get();
        $sup = DB::table('clinic_supplier')->get();
        $locate = DB::table('clinic_locate')->get();
        $year = DB::table('clinic_year')->get();
        $userA = DB::table('users')->leftjoin('clinic_position','users.position','=','clinic_position.POSITION_ID')->where('store_id','=',$idstore)->get();

        $maxnumber = Clinic_orders::max('ORDER_BILLNO');
        if($maxnumber != '' ||  $maxnumber != null){
         $refmax = Clinic_orders::where('ORDER_BILLNO','=',$maxnumber)->first();

         if($refmax->ORDER_BILLNO != '' ||  $refmax->ORDER_BILLNO != null){
         $maxref = substr($refmax->ORDER_BILLNO, -4)+1;
         }else{
         $maxref = 1;
         }
         $ref = str_pad($maxref, 5, "0", STR_PAD_LEFT);
         }else{
        $ref = '00001';
         }
         $store_no = DB::table('clinic_locate')->leftjoin('users','clinic_locate.LOCATE_ID','=','users.store_id')->where('clinic_locate.LOCATE_ID','=',$idstore)->first();
         $refnumber ='OR-NO'.'/'.$store_no->LOCATE_CODE.'/'. $ref;

        //=======No Po ===============//

         $maxnum = Clinic_orders::max('ORDER_BILLPO');
        if($maxnum != '' ||  $maxnum != null){
         $refmax = Clinic_orders::where('ORDER_BILLPO','=',$maxnum)->first();

         if($refmax->ORDER_BILLPO != '' ||  $refmax->ORDER_BILLPO != null){
         $maxpo = substr($refmax->ORDER_BILLPO, -4)+1;
         }else{
         $maxref = 1;
         }
         $refe = str_pad($maxpo, 5, "0", STR_PAD_LEFT);
         }else{
        $refe = '00001';
         }
        //  $billPO = 'BillPo'.'-'.$refe;
        $store_no2 = DB::table('clinic_locate')->leftjoin('users','clinic_locate.LOCATE_ID','=','users.store_id')->where('clinic_locate.LOCATE_ID','=',$idstore)->first();
        $billPO ='OR-PO'.'/'. $store_no2->LOCATE_CODE.'/'. $ref;

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
         $pml =  DB::table('users')->where('id','=',$iduser)->first();
         $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
         $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('setting.order_add',[
             'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'drugs'=>$drug,
            'units'=>$unit,
            'sups'=>$sup,
            'refnumbers' => $refnumber,'billPOs'=>$billPO,
            'locates'=>$locate,
            'years'=>$year, 'userAs'=>$userA,
        ]);
    }
    public function order_save(Request $request)
    {
        $idstore = $request->idstore;
        $iduser = $request->iduser;
        $add= new Clinic_orders();
        $add->ORDER_DATE = $request->ORDER_DATE;
        $add->ORDER_BILLNO = $request->ORDER_BILLNO;
        $add->ORDER_YEAR = $request->ORDER_YEAR;
        $add->ORDER_BILLPO = $request->ORDER_BILLPO;
        $add->ORDER_STAFF = $request->ORDER_STAFF;
        $add->ORDER_APPROVER = $request->ORDER_APPROVER;
        $add->ORDER_SUP = $request->ORDER_SUP;
        $add->ORDER_STORE = $idstore;
        $add->ORDER_TOTAL = $request->ORDER_TOTAL;
        $add->save();

        $id_or =  Clinic_orders::max('ORDER_ID');

            if($request->ORDER_DETAIL_DRUG_ID != '' || $request->ORDER_DETAIL_DRUG_ID != null){

                $ORDER_DETAIL_DRUG_ID = $request->ORDER_DETAIL_DRUG_ID;
                $ORDER_DETAIL_DRUG_QTY = $request->ORDER_DETAIL_DRUG_QTY;
                $ORDER_DETAIL_DRUG_UNIT = $request->ORDER_DETAIL_DRUG_UNIT;
                $ORDER_DETAIL_DRUG_PRICE = $request->ORDER_DETAIL_DRUG_PRICE;


            $number =count($ORDER_DETAIL_DRUG_ID);
            $count = 0;
            for($count = 0; $count< $number; $count++)
            {

            $drugname = Clinic_drug::where('DRUG_ID','=',$ORDER_DETAIL_DRUG_ID[$count])->first();

            // ******* รับเข้า clinic_recieve_store *********//
            $add_store = new Clinic_orders_detail();
            $add_store->ORDER_ID = $id_or;
            $add_store->ORDER_DETAIL_DRUG_ID = $drugname->DRUG_ID;
            $add_store->ORDER_DETAIL_DRUG_CODE = $drugname->DRUG_CODE;
            $add_store->ORDER_DETAIL_DRUG_NAME = $drugname->DRUG_NAME;
            $add_store->ORDER_DETAIL_DRUG_UNIT = $ORDER_DETAIL_DRUG_UNIT[$count];
            $add_store->ORDER_DETAIL_DRUG_QTY = $ORDER_DETAIL_DRUG_QTY[$count];
            $add_store->ORDER_DETAIL_DRUG_PRICE = $ORDER_DETAIL_DRUG_PRICE[$count];
            $add_store->ORDER_DETAIL_DRUG_TOTAL = $ORDER_DETAIL_DRUG_QTY[$count] * $ORDER_DETAIL_DRUG_PRICE[$count];
            $add_store->ORDER_DETAIL_STORE = $idstore;
            $add_store->save();

            }
        }
        // ******* อัพเดท Total recieve *********//
        $SUMTOTALPRICE = Clinic_orders_detail::where('ORDER_ID','=',$id_or)->sum('ORDER_DETAIL_DRUG_TOTAL');
        $updatesum = Clinic_orders::find($id_or );
        $updatesum->ORDER_TOTAL = $SUMTOTALPRICE;
        $updatesum->save();
        return redirect()->route('setting.order',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function order_edit(Request $request,$idstore,$iduser,$id)
    {

        $order = DB::table('clinic_orders')->where('ORDER_ID','=',$id)->first();
        $order_detail = Clinic_orders_detail::where('ORDER_ID','=',$id)->get();

        $drug = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->get();
        $unit = DB::table('clinic_unit')->get();
        $sup = DB::table('clinic_supplier')->get();
        $locate = DB::table('clinic_locate')->get();
        $year = DB::table('clinic_year')->get();
        $userA = DB::table('users')->leftjoin('clinic_position','users.position','=','clinic_position.POSITION_ID')->where('store_id','=',$idstore)->get();

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
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();


        return view('setting.order_edit',[
            'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'drugs'=>$drug,
            'units'=>$unit,
            'sups'=>$sup,
            'orders'=>$order,  'order_details'=>$order_detail,
            'locates'=>$locate,
            'years'=>$year,'userAs'=>$userA,
        ]);
    }
    public function order_update(Request $request)
    {
            $id_per = $request->ORDER_STAFF;
            $id = $request->ORDER_ID;
            $idstore = $request->idstore;
            $iduser = $request->iduser;

            $update = Clinic_orders::find($id);
            $update->ORDER_DATE = $request->ORDER_DATE;
            $update->ORDER_BILLNO = $request->ORDER_BILLNO;
            $update->ORDER_YEAR = $request->ORDER_YEAR;
            $update->ORDER_BILLPO = $request->ORDER_BILLPO;
            $update->ORDER_STAFF = $id_per;
            $update->ORDER_APPROVER = $request->ORDER_APPROVER;
            $update->ORDER_SUP = $request->ORDER_SUP;
            $update->ORDER_STORE = $idstore;
            $update->save();

            Clinic_orders_detail::where('ORDER_ID','=',$id)->delete();

        if($request->ORDER_DETAIL_DRUG_ID != '' || $request->ORDER_DETAIL_DRUG_ID != null){

            $ORDER_DETAIL_DRUG_ID = $request->ORDER_DETAIL_DRUG_ID;
            $ORDER_DETAIL_DRUG_QTY = $request->ORDER_DETAIL_DRUG_QTY;
            $ORDER_DETAIL_DRUG_UNIT = $request->ORDER_DETAIL_DRUG_UNIT;
            $ORDER_DETAIL_DRUG_PRICE = $request->ORDER_DETAIL_DRUG_PRICE;

        $number =count($ORDER_DETAIL_DRUG_ID);
        $count = 0;
        for($count = 0; $count< $number; $count++)
        {

        $drugname = Clinic_drug::where('DRUG_ID','=',$ORDER_DETAIL_DRUG_ID[$count])->first();

            // ******* รับเข้า Clinic_orders_detail *********//
            $update_store = new Clinic_orders_detail();
            $update_store->ORDER_ID = $id;
            $update_store->ORDER_DETAIL_DRUG_ID = $drugname->DRUG_ID;
            $update_store->ORDER_DETAIL_DRUG_CODE = $drugname->DRUG_CODE;
            $update_store->ORDER_DETAIL_DRUG_NAME = $drugname->DRUG_NAME;
            $update_store->ORDER_DETAIL_DRUG_UNIT = $ORDER_DETAIL_DRUG_UNIT[$count];
            $update_store->ORDER_DETAIL_DRUG_QTY = $ORDER_DETAIL_DRUG_QTY[$count];
            $update_store->ORDER_DETAIL_DRUG_PRICE = $ORDER_DETAIL_DRUG_PRICE[$count];
            $update_store->ORDER_DETAIL_DRUG_TOTAL = $ORDER_DETAIL_DRUG_QTY[$count] * $ORDER_DETAIL_DRUG_PRICE[$count];
            $update_store->ORDER_DETAIL_STORE = $idstore;
            $update_store->save();

            }
        }
        $SUMTOTALPRICE = Clinic_orders_detail::where('ORDER_ID','=',$id)->sum('ORDER_DETAIL_DRUG_TOTAL');

        $updatesum = Clinic_orders::find($id );
        $updatesum->ORDER_TOTAL = $SUMTOTALPRICE;
        $updatesum->save();
        return redirect()->route('setting.order',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');

    }
    public function order_destroy(Request $request,$idstore,$iduser,$id)
    {

        Clinic_orders::destroy($id);
        Clinic_orders_detail::where('ORDER_ID',$id)->delete();

        return redirect()->route('setting.order',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','ลบข้อมูลเรียบร้อยแล้ว');
    }

    public function order_print(Request $request,$idstore,$iduser,$id)
    {
        // $idstore =  Auth::user()->store_id;

        // $iduser =  Auth::user()->position;

        $posi =  DB::table('clinic_position') ->leftjoin('users','clinic_position.POSITION_ID','users.position')
        ->where('POSITION_ID','=',$iduser)->first();

        $order = DB::table('clinic_orders')
         ->leftjoin('clinic_locate','clinic_orders.ORDER_STORE','=','clinic_locate.LOCATE_ID')
         ->leftjoin('clinic_supplier','clinic_orders.ORDER_SUP','=','clinic_supplier.SUP_ID')
         ->leftjoin('users','clinic_orders.ORDER_APPROVER','users.id')
         ->leftjoin('clinic_position','users.position','clinic_position.POSITION_ID')
         ->where('ORDER_ID','=',$id)->first();

         $order_staff = DB::table('clinic_orders')
         ->leftjoin('clinic_locate','clinic_orders.ORDER_STORE','=','clinic_locate.LOCATE_ID')
         ->leftjoin('clinic_supplier','clinic_orders.ORDER_SUP','=','clinic_supplier.SUP_ID')
         ->leftjoin('users','clinic_orders.ORDER_STAFF','users.id')
         ->leftjoin('clinic_position','users.position','clinic_position.POSITION_ID')
         ->where('ORDER_ID','=',$id)->first();

         $order_approve = DB::table('clinic_orders')
         ->leftjoin('clinic_locate','clinic_orders.ORDER_STORE','=','clinic_locate.LOCATE_ID')
         ->leftjoin('clinic_supplier','clinic_orders.ORDER_SUP','=','clinic_supplier.SUP_ID')
         ->leftjoin('users','clinic_orders.ORDER_APPROVER','users.id')
         ->leftjoin('clinic_position','users.position','clinic_position.POSITION_ID')
         ->where('ORDER_ID','=',$id)->first();

        $order_detail = Clinic_orders_detail::leftjoin('clinic_unit','clinic_orders_detail.ORDER_DETAIL_DRUG_UNIT','clinic_unit.UNIT_ID')
        ->where('ORDER_ID','=',$id)
        ->get();

        $drug = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        return view('setting.order_print',[
            'order_approve'=>$order_approve,'order_staff'=>$order_staff,
            'data_hos'=>$data_hos,
            'orders'=>$order,
            'order_details'=>$order_detail,
            'idstore'=>$idstore,
            'posis'=>$posi,
        ]);
    }

    //****************** ฟังก์ชั่น sum */
    public static function sumrecieve($id)
    {
         $sumrecieve  =  Clinic_recieve_store::where('STORE_RECIEVE_DRUG_ID','=',$id)->sum('STORE_RECIEVE_DRUG_QTY');

        return $sumrecieve ;
    }
    public static function sumpay($id)
    {
         $sumpay  =  Clinic_pay_store::where('PAYDETAIL_DRUG_ID','=',$id)->sum('PAYDETAIL_DRUG_QTY');

       return $sumpay ;
    }
    public static function sumsympay($id)
    {
         $sumsympay  =  Clinic_sym_detail::where('SYM_DETAIL_DRUGID','=',$id)->sum('SYM_DETAIL_DRUGQTY');

       return $sumsympay ;
    }

    public static function sumdrughos_qty($icode)
    {
         $sumdrughos_qty  =  Opitemrece::where('icode','=',$icode)->sum('qty');

         $totalvalue_hos =   $sumdrughos_qty ;

       return $totalvalue_hos ;
    }
    public static function sumdrughos_totalpricehos($icode)
    {
         $sumdrughos_totalpricehos  =  Opitemrece::where('icode','=',$icode)->sum('qty');
         $pricedrug = Clinic_drug::where('DRUG_CODE','=',$icode)->first();

         $to =  $pricedrug->DRUG_UNIT_PRICE_COST;

         $totalprice = $to * $sumdrughos_totalpricehos;

         $totalpricehosvalue_hos =   $totalprice ;

       return $totalpricehosvalue_hos ;
    }

    public static function sumtotalqty($icode)
    {

        $sumdrughos_qty  =  Opitemrece::where('icode','=',$icode)->sum('qty');

         $sumrecieve  =  Clinic_recieve_store::where('STORE_RECIEVE_DRUG_CODE','=',$icode)->sum('STORE_RECIEVE_DRUG_QTY');

         $sumpay  =  Clinic_pay_store::where('PAYDETAIL_DRUG_CODE','=',$icode)->sum('PAYDETAIL_DRUG_QTY');

        //  $sumsympay  =  Clinic_sym_detail::where('SYM_DETAIL_DRUGID','=',$icode)->sum('SYM_DETAIL_DRUGQTY');

         $totalvalue =   $sumrecieve - $sumpay - $sumdrughos_qty  ;

       return $totalvalue ;
    }
    public static function sumtprice_rec($icode)
    {
        $sumtprice_rec  =  Clinic_recieve_store::where('STORE_RECIEVE_DRUG_CODE','=',$icode)->sum('STORE_RECIEVE_DRUG_TOTAL');
        return $sumtprice_rec ;
    }
    //==================================Recieve Drug ==========================================//

    public function recieve_drug(Request $request,$idstore,$iduser)
    {
        $drug = DB::table('clinic_drug')->get();
        $unit = DB::table('clinic_unit')->get();
        $rec = DB::table('clinic_recieve')->leftjoin('clinic_supplier','clinic_recieve.REC_SUP','clinic_supplier.SUP_ID')
        ->leftjoin('users','clinic_recieve.REC_STAFF','users.id')
        ->where('REC_LOCATE','=',$idstore)
        ->get();

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $per_a = DB::table('clinic_per')->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('setting.recieve_drug',[
            'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
            'order_a'=>$order_a,
            'drugs'=>$drug,
            'units'=>$unit,
            'recs'=>$rec,
        ]);
    }
    public function recieve_drug_add(Request $request,$idstore,$iduser)
    {
        $drug = DB::table('clinic_drug')
        ->leftjoin('clinic_unit','clinic_drug.DRUG_UNIT','clinic_unit.UNIT_ID')
        ->where('DRUG_STORE','=',$idstore)->get();
        $unit = DB::table('clinic_unit')->get();
        $sup = DB::table('clinic_supplier')->get();
        $locate = DB::table('clinic_locate')->get();
        $year = DB::table('clinic_year')->get();
        $iduser =  Auth::user()->id;
        $no_order = DB::table('clinic_orders')->leftjoin('clinic_supplier','clinic_orders.ORDER_SUP','clinic_supplier.SUP_ID')->where('ORDER_STAFF','=',$iduser)->get();

        $maxnumber = Clinic_recieve::max('REC_BILLNO');
        if($maxnumber != '' ||  $maxnumber != null){
         $refmax = Clinic_recieve::where('REC_BILLNO','=',$maxnumber)->first();

         if($refmax->REC_BILLNO != '' ||  $refmax->REC_BILLNO != null){
         $maxref = substr($refmax->REC_BILLNO, -4)+1;
         }else{
         $maxref = 1;
         }
         $ref = str_pad($maxref, 5, "0", STR_PAD_LEFT);
         }else{
        $ref = '00001';
         }
        //  $refnumber ='BillNo'.'-'. $ref;
         $store_no = DB::table('clinic_locate')->leftjoin('users','clinic_locate.LOCATE_ID','=','users.store_id')->where('clinic_locate.LOCATE_ID','=',$idstore)->first();
         $refnumber ='REC-NO'.'/'. $store_no->LOCATE_CODE.'/'. $ref;

         $maxnum = Clinic_recieve::max('REC_BILLPO');
         if($maxnum != '' ||  $maxnum != null){
          $refmax = Clinic_recieve::where('REC_BILLPO','=',$maxnum)->first();

          if($refmax->REC_BILLPO != '' ||  $refmax->REC_BILLPO != null){
          $maxpo = substr($refmax->REC_BILLPO, -4)+1;
          }else{
          $maxref = 1;
          }
          $refe = str_pad($maxpo, 5, "0", STR_PAD_LEFT);
          }else{
         $refe = '00001';
          }
        //   $billPO = 'BillPo'.'-'.$refe;
          $store_no2 = DB::table('clinic_locate')->leftjoin('users','clinic_locate.LOCATE_ID','=','users.store_id')->where('clinic_locate.LOCATE_ID','=',$idstore)->first();
          $billPO ='REC-PO'.'/'. $store_no2->LOCATE_CODE.'/'. $ref;

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
         $pml =  DB::table('users')->where('id','=',$iduser)->first();
         $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
         $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

         
        return view('setting.recieve_drug_add',[
            'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'drugs'=>$drug,'billPOs'=>$billPO,
            'units'=>$unit,
            'sups'=>$sup,
            'refnumbers' => $refnumber,
            'locates'=>$locate,
            'years'=>$year, 'no_orders'=>$no_order,
        ]);
    }

    // public static function sumqty($id)
        // {
        //      $sumqty  =  Clinic_drug::where('DRUG_ID','=',$id)->sum('DRUG_QTY');

        //    return $sumqty ;
    // }
   
    public function recieve_drug_save(Request $request)
    {
        $idstore = $request->idstore;
        $iduser = $request->iduser;

        $add= new Clinic_recieve();
        $add->REC_DATE = $request->REC_DATE;
        $add->REC_BILLNO = $request->REC_BILLNO;
        $add->REC_YEAR = $request->REC_YEAR;
        $add->REC_BILLPO = $request->REC_BILLPO;
        $add->REC_STAFF = $request->REC_STAFF;
        $add->REC_SUP = $request->REC_SUP;
        $add->REC_LOCATE = $idstore;
        $add->REC_TOTAL = $request->REC_TOTAL;
        $add->save();

        $id_rec =  Clinic_recieve::max('REC_ID');

            if($request->STORE_RECIEVE_DRUG_ID != '' || $request->STORE_RECIEVE_DRUG_ID != null){

                $STORE_RECIEVE_DRUG_ID = $request->STORE_RECIEVE_DRUG_ID;
                $STORE_RECIEVE_DRUG_QTY = $request->STORE_RECIEVE_DRUG_QTY;
                $STORE_RECIEVE_DRUG_UNIT = $request->STORE_RECIEVE_DRUG_UNIT;
                $STORE_RECIEVE_DRUG_PRICE = $request->STORE_RECIEVE_DRUG_PRICE;
                $STORE_RECIEVE_DRUG_LOT = $request->STORE_RECIEVE_DRUG_LOT;
                $STORE_RECIEVE_DRUG_DATE_BEGIN = $request->STORE_RECIEVE_DRUG_DATE_BEGIN;
                $STORE_RECIEVE_DRUG_DATE_EXP = $request->STORE_RECIEVE_DRUG_DATE_EXP;

            $number =count($STORE_RECIEVE_DRUG_ID);
            $count = 0;
            for($count = 0; $count< $number; $count++)
            {
            $drugname = Clinic_drug::where('DRUG_ID','=',$STORE_RECIEVE_DRUG_ID[$count])->first();
            // ******* รับเข้า clinic_recieve_store *********//
            $add_store = new Clinic_recieve_store();
            $add_store->REC_ID = $id_rec;
            $add_store->STORE_RECIEVE_DRUG_ID = $drugname->DRUG_ID;
            $add_store->STORE_RECIEVE_DRUG_CODE = $drugname->DRUG_CODE;
            $add_store->STORE_RECIEVE_DRUG_NAME = $drugname->DRUG_NAME;
            $add_store->STORE_RECIEVE_DRUG_UNIT = $STORE_RECIEVE_DRUG_UNIT[$count];
            $add_store->STORE_RECIEVE_DRUG_QTY = $STORE_RECIEVE_DRUG_QTY[$count];
            $add_store->STORE_RECIEVE_DRUG_PRICE = $STORE_RECIEVE_DRUG_PRICE[$count];
            $add_store->STORE_RECIEVE_DRUG_TOTAL = $STORE_RECIEVE_DRUG_QTY[$count] * $STORE_RECIEVE_DRUG_PRICE[$count];
            $add_store->STORE_RECIEVE_DRUG_LOT = $STORE_RECIEVE_DRUG_LOT[$count];
            $add_store->STORE_LOCATE_ID = $idstore;
            $add_store->STORE_RECIEVE_DRUG_DATE_BEGIN = $STORE_RECIEVE_DRUG_DATE_BEGIN[$count];
            $add_store->STORE_RECIEVE_DRUG_DATE_EXP = $STORE_RECIEVE_DRUG_DATE_EXP[$count];
            $add_store->save();

             // ******* รับเข้าสต็อค *********//

                $recieve_store =  DB::table('clinic_recieve_store')->where('STORE_RECIEVE_DRUG_ID','=',$STORE_RECIEVE_DRUG_ID[$count])->sum('STORE_RECIEVE_DRUG_QTY');
                $stock = $drugname->DRUG_TOTAL;
                $amountlot = $recieve_store;
                $amountstock = $stock;
                $total = $amountlot + $amountstock;

                $updateqty = Clinic_drug::find($STORE_RECIEVE_DRUG_ID[$count]);
                $updateqty->DRUG_RECIEVE = $amountlot;
                $updateqty->DRUG_TOTAL = $total;
                $updateqty->save();
            }
        }
        // ******* อัพเดท Total recieve *********//
        $SUMTOTALPRICE = Clinic_recieve_store::where('REC_ID','=',$id_rec)->sum('STORE_RECIEVE_DRUG_TOTAL');
        $updatesum = Clinic_recieve::find($id_rec );
        $updatesum->REC_TOTAL = $SUMTOTALPRICE;
        $updatesum->save();

        return redirect()->route('setting.recieve_drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function recieve_drug_edit(Request $request,$idstore,$iduser,$id)
    {
        $rec = DB::table('clinic_recieve')->where('REC_ID','=',$id)->first();
        $rec_detail = DB::table('clinic_recieve_store')->where('REC_ID','=',$id)->get();

        $maxnumber = Clinic_recieve::max('REC_BILLNO');
        if($maxnumber != '' ||  $maxnumber != null){
         $refmax = Clinic_recieve::where('REC_BILLNO','=',$maxnumber)->first();

         if($refmax->REC_BILLNO != '' ||  $refmax->REC_BILLNO != null){
         $maxref = substr($refmax->REC_BILLNO, -4)+1;
         }else{
         $maxref = 1;
         }
         $ref = str_pad($maxref, 5, "0", STR_PAD_LEFT);
         }else{
        $ref = '00001';
         }
         $refnumber ='Disrec'.'-'. $ref;

        
         $drug = DB::table('clinic_drug')
        ->leftjoin('clinic_unit','clinic_drug.DRUG_UNIT','clinic_unit.UNIT_ID')
        ->where('DRUG_STORE','=',$idstore)->get();
         $unit = DB::table('clinic_unit')->get();
         $sup = DB::table('clinic_supplier')->get();
         $locate = DB::table('clinic_locate')->get();
         $year = DB::table('clinic_year')->get();
         $iduser =  Auth::user()->id;
         $no_order = DB::table('clinic_orders')->leftjoin('clinic_supplier','clinic_orders.ORDER_SUP','clinic_supplier.SUP_ID')->where('ORDER_STAFF','=',$iduser)->get();

         $locate_a = DB::table('clinic_locate')->count();
         $category_a = DB::table('clinic_category')->count();
         $unit_a = DB::table('clinic_unit')->count();
         $supplier_a = DB::table('clinic_supplier')->count();
         $sym_a = DB::table('clinic_sym')->count();
         $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
         $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
         $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
         $per_a = DB::table('clinic_per')->count();
         $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
         $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
         $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

         $pml =  DB::table('users')->where('id','=',$iduser)->first();
         $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
         $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

        return view('setting.recieve_drug_edit',[
            'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a, 'order_a'=>$order_a,
            'drugs'=>$drug,
            'units'=>$unit,
            'sups'=>$sup,
            'recs'=>$rec,
           'refnumbers' => $refnumber,
           'rec_details'=>$rec_detail,
           'locates'=>$locate,
            'years'=>$year,'no_orders'=>$no_order,
        ]);
    }
    public function recieve_drug_update(Request $request)
    {
            // $id_per = $request->REC_STAFF;
            // $locate = $request->REC_LOCATE;
            $id = $request->REC_ID;
            $idstore = $request->idstore;
            $iduser = $request->iduser;

            $update = Clinic_recieve::find($id);
            $update->REC_DATE = $request->REC_DATE;
            $update->REC_BILLNO = $request->REC_BILLNO;
            $update->REC_YEAR = $request->REC_YEAR;
            $update->REC_BILLPO = $request->REC_BILLPO;
            $update->REC_STAFF = $iduser;
            $update->REC_SUP = $request->REC_SUP;
            $update->REC_LOCATE = $idstore;
            $update->save();

        Clinic_recieve_store::where('REC_ID','=',$id)->delete();

        if($request->STORE_RECIEVE_DRUG_ID != '' || $request->STORE_RECIEVE_DRUG_ID != null){

            $STORE_RECIEVE_DRUG_ID = $request->STORE_RECIEVE_DRUG_ID;
            $STORE_RECIEVE_DRUG_QTY = $request->STORE_RECIEVE_DRUG_QTY;
            $STORE_RECIEVE_DRUG_UNIT = $request->STORE_RECIEVE_DRUG_UNIT;
            $STORE_RECIEVE_DRUG_PRICE = $request->STORE_RECIEVE_DRUG_PRICE;
            $STORE_RECIEVE_DRUG_LOT = $request->STORE_RECIEVE_DRUG_LOT;
            $STORE_RECIEVE_DRUG_DATE_BEGIN = $request->STORE_RECIEVE_DRUG_DATE_BEGIN;
            $STORE_RECIEVE_DRUG_DATE_EXP = $request->STORE_RECIEVE_DRUG_DATE_EXP;

        $number =count($STORE_RECIEVE_DRUG_ID);
        $count = 0;
        for($count = 0; $count< $number; $count++)
        {
        $drugname = Clinic_drug::where('DRUG_ID','=',$STORE_RECIEVE_DRUG_ID[$count])->first();

            // ******* รับเข้า clinic_recieve_store *********//
            $update_store = new Clinic_recieve_store();
            $update_store->REC_ID = $id;
            $update_store->STORE_RECIEVE_DRUG_ID = $drugname->DRUG_ID;
            $update_store->STORE_RECIEVE_DRUG_CODE = $drugname->DRUG_CODE;
            $update_store->STORE_RECIEVE_DRUG_NAME = $drugname->DRUG_NAME;
            $update_store->STORE_RECIEVE_DRUG_UNIT = $STORE_RECIEVE_DRUG_UNIT[$count];
            $update_store->STORE_RECIEVE_DRUG_QTY = $STORE_RECIEVE_DRUG_QTY[$count];
            $update_store->STORE_RECIEVE_DRUG_PRICE = $STORE_RECIEVE_DRUG_PRICE[$count];
            $update_store->STORE_RECIEVE_DRUG_TOTAL = $STORE_RECIEVE_DRUG_QTY[$count] * $STORE_RECIEVE_DRUG_PRICE[$count];
            $update_store->STORE_RECIEVE_DRUG_LOT = $STORE_RECIEVE_DRUG_LOT[$count];
            $update_store->STORE_LOCATE_ID = $idstore;
            $update_store->STORE_RECIEVE_DRUG_DATE_BEGIN = $STORE_RECIEVE_DRUG_DATE_BEGIN[$count];
            $update_store->STORE_RECIEVE_DRUG_DATE_EXP = $STORE_RECIEVE_DRUG_DATE_EXP[$count];
            $update_store->save();

           // ******* รับเข้าสต็อค *********//
           $qty = $drugname->DRUG_RECIEVE;
           $total = $drugname->DRUG_TOTAL;
           $sumrecieve  =  Clinic_recieve_store::where('STORE_RECIEVE_DRUG_ID','=',$STORE_RECIEVE_DRUG_ID[$count])->sum('STORE_RECIEVE_DRUG_QTY');

           $updateqty = Clinic_drug::find($STORE_RECIEVE_DRUG_ID[$count]);
           $updateqty->DRUG_RECIEVE_QTY = $STORE_RECIEVE_DRUG_QTY[$count] ;
           $updateqty->DRUG_RECIEVE = $sumrecieve ;
        //    $updateqty->DRUG_TOTAL = $sumrecieve ;
           $updateqty->save();
            }
        }
        $SUMTOTALPRICE = Clinic_recieve_store::where('REC_ID','=',$id)->sum('STORE_RECIEVE_DRUG_TOTAL');

        $updatesum = Clinic_recieve::find($id );
        $updatesum->REC_TOTAL = $SUMTOTALPRICE;
        $updatesum->save();

        return redirect()->route('setting.recieve_drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
    }
    public function recieve_drug_destroy(Request $request,$idstore,$iduser,$id)
    {

        Clinic_recieve::destroy($id);
        Clinic_recieve_store::where('REC_ID',$id)->delete();

        return redirect()->route('setting.recieve_drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','ลบข้อมูลเรียบร้อยแล้ว');
    }
//================Pay Drug ==========================================//

 public function pay_drug(Request $request,$idstore,$iduser)
 {
     $drug = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->get();
     $unit = DB::table('clinic_unit')->get();

     $pay = DB::table('clinic_pay')->leftjoin('clinic_locate','clinic_pay.PAY_STORE','clinic_locate.LOCATE_ID')
     ->leftjoin('users','clinic_pay.PAY_STAFF','users.id')
     ->where('PAY_STORE_STAFF','=',$idstore)->get();

     $pay_user = DB::table('clinic_pay')->leftjoin('clinic_locate','clinic_pay.PAY_STORE','clinic_locate.LOCATE_ID')
     ->leftjoin('users','clinic_pay.PAY_STAFF','users.id')
    ->where('PAY_USER','!=',$iduser)
    // ->orderBy('PAY_USER')
     ->get();

     $locate_a = DB::table('clinic_locate')->count();
     $category_a = DB::table('clinic_category')->count();
     $unit_a = DB::table('clinic_unit')->count();
     $supplier_a = DB::table('clinic_supplier')->count();
     $sym_a = DB::table('clinic_sym')->count();

     $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
     $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
     $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
     $per_a = DB::table('clinic_per')->count();
     $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
     $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
     $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
     $pml =  DB::table('users')->where('id','=',$iduser)->first();
     $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
     $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
     return view('setting.pay_drug',[
        'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
        'data_hos'=>$data_hos, 'pay_users'=>$pay_user,
         'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
         'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
         'drugs'=>$drug,
         'units'=>$unit,
         'pays'=>$pay,
         'order_a'=>$order_a,
     ]);
 }

 public function pay_drug_add(Request $request,$idstore,$iduser)
 {

     $drug = DB::table('clinic_drug')
        ->leftjoin('clinic_unit','clinic_drug.DRUG_UNIT','clinic_unit.UNIT_ID')
        ->where('DRUG_STORE','=',$idstore)->get();

    
     $no_order = DB::table('clinic_orders')->where('ORDER_STAFF','=',$iduser)->get();

     $unit = DB::table('clinic_unit')->get();
     $locate = DB::table('clinic_locate')->get();
     $year = DB::table('clinic_year')->get();
     $userA = DB::table('users')->leftjoin('clinic_position','users.position','=','clinic_position.POSITION_ID')->where('store_id','=',$idstore)->get();
     $userAB = DB::table('users')->where('store_id','=',$idstore)->get();


     $maxnumber = Clinic_pay::max('PAY_BILLNO');
     if($maxnumber != '' ||  $maxnumber != null){
      $refmax = Clinic_pay::where('PAY_BILLNO','=',$maxnumber)->first();

      if($refmax->PAY_BILLNO != '' ||  $refmax->PAY_BILLNO != null){
      $maxref = substr($refmax->PAY_BILLNO, -4)+1;
      }else{
      $maxref = 1;
      }
      $ref = str_pad($maxref, 5, "0", STR_PAD_LEFT);
      }else{
     $ref = '00001';
      }
    //   $refnumber ='PayNo'.'-'. $ref;
      $store_no = DB::table('clinic_locate')->leftjoin('users','clinic_locate.LOCATE_ID','=','users.store_id')->where('clinic_locate.LOCATE_ID','=',$idstore)->first();
      $refnumber ='PAY-NO'.'/'. $store_no->LOCATE_CODE.'/'. $ref;

      $locate_a = DB::table('clinic_locate')->count();
      $category_a = DB::table('clinic_category')->count();
      $unit_a = DB::table('clinic_unit')->count();
      $supplier_a = DB::table('clinic_supplier')->count();
      $sym_a = DB::table('clinic_sym')->count();
      $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
      $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
      $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
      $per_a = DB::table('clinic_per')->count();
      $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
      $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
    $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
    $pml =  DB::table('users')->where('id','=',$iduser)->first();
    $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
    $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
     return view('setting.pay_drug_add',[
        'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
         'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
         'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
         'order_a'=>$order_a,'userAs'=>$userA,'userABs'=>$userAB,
         'drugs'=>$drug,
         'units'=>$unit,
         'locates'=>$locate,
         'refnumbers' => $refnumber,
         'years'=>$year, 'no_orders'=>$no_order,
     ]);
 }
 public function pay_drug_save(Request $request)
 {
    //  $Store = $request->PAY_STORE;

     $idstore = $request->idstore;
     $iduser = $request->PAY_STAFFH;

     $add= new Clinic_pay();
     $add->PAY_BILLNO = $request->PAY_BILLNO;
     $add->PAY_DATE = $request->PAY_DATE;
     $add->PAY_YEAR = $request->PAY_YEAR;
     $add->PAY_BILL_ORDERS = $request->PAY_BILL_ORDERS;
     $add->PAY_STORE = $request->PAY_STORE;
     $add->PAY_STORE_STAFF = $idstore;
     $add->PAY_STAFF = $iduser;
     $add->PAY_USER = $request->PAY_USER;
     $add->PAY_APPROVER = $request->PAY_APPROVER;
     $add->save();

     $id_pay =  Clinic_pay::max('PAY_ID');

         if($request->PAYDETAIL_DRUG_ID != '' || $request->PAYDETAIL_DRUG_ID != null){

             $PAYDETAIL_DRUG_ID = $request->PAYDETAIL_DRUG_ID;
             $PAYDETAIL_DRUG_QTY = $request->PAYDETAIL_DRUG_QTY;
             $PAYDETAIL_DRUG_UNIT = $request->PAYDETAIL_DRUG_UNIT;
             $PAYDETAIL_DRUG_PRICE = $request->PAYDETAIL_DRUG_PRICE;

         $number =count($PAYDETAIL_DRUG_ID);
         $count = 0;
         for($count = 0; $count< $number; $count++)
         {

         $drugname = Clinic_drug::where('DRUG_ID','=',$PAYDETAIL_DRUG_ID[$count])->first();

         $adddetail = new Clinic_pay_store();
         $adddetail->PAYDETAIL_PAY_ID = $id_pay;
         $adddetail->PAYDETAIL_DRUG_ID = $PAYDETAIL_DRUG_ID[$count];
         $adddetail->PAYDETAIL_DRUG_CODE = $drugname->DRUG_CODE;
         $adddetail->PAYDETAIL_DRUG_NAME = $drugname->DRUG_NAME;
         $adddetail->STORE_LOCATE_ID = $idstore;
         $adddetail->PAYDETAIL_DRUG_QTY = $PAYDETAIL_DRUG_QTY[$count];
         $adddetail->PAYDETAIL_DRUG_UNIT = $PAYDETAIL_DRUG_UNIT[$count];
         $adddetail->PAYDETAIL_DRUG_PRICE = $PAYDETAIL_DRUG_PRICE[$count];
         $adddetail->PAYDETAIL_DRUG_PRICE_TOTAL = $PAYDETAIL_DRUG_QTY[$count] * $PAYDETAIL_DRUG_PRICE[$count];
         $adddetail->save();

      }
  }
  // ******* อัพเดท Total pay *********//

    $SUMTOTALPRICE = Clinic_pay_store::where('PAYDETAIL_PAY_ID','=',$id_pay)->sum('PAYDETAIL_DRUG_PRICE_TOTAL');

    $updatesum = Clinic_pay::find($id_pay );
    $updatesum->PAY_TOTAL = $SUMTOTALPRICE;
    $updatesum->save();

     return redirect()->route('setting.pay_drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

 }

 public function pay_drug_edit(Request $request,$idstore,$iduser,$id)
 {

     $pay = DB::table('clinic_pay')->where('PAY_ID','=',$id)->first();

     $pay_detail = DB::table('clinic_pay_store')->where('PAYDETAIL_PAY_ID','=',$id)->get();

     $maxnumber = Clinic_pay::max('PAY_BILLNO');
     if($maxnumber != '' ||  $maxnumber != null){
      $refmax = Clinic_pay::where('PAY_BILLNO','=',$maxnumber)->first();

      if($refmax->PAY_BILLNO != '' ||  $refmax->PAY_BILLNO != null){
      $maxref = substr($refmax->PAY_BILLNO, -4)+1;
      }else{
      $maxref = 1;
      }
      $ref = str_pad($maxref, 5, "0", STR_PAD_LEFT);
      }else{
     $ref = '00001';
      }
      $refnumber ='PayNo'.'-'. $ref;

    
      $no_order = DB::table('clinic_orders')->where('ORDER_STAFF','=',$iduser)->get();

      $unit = DB::table('clinic_unit')->get();
      $sup = DB::table('clinic_supplier')->get();
      $locate = DB::table('clinic_locate')->get();
      $year = DB::table('clinic_year')->get();
      $drug = DB::table('clinic_drug')
        ->leftjoin('clinic_unit','clinic_drug.DRUG_UNIT','clinic_unit.UNIT_ID')
        ->where('DRUG_STORE','=',$idstore)->get();
      $userA = DB::table('users')->leftjoin('clinic_position','users.position','=','clinic_position.POSITION_ID')->where('store_id','=',$idstore)->get();
      $userAB = DB::table('users')->get();

      $locate_a = DB::table('clinic_locate')->count();
      $category_a = DB::table('clinic_category')->count();
      $unit_a = DB::table('clinic_unit')->count();
      $supplier_a = DB::table('clinic_supplier')->count();
      $sym_a = DB::table('clinic_sym')->count();
      $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
      $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
      $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
      $per_a = DB::table('clinic_per')->count();
      $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
      $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();
      $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
      $pml =  DB::table('users')->where('id','=',$iduser)->first();
      $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
      $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();

     return view('setting.pay_drug_edit',[
        'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
         'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
         'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
         'order_a'=>$order_a, 'no_orders'=>$no_order,
         'drugs'=>$drug,
         'units'=>$unit,
         'locates'=>$locate,
         'refnumbers' => $refnumber,
         'pays'=>$pay,
         'pay_details' => $pay_detail,
         'years'=>$year,
         'userAs'=>$userA, 'userABs'=>$userAB,
     ]);
 }

 public function pay_drug_update(Request $request)
 {

         $id = $request->PAY_ID;
         $idstore = $request->idstore;
         $iduser = $request->iduser;

         $update = Clinic_pay::find($id);
         $update->PAY_BILLNO = $request->PAY_BILLNO;
         $update->PAY_DATE = $request->PAY_DATE;
         $update->PAY_YEAR = $request->PAY_YEAR;
         $update->PAY_BILL_ORDERS = $request->PAY_BILL_ORDERS;
         $update->PAY_STORE = $request->PAY_STORE;
         $update->PAY_STORE_STAFF = $idstore;
         $update->PAY_STAFF = $iduser;
         $update->PAY_USER = $request->PAY_USER;
         $update->PAY_APPROVER = $request->PAY_APPROVER;
         $update->save();

         Clinic_pay_store::where('PAYDETAIL_PAY_ID','=',$id)->delete();

     if($request->PAYDETAIL_DRUG_ID != '' || $request->PAYDETAIL_DRUG_ID != null){

     $PAYDETAIL_DRUG_ID = $request->PAYDETAIL_DRUG_ID;
     $PAYDETAIL_DRUG_UNIT = $request->PAYDETAIL_DRUG_UNIT;
     $PAYDETAIL_DRUG_QTY = $request->PAYDETAIL_DRUG_QTY;
     $PAYDETAIL_DRUG_PRICE = $request->PAYDETAIL_DRUG_PRICE;

     $number =count($PAYDETAIL_DRUG_ID);
     $count = 0;
     for($count = 0; $count< $number; $count++)
     {

     $drugid = Clinic_drug::where('DRUG_ID','=',$PAYDETAIL_DRUG_ID[$count])->first();

         $update_detail =new Clinic_pay_store();
         $update_detail->PAYDETAIL_PAY_ID = $id;
         $update_detail->PAYDETAIL_DRUG_ID = $drugid->DRUG_ID;
         $update_detail->PAYDETAIL_DRUG_CODE = $drugid->DRUG_CODE;
         $update_detail->PAYDETAIL_DRUG_NAME = $drugid->DRUG_NAME;
         $update_detail->PAYDETAIL_DRUG_UNIT = $PAYDETAIL_DRUG_UNIT[$count];
         $update_detail->PAYDETAIL_DRUG_QTY = $PAYDETAIL_DRUG_QTY[$count];
         $update_detail->PAYDETAIL_DRUG_PRICE = $PAYDETAIL_DRUG_PRICE[$count];
         $update_detail->PAYDETAIL_DRUG_PRICE_TOTAL = $PAYDETAIL_DRUG_QTY[$count] * $PAYDETAIL_DRUG_PRICE[$count];
         $update_detail->save();

         $sumpay  =  Clinic_pay_store::where('PAYDETAIL_DRUG_ID','=',$PAYDETAIL_DRUG_ID[$count])->sum('PAYDETAIL_DRUG_QTY');

         // ******* รับเข้าสต็อค *********//
         $qty_rec = $drugid->DRUG_PAY_QTY ;
         $qty_recup = $drugid->DRUG_PAY_QTY_UPDATE ;
         $qty = $drugid->DRUG_PAY ;
         $total = $drugid->DRUG_TOTAL;

         $updateqty = Clinic_drug::find($PAYDETAIL_DRUG_ID[$count]);

         $updateqty->DRUG_PAY =  $sumpay;
         $updateqty->DRUG_PAY_QTY_UPDATE = $PAYDETAIL_DRUG_QTY[$count];
         $updateqty->DRUG_TOTAL = $sumpay;
         $updateqty->save();
     }
 }
     $SUMTOTALPRICE = Clinic_pay_store::where('PAYDETAIL_PAY_ID','=',$id)->sum('PAYDETAIL_DRUG_PRICE_TOTAL');

     $updatesum = Clinic_pay::find($id );
     $updatesum->PAY_TOTAL = $SUMTOTALPRICE;
     $updatesum->save();

     return redirect()->route('setting.pay_drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว');

 }

 public function pay_drug_destroy(Request $request,$idstore,$iduser,$id)
 {

     Clinic_pay::destroy($id);
     Clinic_pay_store::where('PAYDETAIL_PAY_ID',$id)->delete();

     return redirect()->route('setting.pay_drug',['idstore'=>$idstore,'iduser'=>$iduser])->with('success','ลบข้อมูลเรียบร้อยแล้ว');
 }
 public function pay_print(Request $request,$idstore,$iduser,$id)
    {
      

        $iduser =  Auth::user()->position;

      
        $posi =  DB::table('clinic_position') ->leftjoin('users','clinic_position.POSITION_ID','users.position')
        ->where('POSITION_ID','=',$iduser)->first();

        $store =  DB::table('clinic_locate') ->leftjoin('users','clinic_locate.LOCATE_ID','users.store_id')
        ->where('LOCATE_ID','=',$idstore)->first();

        $pay = DB::table('clinic_pay')
         ->leftjoin('clinic_locate','clinic_pay.PAY_STORE','=','clinic_locate.LOCATE_ID')
         ->leftjoin('users','clinic_pay.PAY_APPROVER','users.id')
         ->leftjoin('clinic_position','users.position','clinic_position.POSITION_ID')
         ->where('PAY_ID','=',$id)->first();

         $pay_u = DB::table('clinic_pay')
         ->leftjoin('clinic_locate','clinic_pay.PAY_STORE','=','clinic_locate.LOCATE_ID')
         ->leftjoin('users','clinic_pay.PAY_USER','users.id')
         ->leftjoin('clinic_position','users.position','clinic_position.POSITION_ID')
         ->where('PAY_ID','=',$id)->first();

        $pay_detail = Clinic_pay_store::leftjoin('clinic_unit','clinic_pay_store.PAYDETAIL_DRUG_UNIT','clinic_unit.UNIT_ID')
        ->where('PAYDETAIL_PAY_ID','=',$id)
        ->get();

        $drug = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
        return view('setting.pay_print',[
            'data_hos'=>$data_hos,'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'pays'=>$pay,'pay_us'=>$pay_u,
            'pay_details'=>$pay_detail,
            'idstore'=>$idstore,
            'posis'=>$posi,
            'stores'=>$store,
        ]);
    }
   
    public function drug_print(Request $request,$idstore,$iduser)
    {
     
        $store =  DB::table('clinic_locate') ->leftjoin('users','clinic_locate.LOCATE_ID','users.store_id')
        ->where('LOCATE_ID','=',$idstore)->first();


        $drug = DB::table('clinic_drug')
        ->leftjoin('clinic_unit','clinic_drug.DRUG_UNIT','=','clinic_unit.UNIT_ID')
        ->where('DRUG_STORE','=',$idstore)->get();


        $sumtprice_pay = Clinic_pay_store::sum('PAYDETAIL_DRUG_PRICE_TOTAL');

        $sumtprice_rec = Clinic_recieve_store::sum('STORE_RECIEVE_DRUG_TOTAL');

        $sumtotal = $sumtprice_rec -  $sumtprice_pay ;

        // $sumtotal = Opitemrece::where('icode','=',$icode)->sum('qty');

        return view('setting.drug_print',[
            'drugs'=>$drug,
            'sumtotals'=>$sumtotal,
            'sumtprice_pays'=>$sumtprice_pay,
           'sumtprice_recs'=>$sumtprice_rec,
            'stores'=>$store,
        ]);
    }

    function drug_export_excel(Request $request,$idstore,$iduser)
    {
        $store =  DB::table('clinic_locate') 
        ->leftjoin('users','clinic_locate.LOCATE_ID','users.store_id')
        ->where('LOCATE_ID','=',$idstore)->first();

        $drug = DB::table('clinic_drug')
        ->leftjoin('clinic_unit','clinic_drug.DRUG_UNIT','=','clinic_unit.UNIT_ID')
        ->where('DRUG_STORE','=',$idstore)->get();

        $sumtprice_pay = Clinic_pay_store::sum('PAYDETAIL_DRUG_PRICE_TOTAL');

        $sumtprice_rec = Clinic_recieve_store::sum('STORE_RECIEVE_DRUG_TOTAL');

        $sumtotal = $sumtprice_rec -  $sumtprice_pay ;

        return view('setting.drug_export_excel',[
            'drugs'=>$drug,
            'sumtotals'=>$sumtotal,
            'sumtprice_pays'=>$sumtprice_pay,
           'sumtprice_recs'=>$sumtprice_rec,
            'stores'=>$store,
        ]);
    }

    public static function sumdrug_hos_qty($icode)
    {
         $sumdrug_opitem  =  Opitemrece::where('icode','=',$icode)->sum('qty');
         $totalvalue =   $sumdrug_opitem ;

       return $totalvalue ;
    }

    public function drug_hos(Request $request)
    {
        $idstore =  Auth::user()->store_id;

        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

        $drug_hos = Drugitems::where('istatus','=','Y')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        return view('hos.drug_hos',[
            'data_hos'=>$data_hos,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'drug_hoss' => $drug_hos,

        ]);
    }

    public function drug_hos_save(Request $request)
    {
        $idstore = $request->store_id;
        $d_icode = $request->icode;
        $d_name = $request->name;
        $d_strength = $request->strength;
        $d_units = $request->units;
        $d_unitprice = $request->unitprice;
        $d_unitcost = $request->unitcost;
        $d_did = $request->did;
        $d_istatus = $request->istatus;
        // $d_therapeutic = $request->therapeutic;
        $d_qty = $request->qty;

        $number =count($idstore);
        $count = 0;
        for($count = 0; $count< $number; $count++)
        {
            $add= new Clinic_drug();
            $add->DRUG_CODE = $d_icode[$count];
            $add->DRUG_NAME = $d_name[$count];

            if($d_units[$count] == 'TABLET'){
                $add->DRUG_UNIT = 1;
           }elseif($d_units[$count] == 'เม็ด'){
                $add->DRUG_UNIT = 2;
           }elseif($d_units[$count] == 'CAPSULE'){
                $add->DRUG_UNIT = 3;
           }elseif($d_units[$count] == 'TAB'){
                $add->DRUG_UNIT = 4;
            }elseif($d_units[$count] == 'ขวด (10 ML.)'){
                $add->DRUG_UNIT = 5;
            }elseif($d_units[$count] == 'ขวด (60 ML.)'){
                $add->DRUG_UNIT = 6;
            }elseif($d_units[$count] == 'ขวด (120 ML.)'){
                $add->DRUG_UNIT = 7;
            }elseif($d_units[$count] == 'ขวด (180 ML)'){
                $add->DRUG_UNIT = 8;
            }elseif($d_units[$count] == 'ขวด (240 ML)'){
                $add->DRUG_UNIT = 9;
            }elseif($d_units[$count] == 'AMP (1 ml.)'){
                $add->DRUG_UNIT = 10;
            }elseif($d_units[$count] == 'หลอด (15 G.)'){
                $add->DRUG_UNIT = 11;
            }elseif($d_units[$count] == 'ขวด (450 ML.)'){
                $add->DRUG_UNIT = 12;
            }elseif($d_units[$count] == 'BAG (500 ML.)'){
                $add->DRUG_UNIT = 13;
            }elseif($d_units[$count] == 'BAG (1000 ML.)'){
                $add->DRUG_UNIT = 14;
            }elseif($d_units[$count] == 'AMP (2 ml.)'){
                $DRUG_UNIT = 15;
            }elseif($d_units[$count] == 'AMP (3 ML.)'){
                $add->DRUG_UNIT = 16;
            }elseif($d_units[$count] == 'หลอด (30 G.)'){
                $add->DRUG_UNIT = 17;
            }elseif($d_units[$count] == 'หลอด (45 G.)'){
                $add->DRUG_UNIT = 18;
            }elseif($d_units[$count] == 'ซอง (3.3 G.)'){
                $add->DRUG_UNIT = 19;
            }elseif($d_units[$count] == 'ซอง (6.97 G.)'){
                $add->DRUG_UNIT = 20;
            }elseif($d_units[$count] == 'หลอด (5 G.)'){
                $add->DRUG_UNIT = 21;
           }else{
                $add->DRUG_UNIT = '';
           }

            $add->DRUG_STRENGTH = $d_strength[$count];
            $add->DRUG_UNIT_PRICE = $d_unitprice[$count];
            $add->DRUG_UNIT_PRICE_COST = $d_unitcost[$count];
            $add->DRUG_DID = $d_did[$count];
            $add->STATUS = $d_istatus[$count];
            // $add->THERAPEUTIC = $d_therapeutic[$count];
            $add->DRUG_STORE = $idstore[$count];
            $add->save();
         }
            return redirect()->route('hos.drug_hos',['idstore'=>$idstore])->with('success','เพิ่มรายการยาเรียบร้อยแล้ว');
     }

}
