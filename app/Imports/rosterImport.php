<?php

namespace App\Imports;

use App\roster;
use Maatwebsite\Excel\Concerns\ToModel;

class rosterImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new roster([
            //
			'id_karyawan'=> $row[0],
			'no_id'=> $row[1],
			'nik_sap'=> $row[2],
			'nama'=> $row[3],
			'id_departemen'=> $row[4] ,
			'id_jabatan'=>$row[5] ,
			'departemen'=>$row[6] ,
			'TAHUN'=>$row[8] ,
			'21'=> $row[9],
			'22'=> $row[10],
			'23'=> $row[11],
			'24'=> $row[12],
			'25'=> $row[13],
			'26'=> $row[14],
			'27'=> $row[15],
			'28'=> $row[16],
			'29'=> $row[17],
			'30'=> $row[18],
			'31' =>$row[19],
			'1'=>$row[20] ,
			'2'=>$row[21],
			'3'=>$row[22] ,
			'4'=>$row[23],
			'5'=>$row[24] ,
			'6'=>$row[25] ,
			'7'=>$row[26] ,
			'8'=>$row[27] ,
			'9'=>$row[28] ,
			'10'=>$row[39] ,
			'11'=>$row[30] ,
			'12'=>$row[31] ,
			'13'=>$row[32] ,
			'14'=>$row[33] ,
			'15'=>$row[34] ,
			'16'=>$row[35] ,
			'17'=>$row[36] ,
			'18'=>$row[37] ,
			'19'=>$row[38] ,
			'20'=> $row[39],
			'BULAN'=>$row[40] ,
			'id_user'=>$row[41] ,
        ]);
		
		
    }
}
