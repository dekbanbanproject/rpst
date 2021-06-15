<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Pageleft_one;
use App\Models\Pageleft_two;
use App\Models\Pageleft_tree;
use App\Models\Pageleft_four;
use App\Models\Pageleft_five;
use App\Models\Pageleftmodule;
use App\Models\Pageleftmodule_sub;
use App\Models\Page_group;
use App\Models\Page_slidepicture;


use App\Contact;
use Image;
use PDF;

date_default_timezone_set("Asia/Bangkok");

class FontobtController extends Controller
{
//==========================================================//
  public function welcome(Request $request)
    {
      // $idgroup = Page_group::where('status','=','true')->first();
      $mainpage = Pageleftmodule::where('status','=','true')->where('group_id','=','1')->get();
      $pagegroup = Page_group::where('status','=','true')->where('group_id','<>','1')->get();

      // $mainpagesub = Pageleftmodule::where('group_id','=',$idgroup->group_id)->get();
      // leftjoin('page_groups','pageleftmodules.group_id','=','page_groups.group_id')
      // ->where('pageleftmodules.group_id','=',$idgroup->group_id)->get();


      $page1 = Pageleft_one::get();
      $page2 = Pageleft_two::get();
      $pic = Page_slidepicture::where('status','=','true')->get();
      // $imgpresent = DB::table('info_publicity_image')->where('ACTIVE','=','True')->get(); 
      $imgpresent = DB::table('page_slidepictures')->where('status','=','true')->get();
      return view('font_obt.obt_main',[
        'mainpages'=>$mainpage,
        'pics'=>$pic, 'imgpresents'=>$imgpresent,
        'page1'=>$page1, 'page2'=>$page2, 'pagegroups'=>$pagegroup,
       
        ]);
    }
    public function module_show(Request $request,$id)
    {
      $mainpage = Pageleftmodule::where('status','=','true')->where('group_id','=','1')->get();
      $pagegroup = Page_group::where('status','=','true')->where('group_id','<>','1')->get();
      $mainpageshow = Pageleftmodule::where('module_id','=',$id)->first();
      $page1 = Pageleft_one::get();
      $page2 = Pageleft_two::get();

      return view('font_obt.module_show',[
        'mainpages'=>$mainpage,
        'mainpageshows'=>$mainpageshow,
        'page1'=>$page1, 'page2'=>$page2,'pagegroups'=>$pagegroup,
       
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
