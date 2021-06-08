<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Clinic_per;
use App\Clinic_address;
use Image;
use PDF;

class ClinicperController extends Controller
{

    public function index()
    {
        $per = DB::table('clinic_per')
        ->leftjoin('clinic_sit','clinic_per.sit_id','=','clinic_sit.sit_id')
        ->leftjoin('clinic_per_status','clinic_per.STATUS','=','clinic_per_status.STATUS_NAME_EN')
        ->leftjoin('clinic_pre','clinic_per.PER_PNAME','=','clinic_pre.PRE_ID')        
        ->leftjoin('clinic_address','clinic_per.PER_ID','=','clinic_address.PER_ID')
        // ->leftjoin('clinic_sym','clinic_per.PER_ID','=','clinic_sym.PER_ID')
        // ->orderBy('clinic_per.PER_ID', 'desc')
        ->get();

        $perstatus = DB::table('clinic_per_status')->get();

        $maxnumber = Clinic_per::max('PER_QU');
        if($maxnumber != '' ||  $maxnumber != null){                    
         $refmax = Clinic_per::where('PER_QU','=',$maxnumber)->first();         
     
         if($refmax->PER_QU != '' ||  $refmax->PER_QU != null){
         $maxref = substr($refmax->PER_QU, -2)+1;
         }else{
         $maxref = 1;
         }        
         $ref = str_pad($maxref, 3, "0", STR_PAD_LEFT);               
         }else{
        $ref = '001';
         }  
         $refnumber = $ref;

         $symper = DB::table('clinic_sym')
         ->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')
         ->get();

         $search = '';
         $adminstatus = DB::table('users')->get();

         $product_a = DB::table('clinic_drug')->count();   
         $locate_a = DB::table('clinic_locate')->count();  
         $category_a = DB::table('clinic_category')->count();  
         $unit_a = DB::table('clinic_unit')->count();  
         $supplier_a = DB::table('clinic_supplier')->count(); 
         $sym_a = DB::table('clinic_sym')->count(); 
         $recieve_a = DB::table('clinic_recieve')->count();
         $pay_a = DB::table('clinic_pay')->count();
         $per_a = DB::table('clinic_per')->count();
         $user_a = DB::table('users')->count();

        return view('Mainpage.clinic_per',[
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,

            'pers'=>$per,
            'perstatuss'=>$perstatus,
            'refnumbers' => $refnumber,
            'sympers' => $symper,
            'search'=> $search,
            'adminstatuss'=> $adminstatus,
        ]);

    }
    public function per_search(Request $request)
    {
        
        $search = $request->get('search'); 
         
        $per = DB::table('clinic_per')->leftjoin('clinic_sit','clinic_per.sit_id','=','clinic_sit.sit_id')
                ->leftjoin('clinic_per_status','clinic_per.STATUS','=','clinic_per_status.STATUS_NAME_EN')
                ->leftjoin('clinic_pre','clinic_per.PER_PNAME','=','clinic_pre.PRE_ID')        
                ->leftjoin('clinic_address','clinic_per.PER_ID','=','clinic_address.PER_ID')
                ->leftjoin('clinic_sym','clinic_per.PER_ID','=','clinic_sym.PER_ID')
                ->where(function($q) use ($search){                    
                        $q->where('PER_FNAME','like','%'.$search.'%'); 
                        $q->orwhere('PER_LNAME','like','%'.$search.'%');
                        $q->orwhere('PER_CID','like','%'.$search.'%');
                        $q->orwhere('PER_TEL','like','%'.$search.'%');
                    })            
                ->get();


        $perstatus = DB::table('clinic_per_status')->get();

        $maxnumber = Clinic_per::max('PER_QU');
        if($maxnumber != '' ||  $maxnumber != null){                    
         $refmax = Clinic_per::where('PER_QU','=',$maxnumber)->first();         
     
         if($refmax->PER_QU != '' ||  $refmax->PER_QU != null){
         $maxref = substr($refmax->PER_QU, -2)+1;
         }else{
         $maxref = 1;
         }        
         $ref = str_pad($maxref, 3, "0", STR_PAD_LEFT);               
         }else{
        $ref = '001';
         }  
         $refnumber = $ref;

         $product_a = DB::table('clinic_drug')->count();   
         $locate_a = DB::table('clinic_locate')->count();  
         $category_a = DB::table('clinic_category')->count();  
         $unit_a = DB::table('clinic_unit')->count();  
         $supplier_a = DB::table('clinic_supplier')->count(); 
         $sym_a = DB::table('clinic_sym')->count(); 
         $recieve_a = DB::table('clinic_recieve')->count();
         $pay_a = DB::table('clinic_pay')->count();
         $per_a = DB::table('clinic_per')->count();
         $user_a = DB::table('users')->count();

        return view('Mainpage.clinic_per',[
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
            'pers'=>$per,
            'perstatuss'=>$perstatus,
            'refnumbers' => $refnumber,
            // 'sympers' => $symper,
            'search'=> $search,
                ]);

    }

