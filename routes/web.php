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
Route::get('/home', function () {
    return redirect('/');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/concluir', function () {
     if(Auth::user()->privilegio == 'empregador'){
        return redirect('/empregador');
     }elseif (Auth::user()->privilegio == 'candidato') {
       return redirect('/candidato');
     }elseif (Auth::user()->privilegio == 'admin') {
       return redirect('/admin');
     }
     return redirect('/');
});


//auth
Auth::routes();
Route::get('/test', function (){
  return view('test');
});
Route::get('/ ', [App\Http\Controllers\InicioController::class, 'index'])->name('index');


//@TODO anyone
Route::get('/anuncio/{id}', [App\Http\Controllers\AnunciosController::class, 'verAnuncio'])->name('verAnuncio');
Route::get('/search', [App\Http\Controllers\AnunciosController::class, 'search'])->name('search');


// @TODO empregador
Route::post('/newempregador', [App\Http\Controllers\EmpregadorController::class, 'registarEmpregador'])->name('newempregador');
Route::get('/empregador', [App\Http\Controllers\EmpregadorController::class, 'index'])->name('empregador')->middleware('bothCanSee');
Route::post('/logotipo', [App\Http\Controllers\DocumentosController::class, 'fotoPerfil'])->name('fotoPerfil')->middleware('empregador');


// @TODO empregador previlegios
Route::get('/procurar-motorista', [App\Http\Controllers\EmpregadorController::class, 'procurarMotorista'])->name('procurarMotorista')->middleware('empregador');
Route::get('/get-motorista', [App\Http\Controllers\EmpregadorController::class, 'getMotorista'])->name('getMotorista')->middleware('empregador');
Route::post('/criarAnuncio', [App\Http\Controllers\AnunciosController::class, 'criarAnuncio'])->name('criarAnuncio')->middleware('empregador');
Route::post('/editarAnuncio', [App\Http\Controllers\AnunciosController::class, 'editarAnuncio'])->name('editarAnuncio')->middleware('empregador');
Route::post('/apagarAnuncio/{id}', [App\Http\Controllers\AnunciosController::class, 'apagarAnuncio'])->name('apagarAnuncio')->middleware('empregador');
Route::get('/candidatos-anuncio/{anuncioId}', [App\Http\Controllers\CandidaturasAnunciosController::class, 'verCandidatosDeUmAnuncio'])->name('verCandidatosDeUmAnuncio')->middleware('empregador');
Route::post('/denunciarMotorista', [App\Http\Controllers\CentralDeRiscoController::class, 'create'])->name('denunciar')->middleware('empregador');


//@ TODO Candidatos
Route::post('/new-candidato', [App\Http\Controllers\CandidatoController::class, 'novo'])->name('newCandidato');
Route::get('/candidato', [App\Http\Controllers\CandidatoController::class, 'index'])->name('candidato')->middleware('candidato');


//@ TODO privilegio candidato
Route::get('/meu-cv', [App\Http\Controllers\CandidatoController::class, 'cv'])->name('meuCv');
Route::post('/add-idioma', [App\Http\Controllers\IdiomasController::class, 'create'])->name('addIdioma')->middleware('candidato');
Route::post('/add-documento', [App\Http\Controllers\DocumentosController::class, 'create'])->name('addDocumento')->middleware('candidato');
Route::post('/fotoPerfil', [App\Http\Controllers\DocumentosController::class, 'fotoPerfil'])->name('fotoPerfil')->middleware('candidato');
Route::post('/add-conhecimento', [App\Http\Controllers\ConhecimentosController::class, 'create'])->name('addConhecimento')->middleware('candidato');
Route::post('/add-experiencia', [App\Http\Controllers\ExperienciasController::class, 'create'])->name('addExperiencia')->middleware('candidato');
Route::post('/candidatar', [App\Http\Controllers\CandidaturasAnunciosController::class, 'create'])->name('candidatar')->middleware('candidato');
Route::get('/candidatura-espontanea', [App\Http\Controllers\CandidatoController::class, 'candidaturaEspontanea'])->name('candidatura-espontanea')->middleware('candidato');


//@TODO Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/bd-motoristas', [App\Http\Controllers\AdminController::class, 'motoristas'])->name('bd-motoristas')->middleware('admin');
Route::get('/bd-empregadores', [App\Http\Controllers\AdminController::class, 'empregadores'])->name('bd-empregadores')->middleware('admin');
Route::get('/perfil/{id}', [App\Http\Controllers\CandidatoController::class, 'perfil'])->name('perfil')->middleware('bothCanSee');
Route::post('/updateDenuncia', [App\Http\Controllers\CentralDeRiscoController::class, 'updateCentralDeRisco'])->name('updateDenuncia')->middleware('admin');


//@TODO admin privilegios
Route::get('/premium',[App\Http\Controllers\premiumController::class,'getUsers'])->name('premium')->middleware('admin');
Route::post('/activarcontapremium',[App\Http\Controllers\premiumController::class,'activatePremium'])->name('activarcontapremium')->middleware('admin');
Route::post('/desativarpremiumconta',[App\Http\Controllers\premiumController::class,'desactivatePremium'])->name('desativarpremiumconta')->middleware('admin');
Route::get('/searchEmpresas',[App\Http\Controllers\premiumController::class,'search'])->name('searchEmpresas')->middleware('admin');


//@TODO bothCanSee - Privilegios para admin e empregador
Route::get('/denuncia/{id}', [App\Http\Controllers\CentralDeRiscoController::class, 'denuncia'])->name('denuncia')->middleware('bothCanSee');
Route::get('/centralRisco', [App\Http\Controllers\CentralDeRiscoController::class, 'index'])->name('centralRisco')->middleware('bothCanSee');
Route::get('/searchDenuncias', [App\Http\Controllers\CentralDeRiscoController::class, 'search'])->name('searchDenuncias')->middleware('bothCanSee');
