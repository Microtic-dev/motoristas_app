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

// Route::get('/bro', function () {
//     return view('login');
// });

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\InicioController::class, 'index'])->name('index');
Route::get('/anuncio', [App\Http\Controllers\InicioController::class, 'anuncio'])->name('anuncio');

Route::get('/bd-motoristas', [App\Http\Controllers\AdminController::class, 'index'])->name('bd-motoristas');

Route::get('/perfil/{id}', [App\Http\Controllers\MotoristaController::class, 'perfil'])->name('perfil');
