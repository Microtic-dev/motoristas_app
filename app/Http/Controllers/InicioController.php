<?php

namespace App\Http\Controllers;
use App\Models\Provincias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class InicioController extends Controller
{


    public function index()
    {
      $provincias = DB::table('provincias')->get();
       return view('index', array( 'provincias' => $provincias ));
    }


    public function login($tipoDeUsuario){

      $tipo = $tipoDeUsuario;
      return view('login',  array('tipo' => $tipoDeUsuario));
    }

    public function anuncio()
    {
       // $anuncios = DB::table('anuncios')
       //     //    ->join('recrutadores', 'anuncios.user_id', '=', 'recrutadores.id')
       //         ->join('users', 'anuncios.user_id', '=', 'users.id')
       //         ->select('anuncios.*', 'users.name as recrutador')
       //         ->orderBy('created_at', 'DESC')
       //         ->paginate(10);

       return view('anuncio');
    }




}
