<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidaturas_anuncios;
use Illuminate\Support\Facades\DB;
use Auth;

class CandidaturasAnunciosController extends Controller
{
  public function create(Request $request)
  {
    $candidatura = new Candidaturas_anuncios;
    $candidatura->user_id = Auth::user()->id;
    $candidatura->anuncio_id = $request->anuncio_id;

      if ($candidatura->save()) {
          return redirect()->back()->with('success', 'Candidatura enviada com sucesso!');
      } else {
          return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
      }
  }

}