    public function create(Request $request)
    {

        $pre = DB::table('clinic_pre')->get();
        $sit = DB::table('clinic_sit')->get();
        
        $maxnumber = Clinic_per::max('PER_QU');
        if($maxnumber != '' ||  $maxnumber != null){                    
         $refmax = Clinic_per::where('PER_QU','=',$maxnumber)->first();         
     
         if($refmax->PER_QU != '' ||  $refmax->PER_QU != null){
         $maxref = substr($refmax->PER_QU, -2)+1;
         }else{
         $maxref = 1;
         }        
         $ref = str_pad($maxref, 3, "0", STR_PAD_LEFT);               
         }else{
        $ref = '001';
         }  
         $refnumber = $ref;

         $product_a = DB::table('clinic_drug')->count();   
         $locate_a = DB::table('clinic_locate')->count();  
         $category_a = DB::table('clinic_category')->count();  
         $unit_a = DB::table('clinic_unit')->count();  
         $supplier_a = DB::table('clinic_supplier')->count(); 
         $sym_a = DB::table('clinic_sym')->count(); 
         $recieve_a = DB::table('clinic_recieve')->count();
         $pay_a = DB::table('clinic_pay')->count();
         $per_a = DB::table('clinic_per')->count();
         $user_a = DB::table('users')->count();

        return view('Mainpage.clinic_per_create',[
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
            'pres'=>$pre,
            'sits'=>$sit,
            'refnumbers' => $refnumber,
        ]);
    }
   
    public function persave(Request $request)
    {
      
        
        $add= new Clinic_per();
        $add->PER_CID = $request->PER_CID;
        $add->PER_PNAME = $request->PER_PNAME;
        $add->PER_FNAME = $request->PER_FNAME;
        $add->PER_LNAME = $request->PER_LNAME;
        $add->PER_TEL = $request->PER_TEL;       
        $add->SIT_ID = $request->SIT_ID;
        $add->PER_AGE = $request->PER_AGE; 
        $add->PER_QU = $request->PER_QU;
        $add->STATUS = 'UNPAID';
        if($request->hasFile('PER_IMG')){           
            $file = $request->file('PER_IMG');  
            $contents = $file->openFile()->fread($file->getSize());
            $add->PER_IMG = $contents;               
        }
        $add->save();

        $id_per =  Clinic_per::max('PER_ID');       
            $banno = $request->ADDRESS_BANNO;
            $moo = $request->ADDRESS_MOO;
            $ban = $request->ADDRESS_BAN;
            $tumbon = $request->ADDRESS_TUMBON;
            $ampher = $request->ADDRESS_AMPHER;
            $province = $request->ADDRESS_PROVINCE;
            $poscode = $request->ADDRESS_POSECODE;
                           
            $add_address = new Clinic_address();
            $add_address->PER_ID = $id_per;
            $add_address->ADDRESS_BANNO = $banno;
            $add_address->ADDRESS_MOO = $moo;
            $add_address->ADDRESS_BAN = $ban;
            $add_address->ADDRESS_TUMBON = $tumbon;
            $add_address->ADDRESS_AMPHER = $ampher;
            $add_address->ADDRESS_PROVINCE = $province;
            $add_address->ADDRESS_POSECODE = $poscode;
            $add_address->save();      

        return redirect()->route('Clinic.index');
    }

