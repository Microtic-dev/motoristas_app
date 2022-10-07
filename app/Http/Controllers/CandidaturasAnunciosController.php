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


  public function verCandidatosDeUmAnuncio($anuncioId)
  {


    $candidaturas = DB::table('candidaturas_anuncios')
                  ->where('candidaturas_anuncios.anuncio_id',$anuncioId)
                  ->join('users','candidaturas_anuncios.user_id','=','users.id')
                  ->join('candidatos','candidatos.user_id','=','users.id')
                  ->join('provincias','provincias.id','=','candidatos.provincia_id')
                  ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
                  ->select('candidaturas_anuncios.*','candidatos.nacionalidade as nacionalidade','users.name as nome','users.celular as celular','categorias.categoria as categoria', 'provincias.name as provincia')
                  ->orderBy('id', 'DESC')
                  ->get();

    return view('empregador.candidaturas',compact('candidaturas'));
  }




}
