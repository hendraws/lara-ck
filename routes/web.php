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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('/','HomeController@cek');
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('/manajemen-pengguna', 'UserController');
    Route::resource('/master/program-akademik', 'ProgramAkademikController');
});
Route::view('under-contruction', 'maintance');
