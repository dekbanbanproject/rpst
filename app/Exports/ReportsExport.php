<?php

namespace App\Exports;

use App\Rent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReportsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rentmonth = DB::table('rent')                                    
                        ->orderBy('RENT_ID', 'desc')->get();
                return  $rentmonth;
        //  return Rent::all();
    }
}

// class ReportsExport implements FromView
// {
//     public function view(): View
//     {       
//         $rentmonth = DB::table('rent')
//                 ->leftjoin('person','rent.RENT_PERSON_ID','=','person.PERSON_ID')               
//                 ->orderBy('RENT_ID', 'desc')->get();
//         return view('report.export_excel',[
//             'rentmonths' => $rentmonth
//         ]);
//     }
// }