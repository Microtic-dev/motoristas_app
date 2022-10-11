<?php

namespace App\Http\Controllers;
use App\Models\CentralDeRisco;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;


class CentralDeRiscoController extends Controller
{

  public function index(){
      $denuncias = DB::table('central_de_riscos')
              ->join('candidatos', 'central_de_riscos.user_id', '=', 'candidatos.user_id')
              ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
              ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
              ->join('users', 'candidatos.user_id', '=', 'users.id')
              ->select('central_de_riscos.*', 'users.name as nome', 'users.email as email', 'users.privilegio as privilegio',
               'provincias.name as provincia', 'users.celular as celular',
              'categorias.categoria as categoria')
              ->get();

           return view('admin.central_risco',compact('denuncias'));
    }


    public function search(Request $request){

        $denuncias;

        if($request->keyword!=""){

          $denuncias = DB::table('central_de_riscos')
                  ->join('candidatos', 'central_de_riscos.user_id', '=', 'candidatos.user_id')
                  ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
                  ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
                  ->join('users', 'candidatos.user_id', '=', 'users.id')
                  ->where('users.name', $request->keyword)
                  ->orWhere('users.name', 'like', '%' .$request->keyword . '%')
                  ->select('central_de_riscos.*', 'users.name as nome', 'users.email as email', 'users.privilegio as privilegio',
                   'provincias.name as provincia', 'users.celular as celular', 'candidatos.numero_carta_conducao as carta',
                  'categorias.categoria as categoria')
                  ->get();



     }elseif($request->numero_carta_conducao!=""){

          $denuncias = DB::table('central_de_riscos')
                  ->join('candidatos', 'central_de_riscos.user_id', '=', 'candidatos.user_id')
                  ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
                  ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
                  ->join('users', 'candidatos.user_id', '=', 'users.id')
                  ->where('candidatos.numero_carta_conducao', $request->numero_carta_conducao)
                  ->orWhere('candidatos.numero_carta_conducao', 'like', '%' .$request->numero_carta_conducao . '%')
                  ->select('central_de_riscos.*', 'users.name as nome', 'users.email as email', 'users.privilegio as privilegio',
                   'provincias.name as provincia', 'users.celular as celular','candidatos.numero_carta_conducao as carta',
                  'categorias.categoria as categoria')
                  ->get();


       }else{

          $denuncias = DB::table('central_de_riscos')
                  ->join('candidatos', 'central_de_riscos.user_id', '=', 'candidatos.user_id')
                  ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
                  ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
                  ->join('users', 'candidatos.user_id', '=', 'users.id')
                  ->select('central_de_riscos.*', 'users.name as nome', 'users.email as email', 'users.privilegio as privilegio',
                   'provincias.name as provincia', 'users.celular as celular',
                  'categorias.categoria as categoria')
                  ->get();

                
     }

             return view('admin.central_risco',compact('denuncias'));
      }


  public function create(Request $request){


          $centralRisco = new CentralDeRisco;
          $centralRisco->empregador_id = Auth::user()->id;;
          $centralRisco->user_id = $request->candidato_id;
          $centralRisco->funcoes_do_candidato=$request->funcoes_do_candidato;
          $centralRisco->infracao=$request->infracao;
          $centralRisco->merece_portunidade = $request->merece_portunidade;
          $centralRisco->versao_motorista = $request->versao_motorista;
          $centralRisco->estado_denuncia = 'Não confirmada';

        if($centralRisco->save()){

         return redirect()->back()->with('success', 'Motorista denunciado, os Admininstradores cuidaram do resto!');
       }else{
        return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
        }

    }

    public function denuncia($id){

      $denuncia = DB::table('central_de_riscos')
              ->where('central_de_riscos.id', $id)
              ->join('candidatos', 'central_de_riscos.user_id', '=', 'candidatos.user_id')
              ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
              ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
              ->join('users', 'candidatos.user_id', '=', 'users.id')
              ->select('central_de_riscos.*', 'central_de_riscos.id as denuncia_id', 'candidatos.*', 'users.name as nome', 'users.email as email', 'users.privilegio as privilegio',
               'provincias.name as provincia', 'users.celular as celular',
              'categorias.categoria as categoria')
              ->first();

      $denunciante = DB::table('users')
              ->where('users.id', $denuncia->empregador_id)
              ->join('central_de_riscos', 'users.id', '=', 'central_de_riscos.empregador_id')
              ->select('users.*', 'users.name as nome_empregador', 'users.email as email_empregador',
              'users.celular as celular_empregador')
              ->first();

         return view('admin.denuncia',compact('denuncia', 'denunciante'));
   }


  //   public function verCentralDeRisco(){
  //
  //
  //           $centralRisco = DB::table('central_de_riscos')
  //                         ->join('recrutadores', 'central_de_riscos.empregador_id','=','recrutadores.id')
  //                         ->join('candidatos', 'central_de_riscos.candidato_id','=','candidatos.id')
  //                         ->join('users', 'candidatos.user_id','=','users.id')
  //                         ->select('central_de_riscos.*','users.id as user_id', 'users.name as name','users.celular as celular')->get();
  //
  //
  //
  //         return view('centralRisco',compact('centralRisco'));
  //   }
  //
  //
  //   public function deletarCentralDeRisdco($id){
  //
  //       $centralRisco = CentralDeRisco::find($id);
  //       if($centralRisco->delete()){
  //          return redirect()->back()->with('success', 'Motorista removido da central de Risco!');
  //       }else {
  //           return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
  //       }
  //
  //   }
  //
  //
    public function updateCentralDeRisco(Request $request){

          $centralRisco = CentralDeRisco::find($request->id);
          $centralRisco->merece_portunidade=$request->merece_portunidade;
          $centralRisco->versao_motorista=$request->versao_motorista;
          $centralRisco->estado_denuncia=$request->estado_denuncia;


        if($centralRisco->update()){

         return redirect()->back()->with('success', 'Denuncia actualizada!');
       }else{
        return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
        }

    }


}
