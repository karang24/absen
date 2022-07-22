<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Auth;
use DB;
use Mail;
use Illuminate\Support\Facades\Crypt;
class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 
	 public function curlfunction($url,$data){
			//	$url = "https://project.baki.tech/gps/api/login";
		//$email=  $request->get('email') ;
		//$pass =  $request->get('password');
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array();
        $headers[] = 'Accept: application/xml';
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		//$data = "email=".$email."&password=".$pass;
	//	dd($data);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		//dd($res
		curl_close($curl);
		$data = json_decode($resp);
		return $data;
	 }
	 
	public function proses(Request $request){
		//dd($request);
		$url = "http://128.199.217.103/api/login";
		$email=  $request->get('email') ;
		$pass =  $request->get('password');
		$data = "email=".$email."&password=".$pass;
		//dd($data);
		$data1=$this->curlfunction($url,$data);
		
		//dd($data1);
		if ($data1->status == true ) {
			$request->session()->put('nama',$data1->data->nama);
			$request->session()->put('email',$data1->data->email);
			$request->session()->put('id_role',$data1->data->id_role);
			$request->session()->put('role',$data1->data->role);
			$request->session()->put('id_status',$data1->data->id_status);
			$request->session()->put('status',$data1->data->status);
			$request->session()->put('sesi',$data1->data->session);
			$request->session()->put('id_user',$data1->data->id);
			
			return redirect('/home');
 
		}else{
			return back()->withErrors(['error', "Email dan Password Salah"]);
				//return redirect('/');
		}
		//dd($request->session()->get('nama'));
		



	}

		public function home(Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//dd($data);
			return view('home',compact('data'));
			}else{
				return redirect('/');
			}

		}
		
		public function logout(Request $request){
			
			$url ="https://project.baki.tech/gps/api/logout";
			$data=$data['role'] = $request->session()->get('sesi'); 
			$this->curlfunction($url,$data);
			$request->session()->flush();
			return redirect('/');
			

		}
		
		
}

