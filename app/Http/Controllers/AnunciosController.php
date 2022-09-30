<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Anuncios;
use App\Models\Categorias;
use App\Models\Anuncios_provincias;
use Auth;

class AnunciosController extends Controller
{
  public function criarAnuncio(Request $request)
  {
    if(empty($request->provincias)) {
      return redirect()->back()->with('erro', 'Ocorreu erro, Preenche todos campos obrigatorios!');
    }else {

      $anuncio = new Anuncios;
      $anuncio->titulo = $request->titulo;
      $anuncio->user_id = Auth::user()->id;
      $anuncio->validade = $request->validade;
      $anuncio->descricao = $request->descricao;
      $anuncio->forma_de_candidatura = $request->forma_de_candidatura;
      $anuncio->categoria_id = $request->categoria_id;
      $anuncio->estado_anuncio = 'Publicado';

       if ($anuncio->save()) {
        foreach ($request->provincias as $key => $provincia) {
          $anuncio_provincia = new Anuncios_provincias;
          $anuncio_provincia->anuncio_id = $anuncio->id;
          $anuncio_provincia->provincia_id = $provincia;
          $anuncio_provincia->save();
        }

           return redirect()->back()->with('success', 'Anúncio publicado com sucesso!');
       } else {
           return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
       }
    }

}

public function verAnuncio($id){

  $categorias = DB::table('categorias')->get();
  $provincias = DB::table('provincias')->get();
  $anuncios_provincias = DB::table('anuncios_provincias')->get();

    $anuncio = DB::table('anuncios')
              ->join('anuncios_provincias','anuncios.id', 'anuncios_provincias.anuncio_id')
              ->join('provincias','anuncios_provincias.provincia_id','provincias.id')
              ->join('categorias','anuncios.categoria_id','categorias.id')
              ->where('anuncios.id',$id)
              ->select('anuncios.*','provincias.name as provincia','categorias.categoria as categoria')
              ->first();
    return view('anuncio', compact('anuncio','provincias' ,'categorias','anuncios_provincias'));

}

}
