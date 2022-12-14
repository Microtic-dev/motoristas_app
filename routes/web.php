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

Route::get('/command',function(){
  $exitcode = Artisan::call('make:model Poxa');
});




Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/concluir', function () {
     if(Auth::user()->privilegio == 'empregador'){
       if(Auth::user()->active == 'desativado'){
           return redirect('/aguarde');
       }else{
          return redirect('/empregador');
       }
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



Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


//@TODO anyone
Route::get('/anuncio/{id}', [App\Http\Controllers\AnunciosController::class, 'verAnuncio'])->name('verAnuncio');
Route::get('/search', [App\Http\Controllers\AnunciosController::class, 'search'])->name('search');



// @TODO empregador
Route::post('/newempregador', [App\Http\Controllers\EmpregadorController::class, 'registarEmpregador'])->name('newempregador');
Route::get('/empregador', [App\Http\Controllers\EmpregadorController::class, 'index'])->name('empregador')->middleware('empregador');
Route::get('/empregador-perfil/{id}', [App\Http\Controllers\EmpregadorController::class, 'getEmpregador'])->name('empregador-perfil');
Route::post('/logotipo', [App\Http\Controllers\DocumentosController::class, 'fotoPerfil'])->name('fotoPerfil')->middleware('empregador');
Route::get('/documents/{id}', [App\Http\Controllers\EmpregadorController::class, 'documents'])->name('documents');
Route::post('/upload-documents', [App\Http\Controllers\DocumentosController::class, 'uploadAlldocuments'])->name('uploadAlldocuments');
Route::get('/aguarde', [App\Http\Controllers\EmpregadorController::class, 'aguarde'])->name('aguarde');

// @TODO empregador previlegios
Route::get('/procurar-motorista', [App\Http\Controllers\EmpregadorController::class, 'procurarMotorista'])->name('procurarMotorista')->middleware('empregador');
Route::get('/get-motorista', [App\Http\Controllers\EmpregadorController::class, 'getMotorista'])->name('getMotorista')->middleware('empregador');
Route::post('/criarAnuncio', [App\Http\Controllers\AnunciosController::class, 'criarAnuncio'])->name('criarAnuncio')->middleware('empregador');
Route::post('/editarAnuncio', [App\Http\Controllers\AnunciosController::class, 'editarAnuncio'])->name('editarAnuncio')->middleware('empregador');
Route::post('/apagarAnuncio/{id}', [App\Http\Controllers\AnunciosController::class, 'apagarAnuncio'])->name('apagarAnuncio')->middleware('bothCanSee');
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
//Route::post('/add-conhecimento', [App\Http\Controllers\ConhecimentosController::class, 'create'])->name('addConhecimento')->middleware('candidato');
Route::post('/add-experiencia', [App\Http\Controllers\ExperienciasController::class, 'create'])->name('addExperiencia')->middleware('candidato');
Route::post('/candidatar', [App\Http\Controllers\CandidaturasAnunciosController::class, 'create'])->name('candidatar')->middleware('candidato');
Route::get('/candidatura-espontanea', [App\Http\Controllers\CandidatoController::class, 'candidaturaEspontanea'])->name('candidatura-espontanea')->middleware('candidato');


//@TODO Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/bd-motoristas', [App\Http\Controllers\AdminController::class, 'motoristas'])->name('bd-motoristas')->middleware('admin');
Route::get('/bd-empregadores', [App\Http\Controllers\AdminController::class, 'empregadores'])->name('bd-empregadores')->middleware('admin');
Route::get('/perfil/{id}', [App\Http\Controllers\CandidatoController::class, 'perfil'])->name('perfil')->middleware('bothCanSee');
Route::post('/updateDenuncia', [App\Http\Controllers\CentralDeRiscoController::class, 'updateCentralDeRisco'])->name('updateDenuncia')->middleware('admin');
Route::get('/activeUser/{id}', [App\Http\Controllers\AdminController::class, 'activeEmpregador'])->name('activeUser')->middleware('admin');
Route::get('/desactiveUser/{id}', [App\Http\Controllers\AdminController::class, 'desativeEmpregador'])->name('desactiveUser')->middleware('admin');
Route::get('/sendAdminNotification/{id}', [App\Http\Controllers\AdminController::class, 'sendAdminNotification'])->name('sendAdminNotification');
Route::get('/inscricao-seguro', [App\Http\Controllers\AdminController::class, 'sendAdminNotification'])->name('sendAdminNotification');

//@TODO admin privilegios
Route::get('/premium',[App\Http\Controllers\premiumController::class,'getUsers'])->name('premium')->middleware('admin');
Route::post('/activarcontapremium',[App\Http\Controllers\premiumController::class,'activatePremium'])->name('activarcontapremium')->middleware('admin');
Route::post('/desativarpremiumconta',[App\Http\Controllers\premiumController::class,'desactivatePremium'])->name('desativarpremiumconta')->middleware('admin');
Route::get('/searchEmpresas',[App\Http\Controllers\premiumController::class,'search'])->name('searchEmpresas')->middleware('admin');
Route::post('/deleteCandidato/{id}',[App\Http\Controllers\CanditadoController::class,'deleteCandidato'])->name('deleteCandidato')->middleware('admin');
Route::get('/anuncios',[App\Http\Controllers\AdminController::class,'anuncios'])->name('anuncios')->middleware('admin');

//@TODO bothCanSee - Privilegios para admin e empregador
Route::get('/denuncia/{id}', [App\Http\Controllers\CentralDeRiscoController::class, 'denuncia'])->name('denuncia')->middleware('bothCanSee');
Route::get('/centralRisco', [App\Http\Controllers\CentralDeRiscoController::class, 'index'])->name('centralRisco')->middleware('bothCanSee');
Route::get('/searchDenuncias', [App\Http\Controllers\CentralDeRiscoController::class, 'search'])->name('searchDenuncias')->middleware('bothCanSee');


//@TODO cursos
Route::get('/cursos', [App\Http\Controllers\CursosController::class, 'getCursos'])->name('cursos');
Route::get('/cursoinfo', [App\Http\Controllers\CursosController::class, 'getCursoInfo'])->name('cursoinfo');
Route::get('/inscricao', [App\Http\Controllers\CursosController::class, 'inscricaoForm'])->name('inscricao');
Route::post('/submeter-inscricao', [App\Http\Controllers\CursosController::class, 'submeterInscricao'])->name('submeter-inscricao');

Route::get('/seguro', [App\Http\Controllers\CursosController::class, 'getSegurosInfo'])->name('seguro');
Route::get('/inscricaoSeguro', [App\Http\Controllers\CursosController::class, 'getSeguroForm'])->name('inscricaoSeguro');
Route::post('/submeter-seguro', [App\Http\Controllers\CursosController::class, 'submeterInscricaoSeguro'])->name('submeter-seguro');
