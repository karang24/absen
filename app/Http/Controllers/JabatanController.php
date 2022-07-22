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

class JabatanController extends Controller
{
		public function show(Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//$data1 = DB::Select("Select * from jabatan");
				$data1 = DB::table('jabatan')->paginate(15);

					
				//dd($data);
			return view('jabatan',compact("data","data1"));
			}else{
				return redirect('/');
			}

		}
		public function edit(Request $request, $id){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//$data1 = DB::Select("Select * from jabatan");
				$data1 = DB::Select("Select * from jabatan where id=$id");

					
				//dd($data1);
			return view('edit_jabatan',compact("data","data1"));
			}else{
				return redirect('/');
			}
		}
		
		public function insert(Request $request){
			//dd($id);
		    //dd($request->jabatan);
			if ($request->session()->get('nama') != null){
			
			$jabatan = $request->jabatan;

				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
			//	$update = DB::select("update karyawan set nama = '$nama', hp = '$hp', id_jabatan = $jabatan , id_departemen = $departemen, id_detail = $detail where nik_sap = $nik_sap and no_id= '$no_id'");
				
				$insert = DB::select("insert into jabatan (jabatan) values ('$jabatan') ");
				

				//dd($data1);
			return redirect('jabatan');
			}else{
				return redirect('/');
			}

		}
		
		public function proses_edit(Request $request){
			//dd($id);
		    //dd($request);
			$jabatan = $request->jabatan;
			$id_jabatan = $request->id_jabatan;
		
			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
				$update = DB::select("update jabatan set jabatan = '$jabatan' where id = $id_jabatan");
				

				//dd($data1);
			return redirect('jabatan');
			}else{
				return redirect('/');
			}

		}
		public function delete_jabatan($id){
			DB::table('jabatan')->where('id', $id)->delete();
			return redirect()->with('status', "Data jabatan berhasil dihapus.");    
		}  
		
		public function index(Request $request){
			if ($request->session()->get('nama') != null){
				
				//$data1 = DB::Select("Select id,nik_sap,nama,email,hp from karyawan");
					//dd($data1);
			//	    if ($request->ajax()) {
					$data1 = DB::Select("Select * from jabatan");
					//$data1 = karyawan::latest()->get();;
					//dd($data1);
					return Datatables::of($data1)
							->addIndexColumn()
							->addColumn('action', function($row){
		   
								  // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
									$btn = '<a href="'.url('data/jabatan/edit/'.$row->id).'" class="edit btn btn-info btn-sm">Edit</a>,
									<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';

									return $btn;
							})
							->rawColumns(['action'])
							->make(true);
			//		}
					
					
				//dd($data);
			return view('karyawan');
			}else{
				return redirect('/');
			}

		}
		
	
}