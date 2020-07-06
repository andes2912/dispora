<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ADMIN
    // Data Pegawai
    Route::resource('pegawai','Admin\PegawaiController');

    // Absen Pegawai
    Route::resource('absen','Admin\AbsenController');

    // Pangkar Pegawai
    Route::resource('pangkat','Admin\PangkatController');
    Route::get('select-nama-pangkat','Admin\PangkatController@select_nama_pangkat');

    // Cuti Pegawai
    Route::resource('cuti','Admin\CutiController');

    // Gaji Pegawai
    Route::resource('gaji','Admin\GajiController');
    Route::get('select-nama-gaji','Admin\GajiController@select_nama_gaji');
    Route::get('select-id-gaji','Admin\GajiController@select_id_gaji');

    // Mutasi Pegawai
    Route::resource('mutasi','Admin\MutasiController');
    Route::get('select-nama-mutasi','Admin\MutasiController@select_nama_mutasi');
    Route::get('select-jabatan-mutasi','Admin\MutasiController@select_jabatan_mutasi');
    Route::get('select-id-mutasi','Admin\MutasiController@select_id_mutasi');

    // Pensiun Pegawai
    Route::resource('pensiun','Admin\PensiunController');
    Route::get('select-id-pensiun','Admin\PensiunController@select_id_pensiun');
    Route::get('select-nama-pensiun','Admin\PensiunController@select_nama_pensiun');
    Route::get('select-golongan-pensiun','Admin\PensiunController@select_golongan_pensiun');
    Route::get('select-kelas-pensiun','Admin\PensiunController@select_kelas_pensiun');
    Route::get('select-kedudukan-pensiun','Admin\PensiunController@select_kedudukan_pensiun');
    Route::get('select-gaji-pensiun','Admin\PensiunController@select_gaji_pensiun');
    Route::get('select-tunjangan-pensiun','Admin\PensiunController@select_tunjangan_pensiun');

// PEGAWAI
    // Absensi
    Route::resource('absensi','Pegawai\AbsenPegawaiController');
    Route::get('absensi-keluar','Pegawai\AbsenPegawaiController@keluar');
    Route::resource('cuti-pegawai','Pegawai\CutiPegawaiController');
    Route::get('nama-approval-cuti','Pegawai\CutiPegawaiController@nama_approval_cuti');