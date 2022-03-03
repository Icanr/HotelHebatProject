  <!-- <form action="{{ route('admin_kamar.destroy',$kamars->id) }}" method="POST">
                
                    <a class="btn btn-primary" href="{{ route('admin_kamar.edit',$kamars->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
             </td> -->


             <!-- ini routing sblm pake auth

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ResepsionisController;

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
Route::view('displayadmin','admin/index');
Route::view('adminkamar','admin_kamar/create');
Route::view('adminkamar2','admin_kamar/index');
Route::view('adminfasilitaskamar','admin_fasilitas_kamar/index');
Route::view('adminfasilitashotel','admin_fasilitas_hotel/index');

Route::resource('admins', AdminController::class);
Route::resource('admin_kamar', KamarController::class);
Route::resource('fasilitas_kamar', FasilitasKamarController::class);
Route::resource('fasilitas_hotel', FasilitasHotelController::class);
Route::resource('resepsionis_kamar', ReservasiController::class);
Route::resource('resepsionis_hotel', ResepsionisController::class);
-->