<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnunciosController extends Controller
{
  public function create(Request $request)
  {
    if(empty($request->provincias)) {
      return redirect()->back()->with('erro', 'Ocorreu erro, Preenche todos campos obrigatorios!');
    }else {

      $anuncio = new Anuncios;
      $anuncio->titulo = $request->titulo;
      $anuncio->user_id = Auth::user()->id;
      $anuncio->validade = $request->validade;
      $anuncio->descricao = $request->descricao;
      $anuncio->estado_anuncio = $request->estado_anuncio;
      $anuncio->forma_de_candidatura = $request->forma_de_candidatura;
      $anuncio->tipo_de_anuncio = $request->tipo_de_anuncio;
      $anuncio->categoria_id = $request->categoria_id;
      $anuncio->estado_anuncio = 'Publicado';

       if ($anuncio->save()) {
        foreach ($request->provincias as $key => $provincia) {
          $anuncio_provincia = new Provincias;
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
