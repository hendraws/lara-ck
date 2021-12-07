<?php

use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@cek');

    Route::group(['middleware' => ['role:super-admin|administrator']], function () {
        Route::get('/dashboard', 'HomeController@index')->name('home');
        Route::resource('/manajemen-pengguna', 'UserController');
        Route::PUT('/manajemen-pengguna/{manajemen_pengguna}/aktifkan-akun', 'UserController@aktifkanAkun');
        Route::resource('/master/program-akademik', 'ProgramAkademikController');
        Route::resource('/master/kelas', 'KelasController');
        Route::resource('/master/matapelajaran', 'MataPelajaranController');
        Route::resource('/soal', 'SoalController');
        Route::resource('/pengaturan-ujian', 'UjianController');
        Route::resource('/matapelajaran-ujian', 'UjianMataPelajaranController');
        Route::resource('/matapelajaran-ujian-soal', 'UjianSoalController');
    });

    Route::group(['middleware' => ['role:siswa']], function () {
        Route::post('/edit-profile/update', 'SiswaController@updateProfile');
        Route::get('/edit-profile', 'SiswaController@editProfile');
        Route::get('/ruang-ujian', 'UjianController@ruangUjian');
        Route::post('/ujian', 'UjianController@ujianSiswa');
    });
});

Route::view('under-contruction', 'maintance');
Route::get('reboot', function () {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
});
Route::get('migrate', function () {
    Artisan::call('migrate');
});
