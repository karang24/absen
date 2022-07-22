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

class GmsController extends Controller
{
		public function show(Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('role');
				//$data1 = DB::Select("Select * from jabatan");
				//$data1 = DB::table('absensi')->paginate(15);
			$id_user = session('id_user');
			$id_karyawan = DB::Select("Select id_karyawan from user where id = $id_user ");
			$id=$id_karyawan[0]->id_karyawan;
			if($id > 0 ){
			$data1 = DB::Select("Select d.id from karyawan k  join departemen d on k.id_departemen = d.id where k.id= $id");
			}else {
				$data1= 0 ;
			}
		//	dd($data1);
			return view('Gms',compact('data','data1'));
			}else{
				return redirect('/');
			}

		}		
		
		public function take5_g(Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//$data1 = DB::Select("Select * from jabatan");
				$data1 = DB::Select("Select kategori from take5_m_g group by kategori");
				$data2 = DB::Select("Select * from take5_m_g");
				$id_user = session('id_user');
				$karyawan= DB::Select("Select ifnull(b.nama, a.nama) as username from user a left join karyawan b on a.id_karyawan = b.id where a.id = $id_user ");

					
				//dd($karyawan);
			return view('take5',compact("data","data1","data2","karyawan"));
			}else{
				return redirect('/');
			}
		}		
		public function take5_m(Request $request){
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				//$data1 = DB::Select("Select * from jabatan");
				$data1 = DB::Select("Select kategori from take5_m_mn group by kategori");
				$data2 = DB::Select("Select * from take5_m_mn");
				$id_user = session('id_user');
				$karyawan= DB::Select("Select ifnull(b.nama, a.nama) as username from user a left join karyawan b on a.id_karyawan = b.id where a.id = $id_user ");

					
				//dd($karyawan);
			return view('take5_minning',compact("data","data1","data2","karyawan"));
			}else{
				return redirect('/');
			}
		}
		/*
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

		}*/
		
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
		public function insert_g(Request $request){
			//dd($id);
		  // dd($request);
			$nama = $request->nama;
			$tanggal = $request->tgl;
			$tugas = $request->tugas;
			$value = $request->value;
			$id_item = $request->id_item;
			$id_karyawan = DB::select("select id from karyawan where nama = '$nama'");			//dd($id_karyawan);

			$id =$id_karyawan[0]->id;
			$id_user = session('id_user');

			
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				
			//	$update = DB::select("update karyawan set nama = '$nama', hp = '$hp', id_jabatan = $jabatan , id_departemen = $departemen, id_detail = $detail where nik_sap = $nik_sap and no_id= '$no_id'");
				for($i = 0;$i< sizeof($value);$i++)
				{
							$nilai = $value[$i];
							$item = $id_item [$i];
							//dd($nilai);
							$insert = DB::select("insert into take5_tr (id_tak5_m,value,id_karyawan,date,tugas,id_user)values('$item','$nilai',$id,'$tanggal','$tugas' ,$id_user)");
							//dd($seats);
				}
				//$insert = DB::select("insert into take5_tr (departemen)values('$Departemen')");
				

				//dd($data1);
			return redirect('/gms')->with('status', "take 5 success saved");
			}else{
				return redirect('/');
			}

		}
		
		public function delete_departemen($id){
			DB::table('departemen')->where('id', $id)->delete();
			return redirect()->with('status', "Data Karyawan berhasil dihapus.");    
		}  
	
}