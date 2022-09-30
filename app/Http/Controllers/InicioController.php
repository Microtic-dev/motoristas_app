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
      $categorias = DB::table('categorias')->get();
      $provincias = DB::table('provincias')->get();

      $anuncios = DB::table('anuncios')
          //    ->join('recrutadores', 'anuncios.user_id', '=', 'recrutadores.id')
              ->join('users', 'anuncios.user_id', '=', 'users.id')
              ->select('anuncios.*', 'users.name as recrutador')
              ->orderBy('created_at', 'DESC')
              ->paginate(10);



       return view('index',  compact('provincias' ,'categorias', 'anuncios'));
    }


    public function search($query,$categor)
    {
      $categorias = DB::table('categorias')->get();
      $provincias = DB::table('provincias')->get();

      $anuncios = DB::table('anuncios')
          //    ->join('recrutadores', 'anuncios.user_id', '=', 'recrutadores.id')
              ->join('users', 'anuncios.user_id', '=', 'users.id')
              ->select('anuncios.*', 'users.name as recrutador')
              ->orderBy('created_at', 'DESC')
              ->paginate(10);

      // $arraySearch[];
      //
      // foreach ($anuncios as $value) {
      //     if($value)
      // }



       return view('index',  compact('provincias' ,'categorias', 'anuncios'));
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
