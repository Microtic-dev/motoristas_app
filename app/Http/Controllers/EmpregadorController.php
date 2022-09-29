<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincias;
use App\Models\categorias;
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
}
