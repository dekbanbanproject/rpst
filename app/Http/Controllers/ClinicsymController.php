<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Clinic_per;
use App\Clinic_address;
use App\Clinic_drug;
use App\Clinic_sym;
use App\Clinic_sym_detail;
use App\Clinic_check;
use Image;
use PDF;

class ClinicsymController extends Controller
{  
    public function create()
    {
        $pre = DB::table('clinic_pre')->get();
        $sit = DB::table('clinic_sit')->get();

        return view('Mainpage.clinic_per_create',[
            'pres'=>$pre,
            'sits'=>$sit
        ]);
    }

   public function persave(Request $request)
    {
    //        $c= $request->PER_IMG;
    // dd($c);
        $add= new Clinic_per();
        $add->PER_CID = $request->PER_CID;
        $add->PER_PNAME = $request->PER_PNAME;
        $add->PER_FNAME = $request->PER_FNAME;
        $add->PER_LNAME = $request->PER_LNAME;
        $add->PER_TEL = $request->PER_TEL;
        $add->PER_AGE = $request->PER_AGE;       
        $add->SIT_ID = $request->SIT_ID;
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

    public function show($id)
    {
       //
    }

    public function edit($id)
    {
        $pre = DB::table('clinic_pre')->get();
        $per = Clinic_per::where('PER_ID','=',$id)->first(); 
        
        
        $addr = Clinic_address::where('ADDRESS_ID','=',$id)->first();  

        $sit = DB::table('clinic_sit')->get();

        return view('Mainpage.clinic_per_edit',[
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
    //===========================================================//
    public function sym_index()
    {
       $perinfo = DB::table('clinic_sym')->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')->get();

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

        return view('sym.sym_index',[
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,

            'perinfos'=>$perinfo
        ]);

    }
    public function sym_create(Request $request,$id)
    {
        // dd($id);
        $per = DB::table('clinic_per')->where('PER_ID','=',$id)->first();
        $pre = DB::table('clinic_pre')->get();
        $sit = DB::table('clinic_sit')->get();
        $drug = DB::table('clinic_drug')->get();
        // $perinfo = Clinic_per::leftjoin('clinic_sym','clinic_per.PER_ID','=','clinic_sym.PER_ID')->paginate(10);
        $symper = DB::table('clinic_sym')
        ->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')
        ->get();

        $unit = DB::table('clinic_unit')->get();
        $sym = DB::table('clinic_sym')->paginate(10);
        $sym_de = DB::table('clinic_sym_detail')->paginate(10);
        $search = '';
        $check = DB::table('clinic_check')->paginate(10);

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

        return view('sym.sym_create',[
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,

            'pers'=>$per,
            'pres'=>$pre,
            'sits'=>$sit,
            'drugs'=>$drug,
            'sympers'=>$symper,
            'search'=> $search,
            'syms'=>$sym,
            'sym_des'=>$sym_de,
            'checks'=>$check,
            'units'=>$unit,
        ]);
    }
    public function sym_historysearch(Request $request)
    {
        $datesearch = $request->SYM_DATE;
        $search = $request->get('search'); 
         
        $symper = DB::table('clinic_sym')
                 ->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID') 
                 ->where('SYM_DATE','like','%'.$datesearch.'%')    
                ->where(function($q) use ($search){                    
                    $q->where('PER_FNAME','like','%'.$search.'%'); 
                    $q->orwhere('PER_LNAME','like','%'.$search.'%');
                    $q->orwhere('PER_CID','like','%'.$search.'%');
                    $q->orwhere('PER_TEL','like','%'.$search.'%');
                })            
                ->orderBy('clinic_sym.PER_ID', 'desc')->get(); 
           
                $per = DB::table('clinic_per')->get();
                $pre = DB::table('clinic_pre')->get();
                $sit = DB::table('clinic_sit')->get();
                $drug = DB::table('clinic_drug')->get();
                $sym = DB::table('clinic_sym')->get();
                $sym_de = DB::table('clinic_sym_detail')->get();
                $check = DB::table('clinic_check')->get();

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

            return view('sym.sym_create',[
                'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
                'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,

                'pres'=>$pre,
                'sits'=>$sit,
                'drugs'=>$drug,
                // 'perinfos'=>$perinfo,
                'search'=> $search,
                'pers'=>$per,
                'syms'=>$sym,
                'checks'=>$check,
                'sym_des'=>$sym_de,
                'sympers'=>$symper 
            ]);
    }
    public function sym_save(Request $request)
    {
        $id_per = $request->PER_ID;

        $add= new Clinic_sym();
        $add->PER_ID = $id_per;
        $add->SYM_DATE = $request->SYM_DATE;
        $add->SYM_TIME = $request->SYM_TIME;
        $add->SYM_DRUG_ALLERGY = $request->SYM_DRUG_ALLERGY;
        $add->SYM_ROKE = $request->SYM_ROKE;
        $add->SYM_AKAN = $request->SYM_AKAN;
        $add->SYM_DIAG = $request->SYM_DIAG;       
        $add->save();       
        
        $id_sym =  Clinic_sym::max('SYM_ID');

        $addcheck = new Clinic_check();
            $addcheck->SYM_ID = $id_sym;
            $addcheck->CHECK_WEIGHT = $request->CHECK_WEIGHT;
            $addcheck->CHECK_HIGHT = $request->CHECK_HIGHT;
            $addcheck->CHECK_HT = $request->CHECK_HT;
            $addcheck->CHECK_BP = $request->CHECK_BP;
            $addcheck->CHECK_TEMP = $request->CHECK_TEMP;        
        $addcheck->save();      
     
       

            if($request->SYM_DETAIL_DRUGID != '' || $request->SYM_DETAIL_DRUGID != null){

            $SYM_DETAIL_DRUGID = $request->SYM_DETAIL_DRUGID;
            $SYM_DETAIL_DRUGQTY = $request->SYM_DETAIL_DRUGQTY;  
            $SYM_DETAIL_DRUGUNIT = $request->SYM_DETAIL_DRUGUNIT; 
            $SYM_DETAIL_DRUGPRICE = $request->SYM_DETAIL_DRUGPRICE;  
                
            $number =count($SYM_DETAIL_DRUGID);
            $count = 0;
            for($count = 0; $count< $number; $count++)
            { 

            $drugname = Clinic_drug::where('DRUG_ID','=',$SYM_DETAIL_DRUGID[$count])->first(); 
            
            $add_detail = new Clinic_sym_detail();
            $add_detail->SYM_ID = $id_sym;
            $add_detail->SYM_DETAIL_DRUGID = $SYM_DETAIL_DRUGID[$count];  
            $add_detail->SYM_DETAIL_DRUGNAME = $drugname->DRUG_NAME; 
            $add_detail->SYM_DETAIL_DRUGUNIT = $SYM_DETAIL_DRUGUNIT[$count];
            $add_detail->SYM_DETAIL_DRUGQTY = $SYM_DETAIL_DRUGQTY[$count];  
            $add_detail->SYM_DETAIL_DRUGPRICE = $SYM_DETAIL_DRUGPRICE[$count];
            $add_detail->SYM_DETAIL_TOTALPRICE = $SYM_DETAIL_DRUGQTY[$count] * $SYM_DETAIL_DRUGPRICE[$count];         
            $add_detail->save(); 

            // ******* ตัดสต็อค *********//

            $qty = $drugname->DRUG_SYM_PAY;
            $total = $drugname->DRUG_TOTAL;

            $updateqty = Clinic_drug::find($SYM_DETAIL_DRUGID[$count]);
            $updateqty->DRUG_SYM_PAY = $SYM_DETAIL_DRUGQTY[$count] + $qty;  
            $updateqty->DRUG_TOTAL = $total - $SYM_DETAIL_DRUGQTY[$count];            
            $updateqty->save();

        }
    }   
    $SUMTOTALPRICE = Clinic_sym_detail::where('SYM_ID','=',$id_sym)->sum('SYM_DETAIL_TOTALPRICE');

    $updatesum = Clinic_sym::find($id_sym );  
    $updatesum->SYM_SUMTOTALPRICE = $SUMTOTALPRICE; 
    $updatesum->save();

        return redirect()->route('Clinic.index');
    }
    public function sym_edit(Request $request,$id)
    {     
        $per = DB::table('clinic_per')->get();
        // $pre = DB::table('clinic_pre')->get();
        $sit = DB::table('clinic_sit')->get();
        $drug = DB::table('clinic_drug')->get();
       
       $perinfo = Clinic_per::leftjoin('clinic_sym','clinic_per.PER_ID','=','clinic_sym.PER_ID')->paginate(10);
    
        $sym = DB::table('clinic_sym')->where('SYM_ID','=',$id)->first();

        $check = DB::table('clinic_check')->where('SYM_ID','=',$id)->get();

        $sym_detail = DB::table('clinic_sym_detail')->where('SYM_ID','=',$id)->get();
       
        $symper = DB::table('clinic_sym')
        ->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')
        ->get();

        $search = '';

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
        
        return view('sym.sym_edit',[
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,

            'pers'=>$per,           
            'sits'=>$sit,
            'drugs'=>$drug,
            'perinfos'=>$perinfo,
            'search'=> $search,
            'syms'=>$sym,
            'sym_details'=>$sym_detail,
            'checks'=>$check,
            'sympers'=>$symper 
            
        ]);
    }
    public function sym_update(Request $request)
    {
        $id_per = $request->PER_ID;
            $id = $request->SYM_ID;
            $update = Clinic_sym::find($id);
            $update->PER_ID = $id_per;
            $update->SYM_DATE = $request->SYM_DATE;
            $update->SYM_TIME = $request->SYM_TIME;
            $update->SYM_DRUG_ALLERGY = $request->SYM_DRUG_ALLERGY;
            $update->SYM_ROKE = $request->SYM_ROKE;
            $update->SYM_AKAN = $request->SYM_AKAN;
            $update->SYM_DIAG = $request->SYM_DIAG;  
        $update->save();

        $SYM_ID = $id;
            Clinic_check::where('SYM_ID','=',$id)->delete(); 
        
            $add_check =new Clinic_check();
            $add_check->SYM_ID = $SYM_ID;
            $add_check->CHECK_WEIGHT = $request->CHECK_WEIGHT;
            $add_check->CHECK_HIGHT = $request->CHECK_HIGHT;
            $add_check->CHECK_HT = $request->CHECK_HT;
            $add_check->CHECK_BP = $request->CHECK_BP;
            $add_check->CHECK_TEMP = $request->CHECK_TEMP;  
        $add_check->save();
      

        Clinic_sym_detail::where('SYM_ID','=',$id)->delete(); 

        if($request->SYM_DETAIL_DRUGNAME != '' || $request->SYM_DETAIL_DRUGNAME != null){

        $SYM_DETAIL_DRUGNAME = $request->SYM_DETAIL_DRUGNAME;
        $SYM_DETAIL_DRUGQTY = $request->SYM_DETAIL_DRUGQTY;  
        $SYM_DETAIL_DRUGUNIT = $request->SYM_DETAIL_DRUGUNIT; 
        $SYM_DETAIL_DRUGPRICE = $request->SYM_DETAIL_DRUGPRICE;  
            
        $number =count($SYM_DETAIL_DRUGNAME);
        $count = 0;
        for($count = 0; $count< $number; $count++)
        { 

        $drugname = Clinic_drug::where('DRUG_ID','=',$SYM_DETAIL_DRUGNAME[$count])->first();         
        
            $add_detail =new Clinic_sym_detail();
            $add_detail->SYM_ID = $SYM_ID;
            $add_detail->SYM_DETAIL_DRUGNAME = $drugname->DRUG_NAME; 
            $add_detail->SYM_DETAIL_DRUGUNIT = $SYM_DETAIL_DRUGUNIT[$count];
            $add_detail->SYM_DETAIL_DRUGQTY = $SYM_DETAIL_DRUGQTY[$count];  
            $add_detail->SYM_DETAIL_DRUGPRICE = $SYM_DETAIL_DRUGPRICE[$count];
            $add_detail->SYM_DETAIL_TOTALPRICE = $SYM_DETAIL_DRUGQTY[$count] * $SYM_DETAIL_DRUGPRICE[$count];         
        $add_detail->save(); 
        }
    } 

        $SUMTOTALPRICE = Clinic_sym_detail::where('SYM_ID','=',$id)->sum('SYM_DETAIL_TOTALPRICE');

        $updatesum = Clinic_sym::find($id );  
        $updatesum->SYM_SUMTOTALPRICE = $SUMTOTALPRICE; 
        $updatesum->save();

        return redirect()->route('Clinic.sym_index');
    }

    public function sym_destroy($id)
    {
        Clinic_sym::destroy($id); 
        Clinic_sym_detail::where('SYM_ID',$id)->delete();
        Clinic_check::where('SYM_ID',$id)->delete();
        
        return redirect()->route('Clinic.sym_index');
    }
    public function symdelete(Request $request)
    {
        $id = $request->id;     

        Clinic_sym::destroy($id); 
        Clinic_sym_detail::where('SYM_ID',$id)->delete();
        Clinic_check::where('SYM_ID',$id)->delete();
        

        return redirect()->route('Clinic.sym_index');
    }




}


