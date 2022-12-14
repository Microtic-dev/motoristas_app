<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincias;
use App\Models\categorias;
use App\Models\Anuncios;
use App\Models\fotoUrl;
use App\Models\User;
use App\Models\Empregador;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmpregadorController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {

    $user = Auth::user();

    if($user->privilegio=='empregador'){
       $categorias = Categorias::all();
       $provincias = Provincias::all();
       $anuncios = DB::table('anuncios')
               ->join('empregadors', 'anuncios.user_id', '=', 'empregadors.user_id')
               ->join('users', 'anuncios.user_id', '=', 'users.id')
               ->select('anuncios.*', 'users.name as recrutador', 'users.foto_url as foto')
               ->where('anuncios.user_id', $user->id)
               ->orderBy('id', 'DESC')
               ->paginate(10);

       return view('empregador.index', array( 'anuncios' => $anuncios, 'categorias' => $categorias, 'provincias' => $provincias ));
   }
  }

  public function getEmpregador($id)
  {

    $categorias = DB::table('categorias')->get();
    $provincias = DB::table('provincias')->get();
    $anuncios_provincias = DB::table('anuncios_provincias')->get();

    $empregadors = DB::table('empregadors')
            ->join('users', 'empregadors.user_id', '=', 'users.id')
            ->where('empregadors.user_id',  $id)
            ->select('empregadors.*', 'users.name as nome', 'users.foto_url as foto','users.celular as celular','users.active as active','users.email as email')
            ->orderBy('id', 'DESC')
            ->paginate(10);



    $anuncios = DB::table('anuncios')

            ->join('empregadors', 'anuncios.user_id', '=', 'empregadors.user_id')
            ->join('users', 'anuncios.user_id', '=', 'users.id')
            ->where('anuncios.user_id',  $id)
            ->select('anuncios.*', 'users.name as nome','empregadors.empresa as empresa', 'users.foto_url as foto','users.celular as celular','users.active as active',
                    'empregadors.empresa as website' ,  'empregadors.endereco as endereco', 'empregadors.sector_actividade as sector_actividade','empregadors.documento_nuit as documento_nuit',
                     'empregadors.documento_certidao as documento_certidao','empregadors.documento_inicio_actividade as documento_inicio_actividade')
            ->orderBy('id', 'DESC')
            ->paginate(10);



     return view('empregador.empregador',  compact('provincias' ,'categorias', 'anuncios','anuncios_provincias','empregadors'));
  }


public function registarEmpregador(Request $request)
    {
        $password;
        if($request->password == $request->password_confirmation){
          $password = $request->password;
        } else {
          return redirect()->back()->with('erro', 'Ocorreu erro, password diferente!');
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->newemail;
        $user->foto_url="none";
        $user->premium_count=0;
        $user->active="desativado";
        $user->celular = $request->telefone;
        $user->privilegio = $request->privilegio;
        $user->is_premium = "no";
        $user->password = Hash::make($password);

        if($user->save()){
            $empregador = new Empregador;
            $empregador->user_id =$user->id;

            $empregador->sector_actividade=$request->sector_actividade;
            if($request->sector_actividade=='Outro')
            $empregador->sector_actividade=$request->sector_especificado;
            $empregador->telefone = $request->telefone;
            $empregador->telefone_alt = $request->telefone_alt;
            $empregador->website = $request->website;
            $empregador->endereco = $request->endereco;
            $empregador->provincia_id = $request->provincia_id;
            $empregador->representante = $request->representante;
            $empregador->sobre = $request->sobre;
            $empregador->estado = 'Aberto';
            $empregador->empresa = $request->name;

         if ($empregador->save()) {

            return redirect()->route('documents',$empregador->id);

          }else{

             return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
     }
   }
  }

  public function procurarMotorista(Request $request)
  {
     $motorista = DB::table('users')
             ->where('users.name', $request->keyword)
             ->orWhere('users.name', 'like', '%' . $request->keyword . '%')
             ->where('users.privilegio', 'candidato')
             ->get();

         if (!empty($motorista)) {
             return response(['msg' => $motorista]);
         } else {
             return response(['msg' => 'Ocorreu erro, tenta novamente!', 'error' => '500']);
         }
  }


public function aguarde(){
    return view('empregador.aguarde');
}



  public function getMotorista(Request $request)
  {
     $motorista = DB::table('candidatos')
             ->where('candidatos.user_id', $request->id)
             ->where('users.privilegio', 'candidato')
             ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
             ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
             ->join('users', 'candidatos.user_id', '=', 'users.id')
             ->select('candidatos.*', 'users.name as nome','users.foto_url as foto_url', 'users.email as email', 'users.privilegio as privilegio',
              'provincias.name as provincia', 'users.celular as celular',
             'categorias.categoria as categoria')
             ->first();

         if (!empty($motorista)) {
             return response(['msg' => $motorista]);
         } else {
             return response(['msg' => 'Ocorreu erro, tenta novamente!', 'error' => '500']);
         }
  }


  public function documents ($id){
    return view('empregador.documents',['id'=>$id]);
  }


  // public function criarAnuncio(Request $request){
  //
  //       $anuncio = new Anuncios();
  //
  //       $anuncio -> titulo = $request->titulo;
  //       $anuncio -> user_id = $request-> user_id;
  //       $anuncio -> validade = $request->validade;
  //       $anuncio -> descricao = $request->descricao;
  //       $anuncio -> estado_anuncio = "Disponivel";
  //       $anuncio -> forma_de_candidatura = $request->forma_de_candidatura;
  //       $anuncio -> categoria_id = $request->categoria_id;
  //
  //       if($anuncio->save()){
  //            return redirect()->back()->with('success','Formulario Preenchido');
  //       }else{
  //            return redirect()->back()->with('error','Ocorrou um erro, tente novamente');
  //       }
  // }
}
