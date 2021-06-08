<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Roomlist;
use App\Room;
use App\Orders;
use App\Orders_detail;
use App\Supplies;
use App\Person;
use App\Products;
use App\Receive;
use App\Rent_Detail;
use App\Rent;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;
use Image;
use PDF;
// use App\Imports\PostImport;
use App\Exports\ReportrentexportExport;

date_default_timezone_set("Asia/Bangkok");

class RentController extends Controller
{   
    public function reportrentexport(Request $res)
    {
       return Excel::download(new ReportrentexportExport,'rent.xlsx');
       
    }
    public function report_rentmonth_excel(Request $request)
    {

      return Excel::download(new ReportsExport, 'reports.xlsx');

       // return (new FastExcel( Rent::all() ))->download('file.xlsx');
    }  

  public function rent(Request $request)
  {
      $rent = DB::table('rent')
            ->leftjoin('person','rent.RENT_PERSON_ID','=','person.PERSON_ID')
            ->leftjoin('room','rent.RENT_ROOM_NO','=','room.ROOM_ID')
            ->leftjoin('pay_status','rent.RENT_PAY_STATUS','=','pay_status.PAYSTATUS_NAME_EN')
            ->get();   
 
            $per = DB::table('person')
            ->leftjoin('rent','person.PERSON_ID','=','rent.RENT_PERSON_ID')  
            ->join('pay_status','rent.RENT_PAY_STATUS','=','pay_status.PAYSTATUS_NAME_EN') 
            // ->where('person.PERSON_ID','=',$id) 
            ->get(); 
            $paystatus = DB::table('pay_status')->get(); 
          return view('person.rent',[
          'pers' => $per, 
          'rents' => $rent, 
          'paystatuss' => $paystatus, 
                  
      ]);
  }
  public function add(Request $request,$id)
  {

    $per =  Person::where('PERSON_ID','=',$id)->get();

    $rent = DB::table('rent')->get();   
    $personuse = DB::table('person')
    ->leftjoin('room','person.PERSON_ROOM_ID','room.ROOM_ID')
    // ->leftjoin('rent','person.PERSON_ID','rent.RENT_PERSON_ID')
    ->get(); 
    $roomlist = DB::table('room_list')->get();  
    
    $m_budget = date("m");
    if($m_budget>9){
    $yearbudget = date("Y")+544;
    }else{
    $yearbudget = date("Y")+543;
    }
    $year = date('Y');

    $maxnumber = DB::table('rent')->where('RENT_YEAR','=',$yearbudget)->max('RENT_ID');
    if($maxnumber != '' ||  $maxnumber != null){                    
    $refmax = DB::table('rent')->where('RENT_ID','=',$maxnumber)->first();         

    if($refmax->RENT_NO != '' ||  $refmax->RENT_NO != null){
    $maxref = substr($refmax->RENT_NO, -4)+1;
    }else{
    $maxref = 1;
    }        
    $ref = str_pad($maxref, 5, "0", STR_PAD_LEFT);               
    }else{
    $ref = '00001';
    }
    $ye = date('Y')+543;
    $y = substr($ye, -2);     

    $refnumber = 'RENT'.'-'.$y.'-'.$ref;
    
    $paystattus = DB::table('rent')->get();

          return view('person.rent_add',[
            'personuses' => $personuse, 
            'rents' => $rent,  
            'roomlists' => $roomlist, 
            'pers' => $per,
            'refnumbers' => $refnumber,
            'paystattuss' => $paystattus,
      ]);
  }
public function save(Request $request)
    {    
        // $infoperson =  Person::where('PERSON_ID','=',$iduser)->first();
        $PERSON_ID = $request->RENT_PERSON_ID;
        $ROOM_NO =$request->PERSON_ROOM_ID;
        $add= new Rent();
        $add->RENT_NO = $request->RENT_NO;
        $add->RENT_DATE = $request->RENT_DATE;
        $add->RENT_DUE_DATE = $request->RENT_DUE_DATE;
        $add->RENT_YEAR = $request->RENT_YEAR;
        $add->RENT_PERSON_ID = $PERSON_ID;
        $add->RENT_ROOM_NO = $ROOM_NO;
        $add->RENT_PAY_STATUS = 'UNPAID';
        $add->save();

        $id_rent =  Rent::max('RENT_ID');

        if($request->RENT_DETAIL_LIST != '' || $request->RENT_DETAIL_LIST != null){

        $RENT_DETAIL_LIST = $request->RENT_DETAIL_LIST;
        $RENT_DETAIL_METER_1 = $request->RENT_DETAIL_METER_1;  
        $RENT_DETAIL_METER_2 = $request->RENT_DETAIL_METER_2; 
        $RENT_DETAIL_QTY = $request->RENT_DETAIL_QTY;  
        $RENT_DETAIL_PRICE = $request->RENT_DETAIL_PRICE;
      
        $number =count($RENT_DETAIL_LIST);
        $count = 0;
        for($count = 0; $count< $number; $count++)
        { 

        $listname = Roomlist::where('LIST_ID','=',$RENT_DETAIL_LIST[$count])->first(); 
        
        $add_detail = new Rent_Detail();
        $add_detail->RENT_ID = $id_rent;        
        $add_detail->RENT_DETAIL_LIST = $listname->LIST_NAME;     
        $add_detail->RENT_DETAIL_METER_1 = $RENT_DETAIL_METER_1[$count]; 
        $add_detail->RENT_DETAIL_METER_2 = $RENT_DETAIL_METER_2[$count];  
        $add_detail->RENT_DETAIL_QTY = $RENT_DETAIL_QTY[$count]; 
        $add_detail->RENT_DETAIL_PRICE = $RENT_DETAIL_PRICE[$count];
        $add_detail->RENT_DETAIL_TOTAL = $RENT_DETAIL_QTY[$count] * $RENT_DETAIL_PRICE[$count];         
        $add_detail->save(); 
        }
    }   
    $RENT_TOTAL_PRICE = Rent_Detail::where('RENT_ID','=',$id_rent)->sum('RENT_DETAIL_TOTAL');

    $updatesum = Rent::find($id_rent );  
    $updatesum->RENT_TOTAL_PRICE = $RENT_TOTAL_PRICE; 
    $updatesum->save();

        return redirect()->route('Re.rent');
    }
    public function rent_detail_destroy($id) // Delete 1 table  Multirecord
    {      
        Rent_Detail::destroy($id);
      
        return redirect()->route('Re.rent');
    }
    public function rent_destroy($id) // Delete 2 table  Multirecord
    {
        Rent::destroy($id);
 
        Rent_Detail::where('RENT_ID',$id)->delete();
        return response()->json(['status','Delete Success']);
        // return redirect()->route('Re.rent');
    }
    public function rent_detail(Request $request,$id)
    {
        $rent_de = DB::table('rent')
        ->leftjoin('rent_detail','rent.RENT_ID','=','rent_detail.RENT_ID')
        ->leftjoin('person','rent.RENT_PERSON_ID','=','person.PERSON_ID')
        ->leftjoin('room','rent.RENT_ROOM_NO','=','room.ROOM_ID')
        ->where('rent_detail.RENT_ID','=',$id)
        ->get();   
   


      return view('person.rent_detail',[     
      'rent_des' => $rent_de,  
              
  ]);
    }

