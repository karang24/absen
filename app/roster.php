<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Roster extends Model
{
    protected $table = "roster";
 
    protected $fillable = ['id_karyawan','no_id','nik_sap','nama','id_jabatan','id_departemen','departemen','BULAN','TAHUN','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','id_user'];
}
