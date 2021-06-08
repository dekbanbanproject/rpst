<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Sentinel;
use App\User;
use App\message;
use Image;
use PDF;

class QrLoginController extends Controller
{
    public function index(Request $request) {
    	
		return view('auth.QrLogin');
	}
	public function indexoption2(Request $request) {
    	
		return view('auth.QrLogin2');
	}
	public function ViewUserQrCode($value='')
	{
		return view('backEnd.users.viewqrcode');
	}
	public function checkUser(Request $request) {
		 $result =0;
			if ($request->data) {
				$user = User::where('QRpassword',$request->data)->first();
				if ($user) {
					Sentinel::authenticate($user);
				    $result =1;
				 }else{
				 	$result =0;
				 }

				
			}
			
			return $result;
	}

	public function QrAutoGenerate(Request $request)
	{	
		$result=0;
		if ($request->action = 'updateqr') {
			$user = Sentinel::getUser();
			if ($user) {
				$qrLogin=bcrypt($user->personal_number.$user->email.str_random(40));
		        $user->QRpassword= $qrLogin;
		        $user->update();
		        $result=1;
			}
		
		}
		
        return $result;
	}

	function login(){
		return view('auth.login');
	}
	function register(){
	 return view('auth.register');
	 }
	
	 function create(Request $request){

		 $request->validate([
			 'name'=> 'required',
			 'username'=> 'required',
			 'password'=> 'required|min:5|max:12'
 
		 ]);
 
		 $user = new User;
		 $user->name = $request->name;
		 $user->username = $request->username;
		 $user->password = Hash::make($request->password);
		 $user->utype = 'USER';
		 $user->img = '';
		 $user->pr_id = '';
		 $query = $user->save();
 
		 if ($query) {
			 return back()->with('success','ลงทะเบียนสำเร็จ');
		 }else{
			 return back()->with('fail','ลงทะเบียนไม่สำเร็จ');
		 }          
	 }
	 function changpassword(Request $request)
	 {
		 $id = $request->id_update;
 
		 $pass = User::find($id);
		 $pass->password = Hash::make($request->password);
		 $pass->save();
		 return redirect()->route('editprofile');
	 }
 
	 function check(Request $request){
			 $request->validate([
				 'username'=> 'required',
				 'password'=> 'required|min:5|max:12'
			 ]); 
 
			 $user = User::where('username','=', $request->username)->first();
			 if ($user) {
				 if (Hash::check($request->password, $user->password)) {
					 $request->session()->put('LogedUser',$user->id);
 
				   
					 return redirect('dashbord_home');
				 }else {
					 return back()->with('fail','No account');
				 }
			 } else {
				 return view('/');   
				 // return back()->with('fail','No account');
			 } 
	 }
	 function logout(Request $request)
		{
			if (session()->has('LogedUser')) {
				session()->pull('LogedUser');
			
				return view('auth.login');    
			// return redirect('Per.welcome');
		}
	}

}