    public function rent_pdf(Request $request,$id)
    {
        $rent = DB::table('person')
                ->leftjoin('rent','person.PERSON_ID','rent.RENT_PERSON_ID')
                ->leftjoin('rent_detail','rent.RENT_ID','rent_detail.RENT_ID')                
                ->where('rent_detail.RENT_ID','=',$id)
                ->get();       
    
        $hrent = DB::table('rent')
        ->leftjoin('room','rent.RENT_ROOM_NO','room.ROOM_ID')
        ->leftjoin('person','rent.RENT_PERSON_ID','person.PERSON_ID')
       ->where('RENT_ID','=',$id)
       ->orderBy('RENT_DATE')
        ->get(); 
        $owner = DB::table('owner')->get();
        $pdf = PDF::loadView('person.rent_pdf',[
            'rents' => $rent, 
            'hrents' => $hrent,  
            'owners' => $owner,         
            ]);
        return @$pdf->stream();   
    }

    public function report_rentmonth(Request $request)
    {
        $rentmonth = DB::table('rent')
              ->leftjoin('person','rent.RENT_PERSON_ID','=','person.PERSON_ID')
              ->leftjoin('room','rent.RENT_ROOM_NO','=','room.ROOM_ID')         
              ->get();  
        
        $total = DB::table('rent')->sum('RENT_TOTAL_PRICE'); 
       
        $budget = DB::table('budget_year')->get();

    
            return view('report.report_rentmonth',[
        
            'rentmonths' => $rentmonth,  
            'budgets' => $budget,  
            'totals' => $total, 
               
        ]);
    }

