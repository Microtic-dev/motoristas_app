<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentos;
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
            return redirect()->back()->with(array('success' => 'Documento adicionado com sucesso!'));
        } else {
            return redirect()->back()->with(array('erro' => 'Ocorreu um erro, tenta novamente!'));
        }

    } else {
        return redirect()->back()->with(array('erro' => 'Ocorreu um erro, tenta novamente!'));
    }

  }
}
