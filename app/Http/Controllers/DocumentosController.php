<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentos;
use App\Models\Candidatos;
use App\Models\fotoUrl;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class DocumentosController extends Controller
{
  public function create(Request $request)
  {
    $documento = $request->file('documento');

    $documentoName = time() . '-' . $request->tipo . '.' . $documento->getClientOriginalExtension();
    $upload_success = $documento->move(public_path('uploads'), $documentoName);

    $novoDocumento = new Documentos;
    $novoDocumento->candidato_id = $request->candidato_id;
    $novoDocumento->tipo = $request->tipo;
    $novoDocumento->ficheiro = 'uploads/' . $documentoName; //endereco do file no servidor

    if ($upload_success) {
        if ($novoDocumento->save()) {
            $candidato= Candidatos::find($request->candidato_id);
            $candidato->cv = $novoDocumento->ficheiro;
            $candidato->update();
            return redirect()->back()->with(array('success' => 'Documento adicionado com sucesso!'));
        } else {
            return redirect()->back()->with(array('erro' => 'Ocorreu um erro, tenta novamente!'));
        }

    } else {
        return redirect()->back()->with(array('erro' => 'Ocorreu um erro, tenta novamente!'));
    }

  }

  public function fotoPerfil(Request $request)
  {

    $foto = $request->file('documento');

    $fotoName =  $request->user_id . '.' . $foto->getClientOriginalExtension();
    $upload_success = $foto->move(public_path('uploads'), $fotoName);

    $foto_urls = new fotoUrl;
    $foto_urls->user_id = $request->user_id;
    $foto_urls->tipo = $foto->getClientOriginalExtension();
    $foto_urls->ficheiro = 'uploads/' . $fotoName; //endereco do file no servidor



    if ($upload_success) {
        if ($foto_urls->save()) {

            $user = User::find($request->user_id);
            $user->foto_url = $foto_urls->ficheiro;

            if($user->update()){
                return redirect()->back()->with(array('success' => 'Documento adicionado com sucesso!'));
            }else {
                return redirect()->back()->with(array('erro' => 'Ocorreu um erro, tenta novamente!'));
            }
        } else {
            return redirect()->back()->with(array('erro' => 'Ocorreu um erro, tenta novamente!'));
        }
    } else {
        return redirect()->back()->with(array('erro' => 'Ocorreu um erro, tenta novamente!'));
    }

  }
}
