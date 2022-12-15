<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentos;
use App\Models\DocumentsEmpregador;
use App\Models\Candidatos;
use App\Models\Empregador;
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


  public function uploadAlldocuments(Request $request){
        $documento1 = $request->file('documento_nuit');
        self::documentUpload($documento1,'documento_nuit',$request);
        $documento2 = $request->file('documento_certidao_empresa');
        self::documentUpload($documento2,'documento_certidao',$request);
        $documento3 = $request->file('documento_inicio_actividade');
        self::documentUpload($documento3,'documento_inicio_actividade',$request);

           $empregador = Empregador::find($request->user_id);
           $user = User::find($empregador->user_id);

        return redirect()->route('sendAdminNotification',$user->id);
  }

  public function documentUpload($documento,$documentField,$request)
  {

  //  $documento = $request->file($documentType);
    $documentoName = $request->user_id . '-' . $documentField . '.' . $documento->getClientOriginalExtension();
    $upload_success = $documento->move(public_path('uploads'), $documentoName);

    $novoDocumento = new DocumentsEmpregador;
    $novoDocumento->empregador_id = $request->user_id;
    $novoDocumento->tipo =$documento->getClientOriginalExtension();
    $novoDocumento->ficheiro = 'uploads/' . $documentoName;


    if ($upload_success) {
        if ($novoDocumento->save()) {


            $empresa= Empregador::find( $request->user_id);

            if($documentField=='documento_nuit'){
                $empresa->documento_nuit = $novoDocumento->ficheiro;
            }

            if($documentField=='documento_certidao'){
                $empresa->documento_certidao = $novoDocumento->ficheiro;
            }

            if($documentField=='documento_inicio_actividade'){
                $empresa->documento_inicio_actividade = $novoDocumento->ficheiro;
            }

            $empresa->update();

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
