<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\HargaSatuanAlatController;
use App\Http\Controllers\HargaSatuanPekerjaController;
use App\Http\Controllers\JenisBahanController;
use App\Http\Controllers\AnalisaHargaSatuanController;
use App\Http\Controllers\AnalisaProyekController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
            return view('dashboard');});
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek_index');
    Route::get('/proyek/form-create', [ProyekController::class, 'create'])->name('proyek_create');
    Route::post('/proyek/store', [ProyekController::class, 'store'])->name('proyek_store');

    //setting harga satuan alat
    Route::get('/setting/harga-satuan-alat', [HargaSatuanAlatController::class, 'index'])->name('hsa_index');
    Route::get('/setting/harga-satuan-alat/loadTable', [HargaSatuanAlatController::class, 'loadTable'])->name('hsa_loadTable');
    
    //setting harga satuan pekerja
    Route::get('/setting/harga-satuan-pekerja', [HargaSatuanPekerjaController::class, 'index'])->name('hsp_index');
    Route::get('/setting/harga-satuan-pekerja/loadTable', [HargaSatuanPekerjaController::class, 'loadTable'])->name('hsp_loadTable');

    //setting jenis bahan
    Route::get('/setting/jenis-bahan', [JenisBahanController::class, 'index'])->name('jenis_bahan_index');
    Route::get('/setting/jenis-bahan/loadTable', [JenisBahanController::class, 'loadTable'])->name('jenis_bahan_loadTable');

    //setting bahan
    Route::get('/setting/bahan', [BahanController::class, 'index'])->name('bahan_index');
    Route::get('/setting/bahan/loadTable', [BahanController::class, 'loadTable'])->name('bahan_loadTable');

    //setting analisa pekerjaan
    Route::get('/setting/analisa-pekerjaan', [AnalisaHargaSatuanController::class, 'index'])->name('analisa_pekerjaan_index');
    Route::get('/setting/analisa-pekerjaan/form-create-analisa', [AnalisaHargaSatuanController::class, 'create'])->name('analisa_pekerjaan_create');
    Route::get('/setting/analisa-pekerjaan/loadTable', [AnalisaHargaSatuanController::class, 'loadTable'])->name('analisa_pekerjaan_loadTable');
    Route::get('/setting/analisa-pekerjaan/detil-analisa-pekerjaan/{id}', [AnalisaHargaSatuanController::class, 'detil'])->name('analisa_pekerjaan_detil');
    Route::get('/setting/analisa-pekerjaan/edit-analisa-pekerjaan/{id}', [AnalisaHargaSatuanController::class, 'edit'])->name('analisa_pekerjaan_edit');
    Route::get('/setting/analisa-pekerjaan/getPekerja', [AnalisaHargaSatuanController::class, 'getPekerja']);
    Route::get('/setting/analisa-pekerjaan/getBahan', [AnalisaHargaSatuanController::class, 'getBahan']);
    Route::get('/setting/analisa-pekerjaan/getAlat', [AnalisaHargaSatuanController::class, 'getAlat']);
    Route::post('/setting/analisa-pekerjaan/store', [AnalisaHargaSatuanController::class, 'store'])->name('analisa_pekerjaan_store');

    Route::get('/analisa/create/{id}',[AnalisaProyekController::class,'create'])->name('analisa_create');
});

require __DIR__.'/auth.php';
