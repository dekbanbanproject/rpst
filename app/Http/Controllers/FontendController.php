<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Clinic_sym;
use App\Room;
use App\Orders;
use App\Orders_detail;
use App\Supplies;
use App\Person;
use App\Products;
use App\Receive;
use App\Rent_Detail;
use App\Rent;
use App\Contact;
use Image;
use PDF;

date_default_timezone_set("Asia/Bangkok");

class FontendController extends Controller
{
//==========================================================//
  public function welcome(Request $request)
    {
        $sym = DB::table('clinic_sym')
            ->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')
          ->get();
      $total = DB::table('clinic_sym')->sum('SYM_SUMTOTALPRICE');
      $search ='';

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

        $cat_1 = DB::table('clinic_category')->where('CAT_ID','=',1)->count();
            $cat_2 = DB::table('clinic_category')->where('CAT_ID','=',2)->count();
            $cat_3 = DB::table('clinic_category')->where('CAT_ID','=',3)->count();
            $cat_4 = DB::table('clinic_category')->where('CAT_ID','=',4)->count();
            $cat_5 = DB::table('clinic_category')->where('CAT_ID','=',5)->count();
            $cat_6 = DB::table('clinic_category')->where('CAT_ID','=',6)->count();
            $cat_7 = DB::table('clinic_category')->where('CAT_ID','=',7)->count();
            $cat_8 = DB::table('clinic_category')->where('CAT_ID','=',8)->count();
            $cat_9 = DB::table('clinic_category')->where('CAT_ID','=',9)->count();
            $cat_10 = DB::table('clinic_category')->where('CAT_ID','=',10)->count();
            $cat_11 = DB::table('clinic_category')->where('CAT_ID','=',11)->count();
            $cat_12 = DB::table('clinic_category')->where('CAT_ID','=',12)->count();
            $cat_13 = DB::table('clinic_category')->where('CAT_ID','=',13)->count();
            $cat_14 = DB::table('clinic_category')->where('CAT_ID','=',14)->count();
            $cat_15 = DB::table('clinic_category')->where('CAT_ID','=',15)->count();
        $cat_16 = DB::table('clinic_category')->where('CAT_ID','=',16)->count();

        $cat_piechart = DB::table('clinic_drug')
                        ->select(DB::raw('count(*) as cat_count,CAT_NAME'),'CAT_NAME')
                        ->leftJoin('clinic_category','clinic_drug.CAT_ID','=','clinic_category.CAT_ID')
                        // ->where('created_at','like',$year.'%')
                        ->groupBy('CAT_NAME')
                        ->get();

        $sup_rec1 = DB::table('clinic_supplier')->where('SUP_ID','=',1)->count();
            $sup_rec2 = DB::table('clinic_supplier')->where('SUP_ID','=',2)->count();
            $sup_rec3 = DB::table('clinic_supplier')->where('SUP_ID','=',3)->count();
            $sup_rec4 = DB::table('clinic_supplier')->where('SUP_ID','=',4)->count();
            $sup_rec5 = DB::table('clinic_supplier')->where('SUP_ID','=',5)->count();
            $sup_rec6 = DB::table('clinic_supplier')->where('SUP_ID','=',6)->count();
            $sup_rec7 = DB::table('clinic_supplier')->where('SUP_ID','=',7)->count();
            $sup_rec8 = DB::table('clinic_supplier')->where('SUP_ID','=',8)->count();
            $sup_rec9 = DB::table('clinic_supplier')->where('SUP_ID','=',9)->count();
            $sup_rec10 = DB::table('clinic_supplier')->where('SUP_ID','=',10)->count();
            $sup_rec11 = DB::table('clinic_supplier')->where('SUP_ID','=',11)->count();
            $sup_rec12 = DB::table('clinic_supplier')->where('SUP_ID','=',12)->count();
            $sup_rec13 = DB::table('clinic_supplier')->where('SUP_ID','=',13)->count();
            $sup_rec14 = DB::table('clinic_supplier')->where('SUP_ID','=',14)->count();
            $sup_rec15 = DB::table('clinic_supplier')->where('SUP_ID','=',15)->count();
        $sup_piechart = DB::table('clinic_recieve')
                ->select(DB::raw('count(*) as sup_count,SUP_NAME'),'SUP_NAME')
                ->leftJoin('clinic_supplier','clinic_recieve.REC_SUP','=','clinic_supplier.SUP_ID')
                // ->where('created_at','like',$year.'%')
                ->groupBy('SUP_NAME')
                ->get();

      $drug_piechart = DB::table('clinic_pay_store')
                ->select(DB::raw('count(*) as drugs_count,PAYDETAIL_DRUG_NAME'),'PAYDETAIL_DRUG_NAME')
                ->orderBy('PAYDETAIL_DRUG_QTY','asc')
                ->groupBy('PAYDETAIL_DRUG_NAME')
                ->get();

                $p_c1 = DB::table('clinic_drug')->where('DRUG_ID','=',1)->count();
                    $p_c2 = DB::table('clinic_drug')->where('DRUG_ID','=',2)->count();
                    $p_c3 = DB::table('clinic_drug')->where('DRUG_ID','=',3)->count();
                    $p_c4 = DB::table('clinic_drug')->where('DRUG_ID','=',4)->count();
                    $p_c5 = DB::table('clinic_drug')->where('DRUG_ID','=',5)->count();
                    $p_c6 = DB::table('clinic_drug')->where('DRUG_ID','=',6)->count();
                    $p_c7 = DB::table('clinic_drug')->where('DRUG_ID','=',7)->count();
                    $p_c8 = DB::table('clinic_drug')->where('DRUG_ID','=',8)->count();
                    $p_c9 = DB::table('clinic_drug')->where('DRUG_ID','=',9)->count();
                    $p_c10 = DB::table('clinic_drug')->where('DRUG_ID','=',10)->count();
                    $p_c11 = DB::table('clinic_drug')->where('DRUG_ID','=',11)->count();
                    $p_c12 = DB::table('clinic_drug')->where('DRUG_ID','=',12)->count();
                    $p_c13 = DB::table('clinic_drug')->where('DRUG_ID','=',13)->count();
                    $p_c14 = DB::table('clinic_drug')->where('DRUG_ID','=',14)->count();
                    $p_c15 = DB::table('clinic_drug')->where('DRUG_ID','=',15)->count();
                    $p_c16 = DB::table('clinic_drug')->where('DRUG_ID','=',16)->count();
                    $p_c17 = DB::table('clinic_drug')->where('DRUG_ID','=',17)->count();
                    $p_c18 = DB::table('clinic_drug')->where('DRUG_ID','=',18)->count();
                    $p_c19 = DB::table('clinic_drug')->where('DRUG_ID','=',19)->count();
                    $p_c20 = DB::table('clinic_drug')->where('DRUG_ID','=',20)->count();
                    $p_c21 = DB::table('clinic_drug')->where('DRUG_ID','=',21)->count();
                    $p_c22 = DB::table('clinic_drug')->where('DRUG_ID','=',22)->count();
                    $p_c23 = DB::table('clinic_drug')->where('DRUG_ID','=',23)->count();
                    $p_c24 = DB::table('clinic_drug')->where('DRUG_ID','=',24)->count();
                $p_c25 = DB::table('clinic_drug')->where('DRUG_ID','=',25)->count();

                $chart_drug = DB::table('clinic_drug')
                        ->select(DB::raw('count(*) as drug_count,DRUG_NAME'),'DRUG_NAME')

                        ->groupBy('DRUG_NAME')
                        ->get();
    $dt = new Carbon();
    $mo = $dt->year;
    $today = date('Y-m-d');
    // $mounth = date('y-M-d');

    $sss_in = '45';
    $UC = '89';
    $L2 = 'L2';
    // $data_L = DB::connection('mysql2')->table('ovst')->where('pttype','=',$L & $L2 )->where('vstdate',$today)->count();
    $per_count = DB::connection('mysql2')->table('ovst')->where('vstdate',$today)->count();
    $per_sum = DB::connection('mysql2')->table('ovst')->leftJoin('opitemrece','ovst.vn','=','opitemrece.vn')->where('ovst.vstdate',$today)->sum('sum_price');
    $per_480 = DB::connection('mysql2')->table('ovst')->leftJoin('vn_stat','ovst.vn','=','vn_stat.vn')->where('ovst.vstdate',$today)->where('pdx','=','Z480')->count();
    $per_sss = DB::connection('mysql2')->table('ovst')->where('pttype','=',$sss_in)->where('vstdate',$today)->count();

    $data_L = DB::connection('mysql2')->table('ovst')
    ->orWhere(function($query) {
        $query->where('pttype', '=', 'L1')
               ->orwhere('pttype', '=', 'L2')
               ->orwhere('pttype', '=', 'L3')
               ->orwhere('pttype', '=', 'L4')
               ->orwhere('pttype', '=', 'L5')
               ->orwhere('pttype', '=', 'L6');
    })
     ->where('vstdate',$today)
    ->count();
    $data_UC = DB::connection('mysql2')->table('ovst')->where('pttype','=',$UC)->where('vstdate',$today)->count();
    $data_den = DB::connection('mysql2')->table('ovst')->where('spclty','=','11')->where('vstdate',$today)->count();
    $data_narmal = DB::connection('mysql2')->table('ovst')->where('spclty','=','01')->where('vstdate',$today)->count();
    $data_rung = DB::connection('mysql2')->table('ovst')->where('spclty','=','03')->where('vstdate',$today)->count();
    $data_marda = DB::connection('mysql2')->table('ovst')->where('spclty','=','12')->where('vstdate',$today)->count();
    $data_dekdee = DB::connection('mysql2')->table('ovst')->where('spclty','=','13')->where('vstdate',$today)->count();
    $data_phan = DB::connection('mysql2')->table('ovst')->where('spclty','=','14')->where('vstdate',$today)->count();
    $data_jit = DB::connection('mysql2')->table('ovst')->where('spclty','=','09')->where('vstdate',$today)->count();
    $data_orther = DB::connection('mysql2')->table('ovst')->where('spclty','=','15')->where('vstdate',$today)->count();

    $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

    $per_co1 = Person::where('house_regist_type_id','=','1')->count();
    $per_co2 = Person::where('house_regist_type_id','=','2')->count();
    $per_co3 = Person::where('house_regist_type_id','=','3')->count();
    $per_co4 = Person::where('house_regist_type_id','=','4')->count();

      return view('Mainpage.mainpage_clinic_font',[
            'data_hos'=>$data_hos,'per_co1'=>$per_co1, 'per_co2'=>$per_co2, 'per_co3'=>$per_co3, 'per_co4'=>$per_co4,
            'per_count'=>$per_count, 'per_sum'=>$per_sum,'per_480'=>$per_480,'per_sss'=>$per_sss,'data_L'=>$data_L,'data_UC'=>$data_UC,'data_den'=>$data_den,'data_narmal'=>$data_narmal,
            'data_rung'=>$data_rung, 'data_marda'=>$data_marda, 'data_dekdee'=>$data_dekdee, 'data_phan'=>$data_phan,'data_jit'=>$data_jit,'data_orther'=>$data_orther,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,
            'chart_drugs' => $chart_drug,
            'p_c1' => $p_c1,'p_c2' => $p_c2,'p_c3' => $p_c3,'p_c4' => $p_c4,'p_c5' => $p_c5,'p_c6' => $p_c6,'p_c7' => $p_c7,'p_c8' => $p_c8,'p_c9' => $p_c9,'p_c10' => $p_c10, 'p_c11' => $p_c11, 'p_c12' => $p_c12,
            'p_c13' => $p_c13,'p_c14' => $p_c14,'p_c15' => $p_c15,'p_c16' => $p_c16,'p_c17' => $p_c17,'p_c18' => $p_c18,'p_c19' => $p_c19,'p_c20' => $p_c20,'p_c21' => $p_c21,'p_c22' => $p_c22, 'p_c23' => $p_c23, 'p_c24' => $p_c24,
            'p_c25' => $p_c25,
            'syms'=>$sym,
            'totals'=>$total,
            'search'=> $search,
            'cat_1' => $cat_1,
            'drugpiechart' => $drug_piechart,
            'catpiechart' => $cat_piechart,
            'sup_piecharts' => $sup_piechart,
        ]);
    }

