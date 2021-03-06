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
use App\Models\Quality;
use App\Models\Depart;
use App\Models\User;
use App\Models\Contact;

// use App\Contact;
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
      $pagegroup = Page_group::where('status','=','true')->where('group_id','<>','1')->where('layout_id','=','1')->get();

      // $mainpagesub = Pageleftmodule::where('group_id','=',$idgroup->group_id)->get();
      // leftjoin('page_groups','pageleftmodules.group_id','=','page_groups.group_id')
      // ->where('pageleftmodules.group_id','=',$idgroup->group_id)->get();


      $page1 = Pageleft_one::get();
      $page2 = Pageleft_two::get();
      $pic = Page_slidepicture::where('status','=','true')->get();
      $vedio = Pageleftmodule::where('status','=','true')->where('group_id','=','12')->first(); 
      $imgpresent = DB::table('page_slidepictures')->where('status','=','true')->get();

      // $lay = DB::table('layouts')->first();
      $mo_center = Pageleftmodule::where('status','=','true')->where('group_id','=',13)->get(); 
      $gr = Page_group::first();
      $mo = Pageleftmodule::where('status','=','true')->where('group_id','=',$gr->group_id)->first();
      $qu_center = Quality::where('status','=','true')->where('module_id','=',$mo->module_id)->get(); 
      $nayog = User::leftjoin('positions','positions.POSIT_ID','=','users.position')->where('position','=','1')->get();
      $con = Contact::get();
      $dep = Depart::get();

      return view('font_obt.obt_main',[
        'mainpages'=>$mainpage,'vedios'=>$vedio,
        'pics'=>$pic, 'imgpresents'=>$imgpresent,
        'page1'=>$page1, 'page2'=>$page2, 
        'pagegroups'=>$pagegroup,
        'mo_centers'=>$mo_center,
        'qu_centers'=>$qu_center,
        'nayogs'=>$nayog,
        'cons'=>$con,
        'deps'=>$dep,
        ]);
    }

    public function obt_main_contacts(Request $request)
    {
      // $idgroup = Page_group::where('status','=','true')->first();
      $mainpage = Pageleftmodule::where('status','=','true')->where('group_id','=','1')->get();
      $pagegroup = Page_group::where('status','=','true')->where('group_id','<>','1')->where('layout_id','=','1')->get();

      $page1 = Pageleft_one::get();
      $page2 = Pageleft_two::get();
      $pic = Page_slidepicture::where('status','=','true')->get();
      $vedio = Pageleftmodule::where('status','=','true')->where('group_id','=','12')->first(); 
      $imgpresent = DB::table('page_slidepictures')->where('status','=','true')->get();

      // $lay = DB::table('layouts')->first();
      $mo_center = Pageleftmodule::where('status','=','true')->where('group_id','=',13)->get(); 
      $gr = Page_group::first();
      $mo = Pageleftmodule::where('status','=','true')->where('group_id','=',$gr->group_id)->first();
      $qu_center = Quality::where('status','=','true')->where('module_id','=',$mo->module_id)->get(); 
      $nayog = User::leftjoin('positions','positions.POSIT_ID','=','users.position')->where('position','=','1')->get();
      $con = Contact::get();
      $dep = Depart::get();
      return view('font_obt.obt_main_contacts',[
        'mainpages'=>$mainpage,'vedios'=>$vedio,
        'pics'=>$pic, 'imgpresents'=>$imgpresent,
        'page1'=>$page1, 'page2'=>$page2, 
        'pagegroups'=>$pagegroup,
        'mo_centers'=>$mo_center,
        'qu_centers'=>$qu_center,
        'nayogs'=>$nayog,
        'cons'=>$con,
        'deps'=>$dep,
        ]);
    }

    public function center_person(Request $request ,$id)
    {
      // $idgroup = Page_group::where('status','=','true')->first();
      $mainpage = Pageleftmodule::where('status','=','true')->where('group_id','=','1')->get();
      $pagegroup = Page_group::where('status','=','true')->where('group_id','<>','1')->where('layout_id','=','1')->get();

      $page1 = Pageleft_one::get();
      $page2 = Pageleft_two::get();
      $pic = Page_slidepicture::where('status','=','true')->get();
      $vedio = Pageleftmodule::where('status','=','true')->where('group_id','=','12')->first(); 
      $imgpresent = DB::table('page_slidepictures')->where('status','=','true')->get();

      // $lay = DB::table('layouts')->first();
      $mo_center = Pageleftmodule::where('status','=','true')->where('group_id','=',13)->get(); 
      $gr = Page_group::first();
      $mo = Pageleftmodule::where('status','=','true')->where('group_id','=',$gr->group_id)->first();
      $qu_center = Quality::where('status','=','true')->where('module_id','=',$mo->module_id)->get(); 
      $nayog = User::leftjoin('positions','positions.POSIT_ID','=','users.position')->where('position','=','1')->get();
      $con = Contact::get();
      $depf = Depart::where('departs_id','=',$id)->first(); 
      $dephead = Depart::leftjoin('users','departs.departs_id','=','users.dep')
      ->leftjoin('positions','users.position','=','positions.POSIT_ID')
      ->where('departs_id','=',$id)->get(); 
      $dep = Depart::get(); 

      return view('font_obt.center_person',[
        'mainpages'=>$mainpage,'vedios'=>$vedio,
        'pics'=>$pic, 'imgpresents'=>$imgpresent,
        'page1'=>$page1, 'page2'=>$page2, 
        'pagegroups'=>$pagegroup,
        'mo_centers'=>$mo_center,
        'qu_centers'=>$qu_center,
        'nayogs'=>$nayog,
        'cons'=>$con, 'depheads'=>$dephead,
        'deps'=>$dep, 'depfs'=>$depf,
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
    public function obt_main_contacts_save(Request $request)
    {
            $add= new Contact();
            $add->con_name = $request->con_name;
            $add->con_tel = $request->con_tel;
            $add->con_title = $request->con_title;
            $add->con_email = $request->con_email;
            $add->con_message = $request->con_message;
            $add->save();

            $header = "???????????????????????????";
            $CON_NAME = $request->con_name;
            $CON_EMAIL = $request->con_email;
            $CON_TEL = $request->con_tel;
            $CON_TITLE = $request->con_title;
            $CON_MESSAGE = $request->con_message;
                $message = $header.
                "\n"."????????????-????????????????????? :" . $CON_NAME .
                "\n"."?????????????????? :" . $CON_EMAIL .
                "\n"."???????????????????????? :" . $CON_TEL .
                "\n"."?????????????????? :" . $CON_TITLE .
                "\n"."????????????????????? :" . $CON_MESSAGE;

                $u = User::where('position','=','1')->first();
                // $name = DB::table('hrd_person')->where('ID','=',$u->ORG_LEADER_ID)->first();        
               if($u == null){
                 $con ='';
               }else{
                 $con =$u->linetoken;
               }
                
               if($con !== '' && $con !== null){  

                    $chOne = curl_init();
                    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt( $chOne, CURLOPT_POST, 1);
                    curl_setopt( $chOne, CURLOPT_POSTFIELDS, $message);
                    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$message");
                    curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
                    // $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer R0BoavAZJKk0YVVf0N04zEY3Gk2XldokbojG3ioQ2s4', );
                    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$con.'', );
                    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
                    $result = curl_exec( $chOne );
                    if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
                    else { $result_ = json_decode($result, true);
                    echo "status : ".$result_['status']; echo "message : ". $result_['message']; }
                    curl_close( $chOne );
                }
                return redirect()->route('Per.welcome');
    }

}
