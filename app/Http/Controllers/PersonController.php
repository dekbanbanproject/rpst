<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator ;
use Carbon\Carbon;
use App\Roomlist;
use App\Category;
use App\Orders;
use App\Orders_detail;
use App\Supplies;
use App\Person;
use App\Room;
use App\Carts;
use Image;
use PDF;
use \Milon\Barcode\DNS1D;
use App\Products_stock;
use SweetAlert;

date_default_timezone_set("Asia/Bangkok");

class PersonController extends Controller
{ 
    public function per_index(Request $request)
    {
        $per = DB::table('person')
        ->leftjoin('room','person.PERSON_ROOM_ID','=','room.ROOM_ID')
        ->orderBy('person.PERSON_ROOM_ID')
        ->get(); 
        
        $room = Room::get();
            return view('person.per_index',[
            'pers' => $per,
            'rooms'=> $room            
        ]);
    }
    public function per_edit(Request $request,$id)
    {    
        $per = DB::table('person')
        ->leftjoin('room','person.PERSON_ROOM_ID','=','room.ROOM_ID')        
        ->where('PERSON_ID','=',$id)
        ->first();             
        $room = Room::get();     
            return view('person.per_edit',[
                'pers' => $per,
                'rooms'=> $room 
            ]);
    }
    function switchperson(Request $request)
    {
        $id = $request->person;
        $activePRO = Person::find($id);
        $activePRO->PERSON_STATUS = $request->onoff;
        $activePRO->save();
    }

    public function per_save(Request $request)
    {      
        $add= new Person();
        $add->PERSON_CID = $request->PERSON_CID;  
        $add->PERSON_FNAME = $request->PERSON_FNAME; 
        $add->PERSON_LNAME = $request->PERSON_LNAME; 
        $add->PERSON_ADDRESS = $request->PERSON_ADDRESS;
        $add->PERSON_TEL = $request->PERSON_TEL;
        $add->PERSON_ROOM_ID = $request->PERSON_ROOM_ID;

        // if($request->hasFile('PERSON_IMG')){
        //     $IMG = $request->file('PERSON_IMG');            
        //     $filename = time() . '.' .$IMG->getClientOriginalExtension();
        //     Image::make($IMG)->resize(300,300)->save(public_path('/img/person/'.$filename));
        //     $add->PERSON_IMG = $filename;
        // } 
        if($request->hasFile('PERSON_IMG')){           
            $file = $request->file('PERSON_IMG');  
            $contents = $file->openFile()->fread($file->getSize());
            $add->PERSON_IMG = $contents;               
        } 
        $add->save();
  
        $per = DB::table('person')->get();

        
        return redirect()->route('Per.per_index',[
            'pers' => $per,
        ]);       
    }
   
    public function per_update(Request $request)
    { 
        $id = $request->PERSON_ID;
        $update = Person::find($id);
        $update->PERSON_CID = $request->PERSON_CID;  
        $update->PERSON_FNAME = $request->PERSON_FNAME; 
        $update->PERSON_LNAME = $request->PERSON_LNAME; 
        $update->PERSON_ADDRESS = $request->PERSON_ADDRESS;
        $update->PERSON_TEL = $request->PERSON_TEL;
        $update->PERSON_ROOM_ID = $request->PERSON_ROOM_ID;
        
        // if($request->hasFile('PERSON_IMG')){
        //     $IMG = $request->file('PERSON_IMG');            
        //     $filename = time() . '.' .$IMG->getClientOriginalExtension();
        //     Image::make($IMG)->resize(300,300)->save(public_path('/img/person/'.$filename));
        //     $update->PERSON_IMG = $filename;
        // }  
        if($request->hasFile('PERSON_IMG')){           
            $file = $request->file('PERSON_IMG');  
            $contents = $file->openFile()->fread($file->getSize());
            $update->PERSON_IMG = $contents;               
        }                  
        $update->save();
        $per = DB::table('person')->get();
        return redirect()->route('Per.per_index',[
            'pers' => $per,
        ]); 
    }
    public function destroy($id)
    {
        Person::destroy($id);
        return response()->json(['status','Delete Success']);
        // return redirect()->route('Per.per_index');
    }
    //===============room=================================

    public function room_index(Request $request)
    {
        $room = DB::table('room')
        ->leftjoin('person','room.ROOM_PERSON_ID','=','person.PERSON_ID')
        ->get();       
            return view('person.room',[
            'rooms' => $room,            
        ]);
    }
    public function room_save(Request $request)
    {      
        $add= new Room();
        $add->ROOM_NAME = $request->ROOM_NAME;         
        $add->save();  
        $room = DB::table('room')->get();  
        return redirect()->route('Per.room_index',[
            'rooms' => $room,
        ]);       
    }
    public function room_update(Request $request)
    { 
        $id = $request->ROOM_ID;
        $update = Room::find($id);
        $update->ROOM_NAME = $request->ROOM_NAME;        
        $update->save();
        $room = DB::table('room')->get();
        return redirect()->route('Per.room_index',[
            'rooms' => $room,
        ]); 
    }
    public function room_destroy($id)
    {
        Room::destroy($id);
        return response()->json(['status','Delete Success']);
        // return redirect()->route('Per.room_index');
    }

    //==============Room list ==================
   
     public function roomlist_index(Request $request)
     {
         $room = DB::table('room_list')->get();       
             return view('person.roomlist',[
             'rooms' => $room,            
         ]);
     }
     public function roomlist_save(Request $request)
     {      
         $add= new Roomlist();
         $add->LIST_NAME = $request->LIST_NAME;         
         $add->save();  
         $room = DB::table('room_list')->get();  
         return redirect()->route('Per.roomlist_index',[
             'rooms' => $room,
         ]);       
     }
     public function roomlist_update(Request $request)
     { 
         $id = $request->LIST_ID;
         $update = Roomlist::find($id);
         $update->LIST_NAME = $request->LIST_NAME;      
         $update->save();
         $room = DB::table('room_list')->get();
         return redirect()->route('Per.roomlist_index',[
             'rooms' => $room,
         ]); 
     }
     public function roomlist_destroy($id)
     {
         Roomlist::destroy($id);
         return response()->json(['status','Delete Success']);
        //  return redirect()->route('Per.roomlist_index');
     }
     public function dashbord_apartment(Request $request)
     {
    //    $noroom = Room::leftjoin('person','person.PERSON_ROOM_ID','=','room.ROOM_ID')
    //    ->paginate(18);
       $per = DB::table('person')->leftjoin('room','person.PERSON_ROOM_ID','=','room.ROOM_ID')->get();
   
       return view('dashbord_apartment',[
        //    'norooms' => $noroom,
           'pers' => $per
       ]);
     }
}
