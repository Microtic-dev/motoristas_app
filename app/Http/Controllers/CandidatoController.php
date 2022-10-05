<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincias;
use App\Models\Categorias;
use App\Models\Anuncios;
use App\Models\Candidatos;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
      $candidato = DB::table('users')
              ->where('id', Auth::user()->id)
              ->first();

        // $candidato = DB::table('candidatos')
        //         ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
        //         ->join('users', 'candidatos.user_id', '=', 'users.id')
        //         ->where('user_id', Auth::user()->id)
        //         ->select('candidatos.*', 'users.name as nome', 'users.email as email', 'users.privilegio as privilegio', 'provincias.provincia as provincia')
        //         ->first();
      //
        $formacoes = DB::table('formacoes')
                ->where('candidato_id', $candidato->id)
                ->get();


        $idiomas = DB::table('idiomas')
                ->where('candidato_id', $candidato->id)
                ->get();

        $documentos = DB::table('documentos')
                ->where('candidato_id', $candidato->id)
                ->get();

        $conhecimentos = DB::table('conhecimentos')
                ->where('candidato_id', $candidato->id)
                ->get();

        $experiencias = DB::table('experiencias')
                ->where('candidato_id', $candidato->id)
                ->get();

      //
        // $candidatura_anuncio = DB::table('candidatura_anuncio')
        //          ->join('anuncios', 'candidatura_anuncio.anuncio_id', '=', 'anuncios.id')
        //          ->where('candidato_id', $candidato->id)
        //          ->select('anuncios.*')
        //          ->get();
      //
                if(sizeof($formacoes) < 1) {  $progressFormacao = 0; }else{  $progressFormacao = 15; }
                if(sizeof($experiencias) < 1) { $progressExperiencia = 0; } else { $progressExperiencia = 15; }
                if(sizeof($conhecimentos) < 1) { $progressConhecimento = 0; } else { $progressConhecimento = 15; }
                if(sizeof($idiomas) < 1) { $progressIdioma = 0; } else { $progressIdioma = 15; }
                if(sizeof($documentos) < 1) { $progressDocumento = 0; } else { $progressDocumento = 15; }

        $progress = 25 + $progressFormacao + $progressExperiencia + $progressConhecimento + $progressIdioma + $progressDocumento;
      //
        return view('candidato.candidato', array('candidato' => $candidato, 'formacoes' => $formacoes, 'idiomas' => $idiomas,
      'documentos' => $documentos, 'conhecimentos' => $conhecimentos, 'experiencias' => $experiencias, 'progress' => $progress));
    //  'candidatura_anuncio' => $candidatura_anuncio));

    //  return view('candidato.candidato', array('candidato' => $candidato));
      }


      public function CV()
      {
        $candidato = DB::table('users')
                ->where('id', Auth::user()->id)
                ->first();

        // $candidato = DB::table('candidatos')
        //         ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
        //         ->join('users', 'candidatos.user_id', '=', 'users.id')
        //         ->where('user_id', Auth::user()->id)
        //         ->select('candidatos.*', 'users.name as nome', 'users.email as email', 'users.privilegio as privilegio', 'provincias.provincia as provincia')
        //         ->first();

        $formacoes = DB::table('formacoes')
                ->where('candidato_id', $candidato->id)
                ->get();


        $idiomas = DB::table('idiomas')
                ->where('candidato_id', $candidato->id)
                ->get();

        $documentos = DB::table('documentos')
                ->where('candidato_id', $candidato->id)
                ->get();

        $conhecimentos = DB::table('conhecimentos')
                ->where('candidato_id', $candidato->id)
                ->get();

        $experiencias = DB::table('experiencias')
                ->where('candidato_id', $candidato->id)
                ->get();

                if(sizeof($formacoes) < 1) {  $progressFormacao = 0; }else{  $progressFormacao = 15; }
                if(sizeof($experiencias) < 1) { $progressExperiencia = 0; } else { $progressExperiencia = 15; }
                if(sizeof($conhecimentos) < 1) { $progressConhecimento = 0; } else { $progressConhecimento = 15; }
                if(sizeof($idiomas) < 1) { $progressIdioma = 0; } else { $progressIdioma = 15; }
                if(sizeof($documentos) < 1) { $progressDocumento = 0; } else { $progressDocumento = 15; }

        $progress = 25 + $progressFormacao + $progressExperiencia + $progressConhecimento + $progressIdioma + $progressDocumento;

        return view('candidato.meu-cv', array('candidato' => $candidato, 'formacoes' => $formacoes, 'idiomas' => $idiomas,
      'documentos' => $documentos, 'conhecimentos' => $conhecimentos, 'experiencias' => $experiencias, 'progress' => $progress ));
      }


      public function novo(Request $request) // criar novo candidato
      {
        $password;
        if($request->password == $request->password_confirmation){
          $password = $request->password;
        } else {
          return redirect()->back()->with('erro', 'Ocorreu erro, password diferente!');
        }
        $email = $request->email;
        if(empty($request->email)) {
          $email = $request->celular . "motoristas.co.mz";
        } else {
          $email = $request->email;
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $email;
        $user->celular = $request->celular;
        $user->privilegio = $request->privilegio;
        $user->password = Hash::make($password);

        if ($user->save()) {
          if (Auth::attempt(['email' => $email, 'password' => $password])) {
              $candidato = new Candidatos;
              $candidato->user_id = Auth::user()->id;
              $candidato->datanascimento = $request->data_nascimento;
              $candidato->telefone_alt = $request->telefone_alt;
              $candidato->endereco = $request->endereco;
              $candidato->provincia_id = $request->provincia_id;
              $candidato->sexo = $request->sexo;
              $candidato->categoria_id = $request->categoria_id;
              $candidato->numero_carta_conducao = $request->numero_carta_conducao;
              $candidato->validade_conducao = $request->validade_conducao; // sim, nao
              $candidato->inibicao_anterior = $request->inibicao_anterior; // sim, nao
              $candidato->inibicao_motivo = $request->inibicao_motivo; // motivo de inibicao
              $candidato->envolvimento_acidente = $request->envolvimento_acidente; // Já se envolveu em acidente de
              $candidato->acidente_descricao = $request->acidente_descricao; // descricao do acidente
              $candidato->nacionalidade = $request->nacionalidade;

                if ($candidato->save()) {
                    return redirect('/candidato')->with('success', 'Conta criada com sucesso!');
                } else {
                    return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
                }

              } else {
                  return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
              }

          } else {
              return redirect()->back()->with(array('loginErro' => 'Essas credenciais não correspondem aos nossos registros.!', 'loginFormModal' => 'ok'));
          }



      }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
