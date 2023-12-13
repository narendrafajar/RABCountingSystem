<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyekController;

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
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek_index');
    Route::get('/proyek/form-create', [ProyekController::class, 'create'])->name('proyek_create');
    Route::post('/proyek/store', [ProyekController::class, 'store'])->name('proyek_store');
});

require __DIR__.'/auth.php';
