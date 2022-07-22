<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\karyawan;

//use App\Exports\SiswaExport;
use App\Imports\rosterImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Exports\ExportFormat;
use DataTables;

use DB;
use Mail;
use Illuminate\Support\Facades\Crypt;
class rosterController extends Controller
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
				$id_role =$request->session()->get('id_role');

				//dd($data);
				if ($id_role == 1){
					$roster = DB::select("select DEPARTEMEN , BULAN , TAHUN,DATE_FORMAT(created_at,'%m-%d-%Y') as created_at  from roster where BULAN != 'BULAN' group by DEPARTEMEN,BULAN,TAHUN,DATE_FORMAT(created_at,'%m-%d-%Y') ");
				}else{
					$nama = $request->session()->get('nama');
					$checkdep =  DB::Select("select d.departemen from karyawan k join user u on k.id=u.id_karyawan join departemen d on d.id = k.id_departemen where u.nama = '$nama'");	
					$dep = $checkdep[0]->departemen;
					$roster = DB::select("select DEPARTEMEN , BULAN , TAHUN,DATE_FORMAT(created_at,'%m-%d-%Y') as created_at  from roster where BULAN != 'BULAN' and DEPARTEMEN like '%$dep%' group by DEPARTEMEN,BULAN,TAHUN,DATE_FORMAT(created_at,'%m-%d-%Y') ");
			
				}
				/*$roster = DB::table('roster')
                 ->select('DEPARTEMEN' , 'BULAN' , 'TAHUN','created_at')
                 ->groupBy('DEPARTEMEN')
                 ->groupBy('BULAN')
                 ->groupBy('TAHUN')
                 ->groupBy('created_at')
                 ->get();*/
				//dd($data1);
				return view('roster',compact('data','roster'));
			}else{
				return redirect('/');
			}

		}
		public function detail(Request $request, $id){
		//	dd(Crypt::decrypt($id) );
			$split = explode('|',Crypt::decrypt($id));
			//dd($split);
			$depatemen =$split[0] ;
			$created_at =$split[1] ;
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				$data['departemen'] = $depatemen;
				$roster = DB::select("select distinct NAMA,JABATAN, DEPARTEMEN , BULAN , TAHUN,DATE_FORMAT(created_at,'%m-%d-%Y') as created_at, `20` as duapuluh,`21` as duasatu,`22` as duadua,`23` as duatiga,`24`as duaempat,`25`as dualima,`26`as duaenam,`27`as duatujuh,`28`as dualapan,`29`duasembilan,`30`tigapuluh,`31`tigasatu,`1`satu,`2`dua,`3`tiga,`4`empat,`5`lima,`6`enam,`7`tujuh,`8`lapan,`9`sembilan,`10`sepuluh,`11`sebelas,`12`duabelas,`13`tigabelas,`14`empatbelas,`15`limabelas,`16`enambelas,`17`tujuhbelas,`18` lapanbelas,`19`sembilanbelas  from roster rs join jabatan jb on rs.id_jabatan = jb.id where BULAN != 'BULAN' and DEPARTEMEN = '".$depatemen."'  order by created_at desc");
				//dd($roster);
			return view('detail_roster',compact('data','roster'));
			}else{
				return redirect('/');
			}

		}		
		
		public function export_excel()
		{
			
			return Excel::download(new ExportFormat(), 'formatexport.xlsx');
		}
		public function view_edit(Request $request, $id){
		//	dd(Crypt::decrypt($id) );
			$split = explode('|',Crypt::decrypt($id));
			//dd($split);
			$depatemen =$split[0] ;
			$bulan =$split[1] ;
			$nama =$split[2] ;
			$jabatan =$split[3] ;
			if ($request->session()->get('nama') != null){
				$data['nama'] = $request->session()->get('nama');
				$data['role'] = $request->session()->get('nama');
				$data['departemen'] = $depatemen;
				$roster = DB::select("select distinct NAMA,JABATAN, DEPARTEMEN , BULAN , TAHUN,DATE_FORMAT(created_at,'%m-%d-%Y') as created_at, `20` as duapuluh,`21` as duasatu,`22` as duadua,`23` as duatiga,`24`as duaempat,`25`as dualima,`26`as duaenam,`27`as duatujuh,`28`as dualapan,`29`duasembilan,`30`tigapuluh,`31`tigasatu,`1`satu,`2`dua,`3`tiga,`4`empat,`5`lima,`6`enam,`7`tujuh,`8`lapan,`9`sembilan,`10`sepuluh,`11`sebelas,`12`duabelas,`13`tigabelas,`14`empatbelas,`15`limabelas,`16`enambelas,`17`tujuhbelas,`18` lapanbelas,`19`sembilanbelas  from roster  rs join jabatan jb on rs.id_jabatan = jb.id  where BULAN != 'BULAN' and DEPARTEMEN = '".$depatemen."' and NAMA = '".$nama."'and JABATAN = '".$jabatan."'and BULAN like '".$bulan."'  order by created_at desc limit 1");
				dd($roster);
			return view('detail_roster',compact('data','roster'));
			}else{
				return redirect('/');
			}

		}
		public function jadwal(Request $request){
			return view('jadwal');

		}
		
		public function index(Request $request){
			//dd($request);
			if ($request->session()->get('nama') != null){
				
				//$data1 = DB::Select("Select id,nik_sap,nama,email,hp from karyawan");
					//dd($data1); 
			//	    if ($request->ajax()) {
					$id_user = session('id_user');

					$user = DB::Select("select id_karyawan from user where id =$id_user");
										$id_karyawan= $user[0]->id_karyawan;

					$departemen = DB::Select("select id_departemen from karyawan where id =$id_karyawan");
					$id_departemen= $departemen[0]->id_departemen;

					//dd($id_departemen);
					$jadwal = DB::select("select id from jadwal where id_departemen=$id_departemen");
					$jadwal = $jadwal[0]->id ;
					//dd($jadwal);
					$data1 = DB::Select("
Select k.id ,k.nama, k.nik_sap, jt.tanggal,jt.id_shift, 
case when jt.id_shift = 'DS' and  date_format( a.masuk , '%H:%i')  < s.jam_keluar  then 'valid'when jt.id_shift = 'NS' and  date_format( a.masuk , '%H:%i')  < s.jam_keluar then 'valid' else 'tidak valid' end as status  from jadwal_item jt
join karyawan k on jt.id_karyawan=k.id join rfid r on r.id_karyawan =k.id  left join absensi a
on DATE_FORMAT(a.masuk,'%Y-%m-%d')=jt.tanggal and a.rfid = r.rfid join shift s on s.id = jt.id_shift where  id_jadwal = $jadwal and k.id = $id_karyawan");
					//$data1 = karyawan::latest()->get();;
					
					
				//	dd($data1);
					return Datatables::of($data1)
							->addIndexColumn()
							->addColumn('action', function($row){
									//dd($row);
								  // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
									if ($row->status == "valid"){
									$btn = '<a href="#" class="edit btn btn-info btn-sm">Valid</a>' ;
									} else{
										$btn ='<a href="#" class="edit btn btn-danger btn-sm">Not Valid</a>';
									}	
									return $btn;
							})
							->rawColumns(['action'])
							->make(true);
			//		}
					
					
				//dd($data);
			return view('jadwal');
			}else{
				return redirect('/');
			}

		}
		
	
		
		public function import_excel(Request $request) 
		{
			// validasi
			//dd($request);
			$this->validate($request, [
				'file' => 'required|mimes:csv,xls,xlsx'
			]);
	 
			// menangkap file excel
		//	$file = $request->file('file');
	 
			// membuat nama file unik
			//$nama_file = $file->getClientOriginalName();
			//dd($nama_file);
			// upload ke folder  file_roster di dalam folder public
		//	$file->move( public_path('/file_roster/'.$nama_file));
			
				//$file->move('public/file_siswa/',$nama_file);
	$file = $request->file('file');
 
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
		$tujuan_upload = 'public/file_roster';
		$nama_file = $file->getClientOriginalName();
                // upload file
		$file->move($tujuan_upload,$nama_file);
	
	
	// import data
			Excel::import(new rosterimport, public_path('/file_roster/'.$nama_file));
			$id_user = session('id_user');
			$test = DB::select("select * from roster where id_user='$id_user'  order by created_at desc ");
			$BULAN=$test[0]->BULAN;
			$TAHUN=$test[0]->Tahun;
			$id_departemen=$test[0]->id_departemen;			  
			
			$extract = explode('-',$BULAN);
			$tgl_mulai 	= strtotime('21-'.$extract[0].'-'.$TAHUN);
			$tgl_mulai = date('Y-m-d',$tgl_mulai);
			$tgl_selesai = strtotime('20-'.$extract[1].'-'.$TAHUN);
			$tgl_selesai  = date('Y-m-d',$tgl_selesai);
				//		dd($tgl_selesai);
			
			//$month_num =12;
  
			// Use mktime() and date() function to
			// convert number to month name
			
			
			$month_name1 = date("F", mktime(0, 0, 0, (int)$extract[0], 10));
			$month_name2 = date("F", mktime(0, 0, 0, (int)$extract[1], 10));
			//dd($test[1]->BULAN );
			$concat = $month_name1.'-'.$month_name2.' '. $TAHUN;
			
			$check_jadwal = DB::select("select count(*)as total from jadwal where jadwal='$concat' and id_departemen = $id_departemen ");
			//dd($check_jadwal[0]->total);
			if ($check_jadwal[0]->total < 1){
			$insert =  DB::select("insert into jadwal (jadwal,berlaku_dari,berlaku_sampai, id_departemen)values('$concat', '$tgl_mulai','$tgl_selesai','$id_departemen') ");
			}
			
			//jadwal_item 
			$ambil_jadwal = DB::select("select * from jadwal where jadwal='$concat' and id_departemen = $id_departemen ");
			$id_jadwal = $ambil_jadwal[0]->id;
			$tgl_awal = $ambil_jadwal[0]->berlaku_dari;
			$insertroster = DB::select("call insert_tr_roster($id_user,'$id_departemen', $id_jadwal,'$tgl_awal')");
			
			//dd($test[0]->created_at);
			// notifikasi dengan session
			Session::flash('sukses','Data Roster Berhasil Diimport!');
	 
			// alihkan halaman kembali
			return redirect('/roster');
		}
}

