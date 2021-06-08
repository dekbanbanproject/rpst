<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Clinic_per;
use App\Clinic_address;
use Image;
use PDF;

class ClinicsymmainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sym_indexmain()
    {
        $per = DB::table('clinic_per')->leftjoin('clinic_sit','clinic_per.sit_id','=','clinic_sit.sit_id')
        ->leftjoin('clinic_pre','clinic_per.PER_PNAME','=','clinic_pre.PRE_ID')
        ->leftjoin('clinic_address','clinic_per.PER_ID','=','clinic_address.PER_ID')->get();

        return view('sym.sym_index',[
            'pers'=>$per
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pre = DB::table('clinic_pre')->get();
        $sit = DB::table('clinic_sit')->get();

        return view('Mainpage.clinic_per_create',[
            'pres'=>$pre,
            'sits'=>$sit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clinic_per_destroy($id)
    {
        Clinic_per::destroy($id); 
        Clinic_address::where('PER_ID',$id)->delete();
        
        return redirect()->route('Clinic.index');
    }
   
}
