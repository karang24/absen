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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DownloadHarian;

class AbsenController extends Controller
{
		public function show(Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//$data1 = DB::Select("Select * from jabatan");
				//$data1 = DB::table('absensi')->paginate(15);

			//							$data1 = DB::Select("Select ab.* ,k.nama from absensi ab join karyawan k on ab.id_user = k.id");

			//	dd($data1);
			return view('absen_harian',compact("data"));
			}else{
				return redirect('/');
			}

		}		
		public function show_minggu(Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//$data1 = DB::Select("Select * from jabatan");
				//$data1 = DB::table('absensi')->paginate(15);

			//							$data1 = DB::Select("Select ab.* ,k.nama from absensi ab join karyawan k on ab.id_user = k.id");

			//	dd($data1);
			return view('absen_minggu',compact("data"));
			}else{
				return redirect('/');
			}

		}
		
		public function edit(Request $request, $id){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//$data1 = DB::Select("Select * from jabatan");
				$data1 = DB::Select("Select * from departemen where id=$id");

					
				//dd($data1);
			return view('edit_departement',compact("data","data1"));
			}else{
				return redirect('/');
			}
		}
		
		public function proses_edit(Request $request){
			//dd($id);
		    //dd($request);
			$departemen = $request->departemen;
			$id_departemen = $request->id_departemen;
		
			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
				$update = DB::select("update departemen set departemen = '$jabatan' where id = $id_jabatan");
				

				//dd($data1);
			return redirect('departemen');
			}else{
				return redirect('/');
			}

		}
		public function index(Request $request){
			if ($request->session()->get('nama') != null){
				
					//$data1 = DB::Select("Select ab.*,k.nama from absensi ab join karyawan k on ab.id_karyawan = k.id");
					//dd(session('id_role'));
				   // if ($request->ajax()) {
					if (session('id_role') ==1 ){

					$data1 = DB::Select("select  ab.*, DATE_FORMAT(masuk,'%Y-%m-%d') tanggal, k.nama ,j.jabatan , d.departemen   from absensi ab join rfid r on ab.rfid  = r.rfid  join karyawan k  on r.id_karyawan = k.id   join jabatan j on k.id_jabatan = j.id  join departemen d  on k.id_departemen = d.id   ");
					}else if(session('id_role') ==5){
						//dd(session('id_role'));

						$id_user =$request->session()->get('id_user');
						$user =  DB::Select("select id_karyawan from user where id = $id_user");//dd($user);
						$id_karyawan = $user[0]->id_karyawan;
						$karyawan = DB::Select("select id_departemen from karyawan where id = $id_karyawan");
						$id_departemen = $karyawan[0]->id_departemen;
						
						$data1 = DB::Select("select  ab.*, DATE_FORMAT(masuk,'%Y-%m-%d') tanggal,k.nama ,j.jabatan , d.departemen   from absensi ab join rfid r on ab.rfid  = r.rfid  join karyawan k  on r.id_karyawan = k.id   join jabatan j on k.id_jabatan = j.id  join departemen d  on k.id_departemen = d.id  where k.id_departemen = $id_departemen");
					}
					else{
						$id_user =$request->session()->get('id_user');
						$user =  DB::Select("select id_karyawan from user where id = $id_user");
						$id_karyawan = $user[0]->id_karyawan;
						$karyawan = DB::Select("select id_departemen from karyawan where id = $id_karyawan");
						//dd($karyawan);

						$id_departemen = $karyawan[0]->id_departemen;
						$data1 = DB::Select("select  ab.*, DATE_FORMAT(masuk,'%Y-%m-%d') tanggal,k.nama ,j.jabatan , d.departemen   from absensi ab join rfid r on ab.rfid  = r.rfid  join karyawan k  on r.id_karyawan = k.id   join jabatan j on k.id_jabatan = j.id  join departemen d  on k.id_departemen = d.id  where k.id= $id_karyawan");
					}
					//$data1 = karyawan::latest()->get();;
					//dd($data1);
					return Datatables::of($data1)
							->addIndexColumn()
							->addColumn('action', function($row){
								if (session('id_role') == 1 ){
								  // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
									$btn = '<a href="'.url('data/departemen/edit/'.$row->id).'" class="edit btn btn-info btn-sm">Edit</a>,';
								}else{
									$btn = '';

								}
									return $btn;
							})
							->rawColumns(['action'])
							->make(true);
				//	}
					
					
				//dd($data);
			return view('absen_harian');
			}else{
				return redirect('/');
			}

		}
		public function index_minggu(Request $request){
			if ($request->session()->get('nama') != null){
				
					//$data1 = DB::Select("Select ab.*,k.nama from absensi ab join karyawan k on ab.id_karyawan = k.id");
					//dd($data1);
				   // if ($request->ajax()) {
					$data1 = DB::Select("call db_gps.sp_report_weekly(0, 0, 1)");
					
					//$data1 = karyawan::latest()->get();;
					//dd($data1);
					return Datatables::of($data1)
							->addIndexColumn()
							->addColumn('action', function($row){
								if (session('id_role') == 1 ){
								  // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
									$btn = '<a href="'.url('data/departemen/edit/'.$row->id).'" class="edit btn btn-info btn-sm">Edit</a>,';
								}else{
									$btn = '';

								}
									return $btn;
							})
							->rawColumns(['action'])
							
							->make(true);
				//	}
					
					
				//dd($data);
			return view('absen_harian');
			}else{
				return redirect('/');
			}

		}
		public function download_harian()
		{
			
			return Excel::download(new DownloadHarian(), 'absen.xlsx');
		}		
		
		public function session_tgl(Request $request)
		{  $request->session()->forget('tgl');

			$tgl = $request->tgl;
			//dd($tgl);
			//Session::set('tgl', $tgl);
			$request->session()->put('tgl',$tgl);


		}
		public function insert(Request $request){
			//dd($id);
		   // dd($request->Departemen);
			$Departemen = $request->Departemen;

			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
			//	$update = DB::select("update karyawan set nama = '$nama', hp = '$hp', id_jabatan = $jabatan , id_departemen = $departemen, id_detail = $detail where nik_sap = $nik_sap and no_id= '$no_id'");
				
				$insert = DB::select("insert into departemen (departemen)values('$Departemen')");
				

				//dd($data1);
			return redirect('/departemen');
			}else{
				return redirect('/');
			}

		}
		
		public function delete_departemen($id){
			DB::table('departemen')->where('id', $id)->delete();
			return redirect()->with('status', "Data Karyawan berhasil dihapus.");    
		}  
	
}