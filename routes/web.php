<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KonfigurasiController;

Route::middleware(['guest:karyawan'])->group(function () {
    Route::get('/', function () {
        return view('auth/login');
    })->name('login');
    Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
});

Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', function () {
        return view('auth/loginadmin');
    })->name('login');
});



Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/proseslogout', [AuthController::class, 'proseslogout']);

    Route::get('/presensi/create', [PresensiController::class, 'create']);
    Route::post('/presensi/store', [PresensiController::class, 'store']);
});


Route::post('/prosesloginadmin', [AuthController::class, 'prosesloginadmin']);


//Edit Profile
Route::get('/editprofile', [PresensiController::class, 'editprofile']);
Route::post('/presensi/{nik}/updateprofile', [PresensiController::class, 'updateprofile']);

//Histori
Route::get('/histori', [PresensiController::class, 'histori']);
Route::post('/gethistori', [PresensiController::class, 'gethistori']);


//izin
Route::get('/presensi/izin', [PresensiController::class, 'izin']);
Route::get('/presensi/buatizin', [PresensiController::class, 'buatizin']);
Route::post('/presensi/storeizin', [PresensiController::class, 'storeizin']);

Route::middleware(['auth:user'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboardadmin', [DashboardController::class, 'admin']);
    //Karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::post('/karyawan/store', [KaryawanController::class, 'store']);
    Route::post('/karyawan/edit', [KaryawanController::class, 'edit']);
    Route::post('/karyawan/{nik}/update', [KaryawanController::class, 'update']);
    Route::post('/karyawan/{nik}/delete', [KaryawanController::class, 'delete']);


    //lokasi kantor
    Route::get('/cabang', [CabangController::class, 'cabang']);
    Route::post('/cabang/store', [CabangController::class, 'store']);
    Route::post('/cabang/edit', [CabangController::class, 'edit']);
    Route::post('/cabang/{nik}/update', [CabangController::class, 'update']);
    Route::post('/cabang/{nik}/delete', [CabangController::class, 'delete']);

    //departemen / Kecamatan
    Route::get('/departemen', [DepartemenController::class, 'index']);
    Route::post('/departemen/store', [DepartemenController::class, 'store']);
    Route::post('/departemen/edit', [DepartemenController::class, 'edit']);
    Route::post('/departemen/{nik}/update', [DepartemenController::class, 'update']);
    Route::post('/departemen/{nik}/delete', [DepartemenController::class, 'delete']);

    //monitoring
    Route::get('/presensi/monitoring', [PresensiController::class, 'monitoring']);
    Route::post('/getpresensi', [PresensiController::class, 'getpresensi']);

    Route::get('/presensi/laporan', [PresensiController::class, 'laporan']);
    Route::post('/presensi/cetaklaporan', [PresensiController::class, 'cetaklaporan']);

    Route::get('/presensi/rekap', [PresensiController::class, 'rekap']);
    Route::post('/presensi/cetakrekap', [PresensiController::class, 'cetakrekap']);

    //lokasi kantor
    Route::get('/konfigurasi/kantor', [KonfigurasiController::class, 'lokasikantor']);
    Route::post('/konfigurasi/updatelokasi', [KonfigurasiController::class, 'updatelokasi']);
});