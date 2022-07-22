<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Jadwal extends Model
{
    protected $table = "jadwal";
 
    protected $fillable = ['jadwal','berlaku_dari','berlaku_sampai'];
	
}
