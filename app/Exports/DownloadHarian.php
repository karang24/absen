<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Session;

class DownloadHarian implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

	 public function view(): View
    {
		$id_role =session('id_role');
		$tgl = session('tgl');

		//dd($tgl);
		if ($id_role == 1){
		$format = DB::select("select  ab.*,k.nama,k.no_id,nik_sap ,j.jabatan , d.departemen   from absensi ab join rfid r on ab.rfid  = r.rfid  join karyawan k  on r.id_karyawan = k.id   join jabatan j on k.id_jabatan = j.id  join departemen d  on k.id_departemen = d.id  where date_format(masuk, '%Y-%m-%d') ='$tgl'");
		//dd($format);
		}else{
				$nama = session('nama');
				
		$format = DB::select("select  ab.*,k.nama ,k.no_id,nik_sap ,j.jabatan , d.departemen   from absensi ab join rfid r on ab.rfid  = r.rfid  join karyawan k  on r.id_karyawan = k.id   join jabatan j on k.id_jabatan = j.id  join departemen d  on k.id_departemen = d.id  where date_format(masuk, '%Y-%m-%d') ='$tgl'");
		}
		//dd($format);
        return view('download_absen_harian', compact('format'));
    }
}