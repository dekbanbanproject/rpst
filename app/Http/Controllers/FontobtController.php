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

class FontobtController extends Controller
{
//==========================================================//
  public function welcome(Request $request)
    {
        // $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

      return view('font_obt.obt_main',[
           
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