    public function barcodeprint(Request $request)
    {
        $drugcode = $request->ICODE;
        $drugname = $request->DRUG_NAME;

            $barcode = DB::table('clinic_drug')->get();

        return view('Mainpage.printbarcode',[
            'drugcodes' => $drugcode,
            'drugnames' => $drugname,
        ]);
    }

    public function report_searchfont(Request $request)
    {
        $datebigin = $request->DATE_BIGIN;
        $dateend = $request->DATE_END;
        // $status = $request->SEND_STATUS;
        $search = $request->get('search');

        if ($datebigin == '' || $dateend == '' ) {
                $sym = DB::table('clinic_sym')
                    ->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')
                    ->where(function($q) use ($search){
                            $q->where('PER_FNAME','like','%'.$search.'%');
                            $q->orwhere('PER_LNAME','like','%'.$search.'%');
                            $q->orwhere('PER_CID','like','%'.$search.'%');
                            $q->orwhere('PER_TEL','like','%'.$search.'%');
                        })
                    ->orderBy('clinic_sym.PER_ID', 'desc')->get();

                    $total = DB::table('clinic_sym')->sum('SYM_SUMTOTALPRICE');


        } else {
                    $sym = DB::table('clinic_sym')
                    ->leftjoin('clinic_per','clinic_sym.PER_ID','=','clinic_per.PER_ID')
                    ->where(function($q) use ($search){
                        $q->where('PER_FNAME','like','%'.$search.'%');
                        $q->orwhere('PER_LNAME','like','%'.$search.'%');
                        $q->orwhere('PER_CID','like','%'.$search.'%');
                        $q->orwhere('PER_TEL','like','%'.$search.'%');
                    })
                    ->WhereBetween('SYM_DATE',[$datebigin,$dateend])
                    ->orderBy('clinic_sym.PER_ID', 'desc')->get();
                    $total = DB::table('clinic_sym')->WhereBetween('SYM_DATE',[$datebigin,$dateend])->sum('SYM_SUMTOTALPRICE');

        }

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


                return view('Mainpage.mainpage_clinic_font',[
                    'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
                    'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,

                    'search'=> $search,
                    'syms'=>$sym,
                    'totals'=>$total,
                ]);
    }
    public function mcontact(Request $request)
    {
                return view('Mainpage.mcontact');
    }
    public function fontobtindex(Request $request)
    {
            $noroom = Room::leftjoin('person','person.PERSON_ROOM_ID','=','room.ROOM_ID')
            ->paginate(18);
            $per = DB::table('person')->get();

            return view('Menu.index',[
                'norooms' => $noroom,
                'pers' => $per
            ]);
    }
    public function contact(Request $request)
    {
            return view('Fontend.contact');
    }
    public function savecontact(Request $request)
    {
            $add= new Contact();
            $add->CON_NAME = $request->CON_NAME;
            $add->CON_EMAIL = $request->CON_EMAIL;
            $add->CON_TEL = $request->CON_TEL;
            $add->CON_SUBJECT = $request->CON_SUBJECT;
            $add->CON_MESSAGE = $request->CON_MESSAGE;
            $add->save();

            $header = "ติดต่อเรา";
            $CON_NAME = $request->CON_NAME;
            $CON_EMAIL = $request->CON_EMAIL;
            $CON_TEL = $request->CON_TEL;
            $CON_SUBJECT = $request->CON_SUBJECT;
            $CON_MESSAGE = $request->CON_MESSAGE;
                $message = $header.
                "\n"."ชื่อ-นามสกุล :" . $CON_NAME .
                "\n"."อีเมล์ :" . $CON_EMAIL .
                "\n"."เบอร์โทร :" . $CON_TEL .
                "\n"."เรื่อง :" . $CON_SUBJECT .
                "\n"."ข้อความ :" . $CON_MESSAGE;
                    $chOne = curl_init();
                    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt( $chOne, CURLOPT_POST, 1);
                    curl_setopt( $chOne, CURLOPT_POSTFIELDS, $message);
                    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$message");
                    curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
                    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer R0BoavAZJKk0YVVf0N04zEY3Gk2XldokbojG3ioQ2s4', );
                    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
                    $result = curl_exec( $chOne );
                    if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
                    else { $result_ = json_decode($result, true);
                    echo "status : ".$result_['status']; echo "message : ". $result_['message']; }
                    curl_close( $chOne );

                return redirect()->route('Per.welcome');
    }

}
