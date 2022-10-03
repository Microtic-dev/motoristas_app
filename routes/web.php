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


// Route::get('/bro', function () {
//     return view('login');
// });

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

//auth
Auth::routes();

Route::get('/ ', [App\Http\Controllers\InicioController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::post('/criarAnuncio', [App\Http\Controllers\AnunciosController::class, 'criarAnuncio'])->name('criarAnuncio');
Route::get('/anuncio/{id}', [App\Http\Controllers\AnunciosController::class, 'verAnuncio'])->name('verAnuncio');
Route::get('/search', [App\Http\Controllers\AnunciosController::class, 'search'])->name('search');

Route::get('/bd-motoristas', [App\Http\Controllers\AdminController::class, 'index'])->name('bd-motoristas');
Route::get('/centralRisco', [App\Http\Controllers\AdminController::class, 'index'])->name('bd-motoristas');
Route::get('/perfil/{id}', [App\Http\Controllers\MotoristaController::class, 'perfil'])->name('perfil');
//Route::get('/login2', [App\Http\Controllers\CanditadoController::class, 'login'])->name('login');

Route::get('/empregador', [App\Http\Controllers\EmpregadorController::class, 'index'])->name('empregador');