    public function report_rentmonth_pdf(Request $request)
    {
        $datebigin = $request->DATE_BIGIN;
        $dateend = $request->DATE_END;
       
        $rentmonth = DB::table('rent')
                ->leftjoin('person','rent.RENT_PERSON_ID','=','person.PERSON_ID')  
                ->WhereBetween('RENT_DATE',[$datebigin,$dateend]) 
                ->orderBy('RENT_ID', 'desc')->get();
        
        $total = DB::table('rent')->WhereBetween('RENT_DATE',[$datebigin,$dateend])->sum('RENT_TOTAL_PRICE');        
    
        $pdf = PDF::loadView('report.report_rentmonth_pdf',[
            'rentmonths' => $rentmonth,             
            'totals' => $total,         
            ]);
        return @$pdf->stream();   
    }


    public function report_rentmonthsearch(Request $request)
    {
        $datebigin = $request->DATE_BIGIN;
        $dateend = $request->DATE_END;
       
        $rentmonth = DB::table('rent')
                ->leftjoin('person','rent.RENT_PERSON_ID','=','person.PERSON_ID')  
                ->WhereBetween('RENT_DATE',[$datebigin,$dateend]) 
                ->orderBy('RENT_ID', 'desc')->get();

        $total = DB::table('rent')->WhereBetween('RENT_DATE',[$datebigin,$dateend])->sum('RENT_TOTAL_PRICE');   

                return view('report.report_rentmonth',[
                    'rentmonths' =>$rentmonth,
                    'totals' => $total,               
                ]);
    }

   



    public function history(Request $request,$id)
    {      
        $per = DB::table('person')
            ->leftjoin('rent','person.PERSON_ID','=','rent.RENT_PERSON_ID') 
            // ->leftjoin('rent_detail','rent.RENT_ID','=','rent_detail.RENT_ID')
            ->leftjoin('room','person.PERSON_ROOM_ID','=','room.ROOM_ID')   
            ->leftjoin('pay_status','rent.RENT_PAY_STATUS','=','pay_status.PAYSTATUS_NAME_EN')  
            ->where('rent.RENT_PERSON_ID','=',$id)
            ->get();
            
        $rent_de = DB::table('rent')
            ->leftjoin('rent_detail','rent.RENT_ID','=','rent_detail.RENT_ID')
            ->leftjoin('person','rent.RENT_PERSON_ID','=','person.PERSON_ID')
            ->leftjoin('room','rent.RENT_ROOM_NO','=','room.ROOM_ID')
           
            ->where('rent.RENT_PERSON_ID','=',$id)
            ->get();   
       
       
        return view('person.history',[
            'pers' => $per,  
            'rent_des' => $rent_de,              
        ]);
    }
    public function history_destroy($id)
    {
        Rent::destroy($id);

        Rent_Detail::where('RENT_ID',$id)->delete();

        
        $per = DB::table('person')
        ->leftjoin('rent','person.PERSON_ID','=','rent.RENT_PERSON_ID') 
        ->leftjoin('room','person.PERSON_ROOM_ID','=','room.ROOM_ID')     
        ->where('PERSON_ID','=',$id)
        ->get();
        return view('person.history',[
            'pers' => $per,                    
        ]);

        // return redirect()->route('Re.history');
    }
    public function update_status(Request $request)
    {
        $id = $request->RENT_ID;
        $update = Rent::find($id);
        $update->RENT_PAY_STATUS = $request->PAYSTATUS_NAME_EN;      
        $update->save();

        $room = DB::table('room_list')->get();

        return redirect()->route('Re.rent',[
            'rooms' => $room,
        ]); 
    }
}