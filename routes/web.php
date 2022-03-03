<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::view('display','layout/master');
Route::view('resepsionis','layout/resepsionis');
// Route::view('tamu','layout/tamu');
Route::get('/tamu', [ReservasiController::class, 'create'])->name('reservasi.create');
Route::post('/tamu', [ReservasiController::class, 'store'])->name('reservasi.store');
Route::view('kamar','tamu/kamar');
Route::view('fasilitas','tamu/fasilitas');
Route::view('displayadmin','admin/index');
Route::view('adminkamar','admin_kamar/create');
Route::view('adminkamar2','admin_kamar/index');
Route::view('adminfasilitaskamar','admin_fasilitas_kamar/index');
Route::view('adminfasilitashotel','admin_fasilitas_hotel/index');
Route::get('/bukti/{id}', [ReservasiController::class, 'bukti'])->name('reservasi.bukti');
// Route::get('/arsip/inbox/filter','ArsipController@inboxFilter')->name('inbox.filter'); //filtering by date
// Route::get('/search', [UserController::class, 'search'])->name('search'); //filtering by name

Route::resource('/users', UserController::class);
// Route::resource('admin_kamar', KamarController::class);
Route::resource('fasilitas_kamar', FasilitasKamarController::class);
Route::resource('fasilitas_hotel', FasilitasHotelController::class);
Route::resource('resepsionis_kamar', ReservasiController::class);
Route::resource('resepsionis_hotel', ResepsionisController::class);

Route::middleware('auth')->group(function () { 
    Route::view('admin','layout/admin');
    Route::resource('admin_kamar', KamarController::class);
    });
