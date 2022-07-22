<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\karyawan;
use Auth;
use DB;
use Mail;
use Illuminate\Support\Facades\Crypt;
use DataTables;

class KaryawanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 

	public function proses(Request $request){
		//dd($request);
		$url = "https://project.baki.tech/gps/api/login";
		$email=  $request->get('email') ;
		$pass =  $request->get('password');
		$data = "email=".$email."&password=".$pass;

		curlfunction($url,$data);
		
		//dd($data);
		if ($data->status == true ) {
			$request->session()->put('nama',$data->data->nama);
			$request->session()->put('email',$data->data->email);
			$request->session()->put('id_role',$data->data->id_role);
			$request->session()->put('id_status',$data->data->id_status);
			$request->session()->put('status',$data->data->status);
			$request->session()->put('sesi',$data->data->session);
			$request->session()->put('id_user',$data->data->id);
			
			return redirect('/home');
 
		}else{
			return back()->withErrors(['error', "Email dan Password Salah"]);
				//return redirect('/');
		}
		//dd($request->session()->get('nama'));
		



	}

		public function show(Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('role');
				$id_role =$request->session()->get('id_role');
			//	dd($id_role);
				
				if ($id_role == 1){
				$jabatan = DB::Select("select * from jabatan");
				$departemen = DB::Select("select * from departemen");
				$golongan = DB::Select("select * from golongan");
				$detail = DB::Select("select * from detail");
				}else{
				$nama = $request->session()->get('nama');
				$checkdep =  DB::Select("select k.id_departemen from karyawan k join user u on k.id=u.id_karyawan where u.nama = '$nama'");	
				$id_dep = $checkdep[0]->id_departemen;
				//dd($checkdep[0]->id_departemen);
					$jabatan = DB::Select("select * from jabatan ");
					$departemen = DB::Select("select * from departemen where id = '$id_dep'");
					$golongan = DB::Select("select * from golongan");
					$detail = DB::Select("select * from detail");
				}
				//dd($detail);
			return view('karyawan',compact('data','jabatan','departemen','golongan','detail'));
			}else{
				return redirect('/');
			}

		}
		
		public function edit(Request $request,$id){
			//dd($id);
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
				$data1 = DB::Select("Select * from karyawan k join jabatan j on  k.id_jabatan = j.id join departemen d on k.id_departemen = d.id join detail g on k.id_detail = g.id where k.id =$id");
				$jabatan = DB::Select("select * from jabatan");
				$departemen = DB::Select("select * from departemen");
				$detail = DB::Select("select * from detail");

				//dd($data1);
			return view('edit_karyawan',compact("data","data1","jabatan","departemen","detail"));
			}else{
				return redirect('/');
			}

		}		
		public function proses_edit(Request $request){
			//dd($id);
		   // dd($request);
			$nama = $request->nama;
			$nik_sap = $request->nik_sap;
			$no_id = $request->no_id;
			$jabatan = $request->jabatan;
			$departemen = $request->departemen;
			//$detail = $request->detail;
			$hp = $request->hp;
			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
			//	dd($data);
				$update = DB::select("update karyawan set nama = '$nama', hp = '$hp', id_jabatan = $jabatan , id_departemen = $departemen where nik_sap = $nik_sap and no_id= '$no_id'");
				

				//dd($data1);
			return redirect('karywan');
			}else{
				return redirect('/');
			}

		}	
		public function insert(Request $request){
			//dd($id);
		    //dd($request->detail);
			$nama = $request->nama;
			$nik_sap = $request->nik_sap;
			$no_id = $request->no_id;
			$jabatan = $request->jabatan;
			$departemen = $request->departemen;
			$golongan = $request->golongan;
			$email = $request->email;
		//	$detail = $request->detail;
			$hp = $request->hp;
			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
			//	$update = DB::select("update karyawan set nama = '$nama', hp = '$hp', id_jabatan = $jabatan , id_departemen = $departemen, id_detail = $detail where nik_sap = $nik_sap and no_id= '$no_id'");
				
				$insert = DB::select("insert into karyawan (nama,hp,id_jabatan,id_departemen,nik_sap,no_id,email,id_golongan,uniqid)values('$nama','$hp',$jabatan,$departemen,$nik_sap,'$no_id','$email',$golongan,1)");
				

				//dd($data1);
			return redirect('karywan');
			}else{
				return redirect('/');
			}

		}
		public function delete_karyawan($id){
			DB::table('karyawan')->where('id', $id)->delete();
			return redirect()->with('status', "Data Karyawan berhasil dihapus.");    
		}  
		public function index(Request $request){
			//dd($request->isXmlHttpRequest());
			if ($request->session()->get('nama') != null){
				
				//$data1 = DB::Select("Select id,nik_sap,nama,email,hp from karyawan");
					//dd($data1);
//if ($request->ajax()) {
					$id_role =$request->session()->get('id_role');
					$nama = $request->session()->get('nama');
					$checkdep =  DB::Select("select k.id_departemen from karyawan k join user u on k.id=u.id_karyawan where u.nama = '$nama'");	
					if ($id_role == 1){
					
						$data1 = DB::Select("Select id,nik_sap,nama,email,hp from karyawan");
					}else {
						$id_dep = $checkdep[0]->id_departemen;
						$data1 = DB::Select("Select id,nik_sap,nama,email,hp from karyawan where id_departemen = '$id_dep'");

					}
					//$data1 = karyawan::latest()->get();;
					//dd($data1);
					return Datatables::of($data1)
							->addIndexColumn()
							->addColumn('action', function($row){
		   
								  // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
									$btn = '<a href="'.url('data/karyawan/edit/'.$row->id).'" class="edit btn btn-info btn-sm">Edit</a>,
									
									<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
									

									return $btn;
							})
							->rawColumns(['action'])
							->make(true);
				//	}
					
					
					
					
				//dd($data);
			return view('karyawan');
			}else{
				return redirect('/');
			}

		}
		
		
		
		
}

