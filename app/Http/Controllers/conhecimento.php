<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class conhecimento extends Controller
{
  * @return \Illuminate\Http\Response
  */
  public function create(Request $request)
  {
    $conhecimento = new Conhecimentos;
    $conhecimento->conhecimento = $request->conhecimento;
    $conhecimento->candidato_id = $request->candidato_id;

      if ($conhecimento->save()) {
          return redirect()->back()->with('success', 'Conhecimento ou Habilidades adicionada com sucesso!');
      } else {
          return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
      }
  }

}
