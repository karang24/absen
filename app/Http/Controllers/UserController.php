<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Auth;
use DB;
use Mail;
use Illuminate\Support\Facades\Crypt;
use DataTables;

class UserController extends Controller
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
		
		//dd($data);
       
        // for sending data as json type

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'http://128.199.217.103/api/user',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>json_encode($data),
			  CURLOPT_HTTPHEADER => array(
				'x-gps-api-key: 85efda3c62e67941aa5ee1550c9920b6',
				'Content-Type: application/json'
			  ),
			));

			$data = curl_exec($curl);

			curl_close($curl);
			return $data;

//echo $response;
		
		/*
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array();
        $headers[] = 'Accept: application/xml';
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		//$data = "email=".$email."&password=".$pass;
//dd($data);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		$data = json_decode($resp);
		return $data;
		*/
	 }
	 	public function edit(Request $request, $id){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//$data1 = DB::Select("Select * from jabatan");
				$data1 = DB::Select("Select u.*, r.id as role_id, r.role from user u join user_role r on r.id= u.id_role where u.id=$id");
				$role =  DB::table('user_role')->get() ;

					
				//dd($data1);
			return view('edit_user',compact("data","data1","role"));
			}else{
				return redirect('/');
			}
		}
	 
		public function proses_edit(Request $request){
			//dd($id);
		  //  dd($request);
			$nama = $request->nama;
			$id_role = $request->id_role;
			$email = $request->email;
			$id_user = $request->id_user;
		
			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
				$update = DB::select("update user set nama = '$nama', email ='$email', id_role=$id_role where id = $id_user");
				

				//dd($data1);
			return redirect('user');
			}else{
				return redirect('/');
			}

		}
	 public function proses(Request $request){
		//dd($request);
		$url = "https://project.baki.tech/gps/api/user";
		$nama=  $request->get('nama') ;
		$email=  $request->get('email') ;
		$id_role=  $request->get('role') ;
		$pass =  $request->get('password');
		$id_karyawan =  $request->get('id_karyawan');
	//	dd($id_karyawan);
		//$data = "nama=".$nama."email=".$email."&password=".$pass."id_role=".$role;
		 $data = array(
            "nama" => $nama,
            "email" => $email,
            "password" => $pass,
            "id_role" =>$id_role
        );

		$data1=$this->curlfunction($url,$data);
		$update = DB::select("update user set id_karyawan = $id_karyawan where nama = '$nama' and email= '$email' and id_role = $id_role");

		return redirect('/user');


	}
	
		public function show (Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//dd($data);
				$role =  DB::table('user_role')->get() ;
				//dd($role);
				$karyawan = DB::Select("Select k.* from karyawan k left join user u on u.id_karyawan = k.id where u.id is null order by k.nama");

			return view('user',compact('data','role','karyawan'));
			}else{
				return redirect('/');
			}

		}
		
		public function index(Request $request){
			if ($request->session()->get('nama') != null){
				
					//$data1 = DB::Select("Select ab.*,k.nama from absensi ab join karyawan k on ab.id_karyawan = k.id");
					//dd($data1);
				 //   if ($request->ajax()) {
					 
					 if (session('id_role') == 1 ){
					$data1 = DB::Select("select u.id, nama, role from user u join user_role ur on u.id_role = ur.id ");
					 }else{
					$data1 = DB::Select("select u.id, nama, role from user u join user_role ur on u.id_role = ur.id where ur.id = 3 ");
					 }
					//$data1 = karyawan::latest()->get();;
					//dd($data1);
					return Datatables::of($data1)
							->addIndexColumn()
							->addColumn('action', function($row){
		   
								  // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
								  
									$btn = '<a href="'.url('data/user/edit/'.$row->id).'" class="edit btn btn-info btn-sm">Edit</a>
									<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';

									return $btn;
							})
							->rawColumns(['action'])
							->make(true);
				//	}
					
					
				//dd($data);
			return view('user');
			}else{
				return redirect('/');
			}

		}
		public function delete_user($id){
			DB::table('user')->where('id', $id)->delete();
			return redirect('/user');    
		}  
	
}