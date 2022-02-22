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
Route::view('display','layout/master');
Route::view('admin','layout/admin');
Route::view('resepsionis','layout/resepsionis');
Route::view('tamu','layout/tamu');
Route::view('kamar','tamu/kamar');
Route::view('fasilitas','tamu/fasilitas');

Route::resource('admins', AdminController::class);