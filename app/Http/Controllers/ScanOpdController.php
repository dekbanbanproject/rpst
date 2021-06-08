<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use App\Drugitems;
use App\Opitemrece;
use App\Clinic_drug;
use Image;
use PDF;
use Auth;
use Validator;
use App\Models\Person;
use App\Models\Tb_opd;
use App\Models\ountry;

class ScanOpdController extends Controller
{
    public function opd(Request $request)
    {
        if (session()->has('LogedUser')) {
            $data = User::where('id','=',session('LogedUser'))->first();
         }
        $year = date('Y');

         $idstore = $data->store_id;
         $iduser = $data->id;

         $item = Tb_opd::orderBy('datescan','DESC')
        //  $item = Tb_opd::leftjoin('tb_opd_doctype','tb_opd.doctype_id','=','tb_opd_doctype.doctype_id')->orderBy('datescan','DESC')
        //  ->get()
        //  ->limit('20')
         ->get();
        //  ->paginate('30');

         return view('scanopd/opd_index',[
            'data'=>$data,
            'items'=>$item,
            ]);
    }

    public function opd_search(Request $request){
        
        function DateThai($strDate)
            {
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));

            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
            }
            function Removeformate($strDate)
            {
            $strYear = date("Y",strtotime($strDate));
            $strMonth= date("m",strtotime($strDate));
            $strDay= date("d",strtotime($strDate));  
            return $strDay."/".$strMonth."/".$strYear;
            }
            date_default_timezone_set("Asia/Bangkok");
            $date = date('Y-m-d');

        if($request->ajax()) {          
            $data = Tb_opd::where('hn', 'LIKE', $request->hn.'%')           
                ->get();
            $output = '';           
            if (count($data)>0) {              
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';              
                foreach ($data as $row){                   
                    $output .= '<li class="list-group-item">'.$row->hn. '  ==>  คุณ ' .$row->firstname. '  ' .$row->lastname. '  ==> วันที่สแกน ' .DateThai($row->datescan). '</li>';
                }              
                $output .= '</ul>';
            }
            else {             
                $output .= '<li class="list-group-item">'.'ไม่มีข้อมูล'.'</li>';
            }           
            return $output;
        }
    }
  

    function index()
    {
     return view('live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = Tb_opd::where('hn', 'like', '%'.$query.'%')
         ->orWhere('firstname', 'like', '%'.$query.'%')
         ->orWhere('lastname', 'like', '%'.$query.'%')     
        //  ->orWhere('datescan', 'like', '%'.$query.'%')    
         ->orderBy('datescan', 'desc')
         ->get();
         
      }
      else
      {
       $data = Tb_opd::orderBy('datescan', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->hn.'</td>
         <td>'.$row->firstname.'</td>
         <td>'.$row->lastname.'</td>
         <td>'.$row->datescan.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }


}


 // $opdcount = DB::connection('mysql3')->table('tb_opd')->count();
        // $ipdcount = DB::connection('mysql3')->table('tb_ipd')->count();
    
        // $opdcountL = DB::connection('mysql3')->table('tb_opd')->where('datescan','=',$day)->count();
        // $ipdcountL = DB::connection('mysql3')->table('tb_ipd')->where('datescan','=',$day)->count();
    
        // $opd123 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-01%')->sum('pages');
        // $opd223 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-02%')->sum('pages');
        // $opd323 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-03%')->sum('pages');
        // $opd423 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-04%')->sum('pages');
        // $opd523 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-05%')->sum('pages');
        // $opd623 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-06%')->sum('pages');
        // $opd723 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-07%')->sum('pages');
        // $opd823 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-08%')->sum('pages');
        // $opd923 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-09%')->sum('pages');
        // $opd1023 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-10%')->sum('pages');
        // $opd1123 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-11%')->sum('pages');
        // $opd1223 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year23.'-12%')->sum('pages');
    
     
    
        // $opd122 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-01%')->sum('pages');
        // $opd222 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-02%')->sum('pages');
        // $opd322 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-03%')->sum('pages');
        // $opd422 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-04%')->sum('pages');
        // $opd522 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-05%')->sum('pages');
        // $opd622 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-06%')->sum('pages');
        // $opd722 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-07%')->sum('pages');
        // $opd822 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-08%')->sum('pages');
        // $opd922 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-09%')->sum('pages');
        // $opd1022 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-10%')->sum('pages');
        // $opd1122 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-11%')->sum('pages');
        // $opd1222 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year22.'-12%')->sum('pages');
    
        // $opd1 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-01%')->sum('pages');
        // $opd2 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-02%')->sum('pages');
        // $opd3 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-03%')->sum('pages');
        // $opd4 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-04%')->sum('pages');
        // $opd5 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-05%')->sum('pages');
        // $opd6 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-06%')->sum('pages');
        // $opd7 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-07%')->sum('pages');
        // $opd8 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-08%')->sum('pages');
        // $opd9 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-09%')->sum('pages');
        // $opd10 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-10%')->sum('pages');
        // $opd11 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-11%')->sum('pages');
        // $opd12 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year21.'-12%')->sum('pages');
    
        // $opd11 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-01%')->sum('pages');
        // $opd21 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-02%')->sum('pages');
        // $opd31 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-03%')->sum('pages');
        // $opd41 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-04%')->sum('pages');
        // $opd51 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-05%')->sum('pages');
        // $opd61 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-06%')->sum('pages');
        // $opd71 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-07%')->sum('pages');
        // $opd81 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-08%')->sum('pages');
        // $opd91 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-09%')->sum('pages');
        // $opd101 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-10%')->sum('pages');
        // $opd111 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-11%')->sum('pages');
        // $opd121 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year20.'-12%')->sum('pages');
    
        // $opd12 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-01%')->sum('pages');
        // $opd22 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-02%')->sum('pages');
        // $opd32 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-03%')->sum('pages');
        // $opd42 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-04%')->sum('pages');
        // $opd52 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-05%')->sum('pages');
        // $opd62 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-06%')->sum('pages');
        // $opd72 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-07%')->sum('pages');
        // $opd82 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-08%')->sum('pages');
        // $opd92 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-09%')->sum('pages');
        // $opd102 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-10%')->sum('pages');
        // $opd112 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-11%')->sum('pages');
        // $opd122 = DB::connection('mysql3')->table('tb_opd')->where('datescan','like',$year19.'-12%')->sum('pages');

