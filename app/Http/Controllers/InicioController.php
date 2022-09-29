<?php

namespace App\Http\Controllers;
use App\Models\Provincias;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //

    public function index()
    {
       return view('index');
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
