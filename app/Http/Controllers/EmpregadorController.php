<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincias;
use App\Models\categorias;
use App\Models\Anuncios;
use Illuminate\Support\Facades\DB;
use Auth;

class EmpregadorController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {

    $categorias = Categorias::all();
    $provincias = Provincias::all();
     $anuncios = DB::table('anuncios')
         //    ->join('recrutadores', 'anuncios.user_id', '=', 'recrutadores.id')
             ->join('users', 'anuncios.user_id', '=', 'users.id')
             ->select('anuncios.*', 'users.name as recrutador')
             ->orderBy('created_at', 'DESC')
             ->paginate(10);

     return view('empregador.index', array( 'anuncios' => $anuncios, 'categorias' => $categorias, 'provincias' => $provincias ));
  }

  public function procurarMotorista(Request $request)
  {
     $motorista = DB::table('users')
             ->where('users.name', $request->keyword)
             ->orWhere('users.name', 'like', '%' . $request->keyword . '%')
             ->where('users.privilegio', 'candidato')
             ->get();

         if (!empty($motorista)) {
             return response(['msg' => $motorista]);
         } else {
             return response(['msg' => 'Ocorreu erro, tenta novamente!', 'error' => '500']);
         }
  }

  public function getMotorista(Request $request)
  {
     $motorista = DB::table('candidatos')
             ->where('candidatos.user_id', $request->id)
             ->where('users.privilegio', 'candidato')
             ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
             ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
             ->join('users', 'candidatos.user_id', '=', 'users.id')
             ->select('candidatos.*', 'users.name as nome', 'users.email as email', 'users.privilegio as privilegio',
              'provincias.name as provincia', 'users.celular as celular',
             'categorias.categoria as categoria')
             ->first();

         if (!empty($motorista)) {
             return response(['msg' => $motorista]);
         } else {
             return response(['msg' => 'Ocorreu erro, tenta novamente!', 'error' => '500']);
         }
  }



  // public function criarAnuncio(Request $request){
  //
  //       $anuncio = new Anuncios();
  //
  //       $anuncio -> titulo = $request->titulo;
  //       $anuncio -> user_id = $request-> user_id;
  //       $anuncio -> validade = $request->validade;
  //       $anuncio -> descricao = $request->descricao;
  //       $anuncio -> estado_anuncio = "Disponivel";
  //       $anuncio -> forma_de_candidatura = $request->forma_de_candidatura;
  //       $anuncio -> categoria_id = $request->categoria_id;
  //
  //       if($anuncio->save()){
  //            return redirect()->back()->with('success','Formulario Preenchido');
  //       }else{
  //            return redirect()->back()->with('error','Ocorrou um erro, tente novamente');
  //       }
  // }
}
