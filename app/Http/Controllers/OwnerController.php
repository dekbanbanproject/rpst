<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Roomlist;
use App\Room;
use App\Owner;
use App\Orders_detail;
use App\Supplies;
use App\Person;
use App\Products;
use App\Receive;
use App\Rent_Detail;
use App\Rent;
use Image;
use PDF;

date_default_timezone_set("Asia/Bangkok");

class OwnerController extends Controller
{     
  public function owner (Request $request)
  {
     
        $ooner = DB::table('owner')->get(); 

          return view('person.owner',[          
          'ooners' => $ooner, 
                  
      ]);
  }
  
public function save(Request $request)
    {   
        $add= new Owner();
        $add->OWNER_NAME = $request->OWNER_NAME;
        $add->OWNER_CID = $request->OWNER_CID;
        $add->OWNER_TEL = $request->OWNER_TEL;
        $add->OWNER_ADDRESS = $request->OWNER_ADDRESS;
       
        // if($request->hasFile('OWNER_LOGO')){
        //     $IMG = $request->file('OWNER_LOGO');            
        //     $filename = time() . '.' .$IMG->getClientOriginalExtension();
        //     Image::make($IMG)->resize(300,300)->save(public_path('/img/person/'.$filename));
        //     $add->OWNER_LOGO = $filename;
        // }  
        if($request->hasFile('OWNER_LOGO')){           
            $file = $request->file('OWNER_LOGO');  
            $contents = $file->openFile()->fread($file->getSize());
            $add->OWNER_LOGO = $contents;               
        }
        $add->save();

        return redirect()->route('OW.owner');
    }
    public function owneredit(Request $request,$id)
    {         
        $ooner =  Owner::where('OWNER_ID','=',$id)->first();
        return view('person.owneredit',[
            'ooners' => $ooner, 
                       
      ]);
    }
    public function update(Request $request)
    {
        $id = $request->OWNER_ID;
        $update = Owner::find($id);
        $update->OWNER_NAME = $request->OWNER_NAME;  
        $update->OWNER_CID = $request->OWNER_CID; 
        $update->OWNER_TEL = $request->OWNER_TEL; 
        $update->OWNER_ADDRESS = $request->OWNER_ADDRESS; 
        
        // if($request->hasFile('OWNER_LOGO')){
        //     $IMG = $request->file('OWNER_LOGO');            
        //     $filename = time() . '.' .$IMG->getClientOriginalExtension();
        //     Image::make($IMG)->resize(300,300)->save(public_path('img/person/'.$filename));
        //     $update->OWNER_LOGO = $filename;
        // }    
        if($request->hasFile('OWNER_LOGO')){           
            $file = $request->file('OWNER_LOGO');  
            $contents = $file->openFile()->fread($file->getSize());
            $update->OWNER_LOGO = $contents;               
        }
        
        $update->save();

       
        return redirect()->route('OW.owner'); 
    }
    public function destroy($id) 
    {
        Owner::destroy($id); 
            
        // return redirect()->route('OW.owner');
        return response()->json(['status','Delete Success']);
    }
}