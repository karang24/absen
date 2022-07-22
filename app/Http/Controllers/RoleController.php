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

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */		


		public function show(Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
	
				//dd($detail);
			return view('role',compact('data'));
			}else{
				return redirect('/');
			}

		}
		
		public function edit(Request $request,$id){
			//dd($id);
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
				$data1 = DB::Select("Select * from rfid r left join karyawan k on r.id_karyawan = k.id where r.id = $id");
				$karyawan = DB::Select("select * from karyawan where id not in (select id_karyawan from rfid) order by nama");
			

				//dd($data1);
			return view('edit_role',compact("data","data1","karyawan"));
			}else{
				return redirect('/');
			}

		}		
		public function proses_edit(Request $request){
			//dd($id);
		    //dd($request);
			$id_karyawan = $request->id_karyawan;
			$rfid = $request->rfid;
			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
				$update = DB::select("update rfid set id_karyawan = '$id_karyawan', id_status = 1 where rfid = '$rfid'");
				

				//dd($data1);
			return view('role',compact("data"));
			}else{
				return redirect('/');
			}

		}	
		public function insert(Request $request){
		//	dd($request);
		    //dd($request->detail);
			$role = $request->role;

			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
			//	$update = DB::select("update karyawan set nama = '$nama', hp = '$hp', id_jabatan = $jabatan , id_departemen = $departemen, id_detail = $detail where nik_sap = $nik_sap and no_id= '$no_id'");
				
			//	$insert = DB::select("insert into user_role (role) values ('$role')");
				
				$insert = DB::select("insert into user_role (role)values('$role')");
				


				//dd($data1);
			return redirect('role');
			}else{
				return redirect('/');
			}

		}
		
		public function index(Request $request){
			if ($request->session()->get('nama') != null){
				
				//$data1 = DB::Select("Select id,nik_sap,nama,email,hp from karyawan");
					//dd($data1);
				  //  if ($request->ajax()) {
					$data1 = DB::Select("Select * from user_role");
					//$data1 = karyawan::latest()->get();;
					//dd($data1);
					return Datatables::of($data1)
							->addIndexColumn()
							->addColumn('action', function($row){
		   
								  // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
									$btn = '<a href="'.url('data/role/edit/'.$row->id).'" class="edit btn btn-info btn-sm">Edit</a>,
									<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';

									return $btn;
							})
							->rawColumns(['action'])
							->make(true);
				//	}
					
					
				//dd($data);
			return view('role');
			}else{
				return redirect('/');
			}

		}
		
			
		public function delete_role($id){
		//	dd($id);
			DB::table('user_role')->where('id', $id)->delete();
			//sreturn redirect()->with('status', "Data Role berhasil dihapus.");    
		}  
		
		
}