    public function updateperq(Request $request)
    {
        $id = $request->PER_ID;
       
        $update = Clinic_per::find($id);
        $update->PER_QU = $request->PER_QU;
        $update->STATUS = 'UNPAID';
        $update->save();

        return redirect()->route('Clinic.index');
    }


    public function updatestatus(Request $request)
    {
        $id = $request->PER_ID;
        $idq = $request->STATUS_NAME_EN;
       
        $update = Clinic_per::find($id);   
   
        if ($idq == 'OVERDUE') { 
            $update->STATUS = 'OVERDUE';
        }elseif($idq == 'UNPAID'){
            $update->STATUS = 'UNPAID';
        }else{
            $update->STATUS = 'PAID';
            $update->PER_QU = '';
        }
       
        $update->save();

        return redirect()->route('Clinic.index');
    }



    public function edit(Request $request,$id)
    {
        $pre = DB::table('clinic_pre')->get();

        $per = Clinic_per::where('PER_ID','=',$id)->first();              
        
        $addr = Clinic_address::where('PER_ID','=',$id)->first();  

        $sit = DB::table('clinic_sit')->get();

        $product_a = DB::table('clinic_drug')->count();   
         $locate_a = DB::table('clinic_locate')->count();  
         $category_a = DB::table('clinic_category')->count();  
         $unit_a = DB::table('clinic_unit')->count();  
         $supplier_a = DB::table('clinic_supplier')->count(); 
         $sym_a = DB::table('clinic_sym')->count(); 
         $recieve_a = DB::table('clinic_recieve')->count();
         $pay_a = DB::table('clinic_pay')->count();
         $per_a = DB::table('clinic_per')->count();
         $user_a = DB::table('users')->count();

        return view('Mainpage.clinic_per_edit',[
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
            'pres'=>$pre,
            'sits'=>$sit,
            'pers'=> $per,
            'addrs'=>$addr
        ]);
    }

    public function perupdate(Request $request)
    {
    //     $A = $request->PER_IMG;
    // dd($A);
        $id = $request->PER_ID;
        $update = Clinic_per::find($id);
        $update->PER_CID = $request->PER_CID;
        $update->PER_PNAME = $request->PER_PNAME;
        $update->PER_FNAME = $request->PER_FNAME;
        $update->PER_LNAME = $request->PER_LNAME;
        $update->PER_TEL = $request->PER_TEL;       
        $update->SIT_ID = $request->SIT_ID;
        $update->PER_AGE = $request->PER_AGE;
        if($request->hasFile('PER_IMG')){           
            $file = $request->file('PER_IMG');  
            $contents = $file->openFile()->fread($file->getSize());
            $update->PER_IMG = $contents;               
        } 
        $update->save();
      
        $id_add = $request->ADDRESS_ID;
        // dd($id);
        $update_address = Clinic_address::find($id_add);
        $update_address->PER_ID = $id;
        $update_address->ADDRESS_BANNO = $request->ADDRESS_BANNO;
        $update_address->ADDRESS_MOO = $request->ADDRESS_MOO;
        $update_address->ADDRESS_BAN = $request->ADDRESS_BAN;
        $update_address->ADDRESS_TUMBON = $request->ADDRESS_TUMBON;
        $update_address->ADDRESS_AMPHER = $request->ADDRESS_AMPHER;
        $update_address->ADDRESS_PROVINCE = $request->ADDRESS_PROVINCE;
        $update_address->ADDRESS_POSECODE = $request->ADDRESS_POSECODE;
        $update_address->save();      

        return redirect()->route('Clinic.index');
    }

    public function clinic_per_destroy($id)
    {
        Clinic_per::destroy($id); 
        Clinic_address::where('PER_ID',$id)->delete();
        
        return redirect()->route('Clinic.index');
    }
    public function clinicper_delete(Request $request)
    {
        $del = Clinic_per::find($request->id);
        $del->delete();
               
        $delad = Clinic_address::find($request->id);
        $delad->delete();

        return redirect()->route('Clinic.index');
    }
   
}
