<?php


use App\Models\Siswa;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Models\Kelas;

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


Route::get('kelas', function () {
    dd(Kelas::with('siswa')->get()->toArray());
});




// Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
// Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
// Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
// Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
// Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
// Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
// Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
