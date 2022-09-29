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

  public function criarAnuncio(Request $request){

        $anuncio = new Anuncios();

        $anuncio -> titulo = $request->titulo;
        $anuncio -> user_id = $request-> user_id;
        $anuncio -> validade = $request->validade;
        $anuncio -> descricao = $request->descricao;
          $anuncio -> qualificacoes = $request->qualificacoes;
        $anuncio -> estado_anuncio = "Disponivel";
        $anuncio -> forma_de_candidatura = $request->forma_de_candidatura;
        $anuncio -> tipo_de_anuncio = $request -> tipo_de_anuncio;
        $anuncio -> categoria_id = $request->categoria_id;

        if($anuncio->save()){
             return redirect()->back()->with('success','Formulario Preenchido');
        }else{
             return redirect()->back()->with('error','Ocorrou um erro, tente novamente');
        }
  }
}
