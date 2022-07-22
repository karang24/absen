<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//home
Route::any('/ceklogin', 'LoginController@proses');
Route::any('/home', 'LoginController@home');
Route::any('/logout', 'LoginController@logout');
//karyawan
Route::any('/karyawan/add', 'KaryawanController@insert');
Route::any('/karywan', 'KaryawanController@show');
Route::any('/data/karyawan/edit/{id}', 'KaryawanController@edit');
Route::delete('/data/karyawan/delete/{id}', 'KaryawanController@delete_karyawan');
Route::any('/proses/karyawan/edit', 'KaryawanController@proses_edit');
//Route::any('/data/departemen/get', 'KaryawanController@index')->name('data.user.get');

Route::get('users', ['uses'=>'KaryawanController@index', 'as'=>'users.index']);
//jabatan
Route::any('/jabatan', 'JabatanController@show');
Route::any('/data/jabatan/get', 'JabatanController@index')->name('data.jabatan.get');
Route::any('/data/jabatan/edit/{id}', 'JabatanController@edit');
Route::delete('/data/jabatan/delete/{id}', 'JabatanController@delete_jabatan');
Route::any('/proses/jabatan/edit', 'JabatanController@proses_edit');
Route::any('/jabatan/add', 'JabatanController@insert');

//departemen
Route::any('/departemen', 'DepartemenController@show');
Route::any('/data/departemen/edit/{id}', 'DepartemenController@edit');
Route::any('/proses/departemen/edit', 'DepartemenController@proses_edit');
Route::any('/data/departemen/get', 'DepartemenController@index')->name('data.departemen.get');
Route::any('/departemen/add', 'DepartemenController@insert');
Route::delete('/data/departemen/delete/{id}', 'DepartemenController@delete_departemen');

//roster
Route::any('/roster', 'rosterController@show');
Route::any('/detail_roster/{id}', 'rosterController@detail');
Route::any('/edit_roster/{id}', 'rosterController@view_edit');
Route::any('/roster/import_excel', 'rosterController@import_excel');
Route::get('/roster/export_excel', 'rosterController@export_excel');
Route::get('/jadwal', 'rosterController@jadwal');
Route::any('/data/jadwal/get', 'rosterController@index')->name('data.jadwal.get');

//helpsdesk
Route::any('/helpdesk', 'HelpdeskController@show');
Route::any('/helpdesk_progres', 'HelpdeskController@show_progres');
Route::any('/helpdesk/add', 'HelpdeskController@insert');
Route::any('/helpdesk/detail/{id}', 'HelpdeskController@detail');
Route::any('/proses/helpdesk/edit', 'HelpdeskController@proses_edit');

//rfid
Route::any('/rfid', 'RFIDController@show');
Route::any('/data/rfid/get', 'RFIDController@index')->name('data.rfid.get');
Route::any('/data/rfid/edit/{id}', 'RFIDController@edit');
Route::any('/proses/rfid/edit', 'RFIDController@proses_edit');
Route::delete('/data/rfid/delete/{id}', 'RFIDController@delete_rfid');

//absen
Route::any('/absen_harian', 'AbsenController@show');
Route::any('/data/absen/edit/{id}', 'AbsenController@edit');
Route::any('/proses/absen/edit', 'AbsenController@proses_edit');
Route::any('/data/absen/get', 'AbsenController@index')->name('data.absen.get');
Route::any('/absen/add', 'AbsenController@insert');
Route::delete('/data/absen/delete/{id}', 'AbsenController@delete_absen');
Route::any('/absen/download', 'AbsenController@download_harian');
Route::any('/absen_minggu', 'AbsenController@show_minggu');
Route::any('/data/absen_minggu/get', 'AbsenController@index_minggu')->name('data.absen_minggu.get');
Route::any('/sesion_tgl', 'AbsenController@session_tgl');


//user management
Route::any('/user', 'UserController@show');
Route::any('/user/add', 'UserController@proses');
Route::any('/data/user/delete/{id}', 'UserController@delete_user');
Route::any('/data/user_man/get', 'UserController@index')->name('data.penguna.get');
Route::any('/data/user/edit/{id}', 'UserController@edit');
Route::any('/proses/user/edit', 'UserController@proses_edit');

//role
Route::any('/role', 'RoleController@show');
Route::any('/role/add', 'RoleController@insert');
Route::any('/data/role/delete/{id}', 'RoleController@delete_role');
Route::any('/data/role/get', 'RoleController@index')->name('data.role.get');
Route::any('/data/role/edit/{id}', 'RoleController@edit');
Route::any('/proses/role/edit', 'RoleController@proses_edit');
//shift 

Route::any('/shift', 'ShiftController@show');
Route::any('/data/shift/get', 'ShiftController@index')->name('data.shift.get');
Route::any('/shift/add', 'ShiftController@insert');
Route::any('/data/shift/delete/{id}', 'ShiftController@delete_shift');


//GMS

Route::any('/gms', 'GmsController@show');
Route::any('/gms/take5_g', 'GmsController@take5_g');
Route::any('/gms/take5_m', 'GmsController@take5_m');
Route::any('/gms/take5_g_insert', 'GmsController@insert_g');
Route::any('/gms/take5_m_insert', 'GmsController@insert_m');
Route::any('/data/shift/delete/{id}', 'ShiftController@delete_shift');
