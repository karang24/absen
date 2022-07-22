<?php

namespace App\Exports;

use App\karyawan;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Session;

class ExportFormat implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

	 public function view(): View
    {
		$id_role =session('id_role');
		//dd($id_role);
		if ($id_role == 1){
		$format = DB::select("select k.id as id_karyawan, no_id , nik_sap , nama ,id_departemen ,id_jabatan  ,d.departemen,'-' as '20','-' as '21','-' as '22','-' as '23','-' as '24','-' as '25','-' as '26','-' as '27',
'-' as '28','-' as '29','-' as '30','-' as '31','-' as '1','-' as '2','-' as '3','-' as '4','-' as '5','-' as '6','-' as '7','-' as '8','-' as '9','-' as '10' 
,'-' as '`1','-' as '12','-' as '13','-' as '14','-' as '15','-' as '16','-' as '17','-' as '18','-' as '19', '-' as BULAN from karyawan k join departemen d on k.id_departemen = d.id  order by id_departemen ");
		}else{
				$nama = session('nama');
				$checkdep =  DB::Select("select k.id_departemen from karyawan k join user u on k.id=u.id_karyawan where u.nama = '$nama'");	
				$id_dep = $checkdep[0]->id_departemen;
		$format = DB::select("select k.id as id_karyawan, no_id , nik_sap , nama ,id_departemen ,id_jabatan  ,d.departemen,'-' as '20','-' as '21','-' as '22','-' as '23','-' as '24','-' as '25','-' as '26','-' as '27',
'-' as '28','-' as '29','-' as '30','-' as '31','-' as '1','-' as '2','-' as '3','-' as '4','-' as '5','-' as '6','-' as '7','-' as '8','-' as '9','-' as '10'
,'-' as '`1','-' as '12','-' as '13','-' as '14','-' as '15','-' as '16','-' as '17','-' as '18','-' as '19', '-' as BULAN from karyawan k join departemen d on k.id_departemen = d.id where d.id = '$id_dep '  order by id_departemen ");
		}
        return view('export', compact('format'));
    }
}