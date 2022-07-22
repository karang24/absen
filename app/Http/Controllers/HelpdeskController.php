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

class HelpdeskController extends Controller
{
		public function show(Request $request){
			if ($request->session()->get('nama') != null){
				$id_user= session('id_user');
				$user = DB::table('user')->where('id',$id_user)->get();
				//dd($id_user);
			    $karyawan = DB::table('karyawan')->where('id',$user[0]->id_karyawan)->get();
				//dd(count($karyawan));
				if (count($karyawan)> 0){
				$departemen = DB::table('departemen')->where('id',$karyawan[0]->id_departemen)->get();
				$jabatan = DB::table('jabatan')->where('id',$karyawan[0]->id_jabatan)->get();
				//dd($departemen);
				}else{
				$departemen = DB::table('departemen')->get();
				$jabatan = DB::table('jabatan')->get();
				}
				$departemen1 = DB::table('departemen')->get();

				$data = DB::table('helpdesk')
						->join('karyawan','karyawan.id','=','helpdesk.id_pemohon')
						->Leftjoin('departemen','helpdesk.id_departemen_pen','=','departemen.id')
						->select('helpdesk.*','karyawan.nama','departemen.departemen')->get();
			
				//dd($data);
				return view('help_menu',compact('karyawan','departemen','departemen1','jabatan','data'));
			}else{
				return redirect('/');
			}

		}
		
		public function show_progres(Request $request){
			if ($request->session()->get('nama') != null){
				$id_user= session('id_user');
				$user = DB::table('user')->where('id',$id_user)->get();
				//dd($id_user);
			    $karyawan = DB::table('karyawan')->where('id',$user[0]->id_karyawan)->get();
				//dd(count($karyawan));
				if (count($karyawan)> 0){
				$departemen = DB::table('departemen')->where('id',$karyawan[0]->id_departemen)->get();
				$jabatan = DB::table('jabatan')->where('id',$karyawan[0]->id_jabatan)->get();
				//dd($departemen);
				}else{
				$departemen = DB::table('departemen')->get();
				$jabatan = DB::table('jabatan')->get();
				}
				$departemen1 = DB::table('departemen')->get();

				$data = DB::table('helpdesk')
						->join('karyawan','karyawan.id','=','helpdesk.id_pemohon')
						->Leftjoin('departemen','helpdesk.id_departemen_pen','=','departemen.id')
						->select('helpdesk.*','karyawan.nama','departemen.departemen')->get();
			
				//dd($data);
				return view('help_inprogres',compact('karyawan','departemen','departemen1','jabatan','data'));
			}else{
				return redirect('/');
			}

		}
		
		public function detail(Request $request, $id){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				$id_help = $id;
				//$data1 = DB::Select("Select * from jabatan");
				$data1 = DB::Select("Select * from helpdesk h join karyawan k on h.id_pemohon = k.id join departemen d on d.id = h.id_departemen_pen where h.id=$id");

					
				//dd($data1);
			return view('help_detail',compact("data","data1","id_help"));
			}else{
				return redirect('/');
			}
		}
		
		public function proses_edit(Request $request){
			//dd($id);
		   // dd($request);
			$status = $request->status;
			$id_penindak = $request->id_penindak;
			$id_help = $request->id_help;
		
			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
				$update = DB::select("update helpdesk set status = '$status', id_penindak = '$id_penindak'  where id = $id_help");
				

				//dd($data1);
			return redirect('helpdesk');
			}else{
				return redirect('/');
			}

		}
		public function index(Request $request){
			if ($request->session()->get('nama') != null){
				
				//$data1 = DB::Select("Select id,nik_sap,nama,email,hp from karyawan");
					//dd($data1);
				//    if ($request->ajax()) {
					$data1 = DB::Select("Select * from departemen");
					//$data1 = karyawan::latest()->get();;
					//dd($data1);
					return Datatables::of($data1)
							->addIndexColumn()
							->addColumn('action', function($row){
		   
								  // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
									$btn = '<a href="'.url('data/departemen/edit/'.$row->id).'" class="edit btn btn-info btn-sm">Edit</a>,
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
		public function insert(Request $request){
			//dd($id);
		   // dd($request);
			$id_pemohon = $request->id_pemohon;
			$id_jabatan = $request->jabatan;
			$id_departemen = $request->departemen;
			$id_departemen_pen = $request->id_departemen_pen;
			$deskripsi = $request->konten;
			$status = 'New';

			
			if ($request->session()->get('nama') != null){
				
				
	    //dd('write code here');

			
				// menyimpan data file yang diupload ke variabel $file
				$file = $request->file('file');
		 				
				if (!empty($file)) {
						// nama file
				echo 'File Name: '.$file->getClientOriginalName();
				echo '<br>';
		 
						// ekstensi file
				echo 'File Extension: '.$file->getClientOriginalExtension();
				echo '<br>';
		 
						// real path
				echo 'File Real Path: '.$file->getRealPath();
				echo '<br>';
		 
						// ukuran file
				echo 'File Size: '.$file->getSize();
				echo '<br>';
		 
						// tipe mime
				echo 'File Mime Type: '.$file->getMimeType();
		 
						// isi dengan nama folder tempat kemana file diupload
				$tujuan_upload = 'public/file';
		 		$nama_file = $file->getClientOriginalName();

					// upload file
				$file->move($tujuan_upload,$file->getClientOriginalName());
								$insert = DB::select("insert into helpdesk (id_pemohon, id_jabatan_p, id_departemen_p, deskripsi,id_departemen_pen,status,photo) values ('$id_pemohon', '$id_jabatan', '$id_departemen', '$deskripsi','$id_departemen_pen','$status','$nama_file')");

				}		
				//dd($tujuan_upload);			
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
			//	$update = DB::select("update karyawan set nama = '$nama', hp = '$hp', id_jabatan = $jabatan , id_departemen = $departemen, id_detail = $detail where nik_sap = $nik_sap and no_id= '$no_id'");
				
			$insert = DB::select("insert into helpdesk (id_pemohon, id_jabatan_p, id_departemen_p, deskripsi,id_departemen_pen,status) values ('$id_pemohon', '$id_jabatan', '$id_departemen', '$deskripsi','$id_departemen_pen','$status')");


				//dd($data1);
			return redirect('/helpdesk');
			}else{
				return redirect('/');
			}
		}
	
}