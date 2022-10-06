<?php

namespace App\Http\Controllers;
use App\Models\CentralDeRisco;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;


class CentralDeRiscoController extends Controller
{

    public function denunciarMotorista(Request $request){


    //    if(Auth::user()->privilegio=="empregador"){

                $user_id = Auth::user()->id;
                $empregador = DB::table('empregadores')
                            ->where('empregadores.*', 'empregadores.user_id',$user_id)
                            ->first();

                $centralRisco = new CentralDeRisco;
                $centralRisco->empregador_id=empregador_id;
                $centralRisco->candidato_id=$request->candidato_id;
                $centralRisco->funcoes_do_candidato=$request->funcoes_do_candidato;
                $centralRisco->infracao=$request->infracao;
                $centralRisco->merece_portunidade=$request->merece_portunidade;
                $centralRisco->versao_motorista=$request->versao_motorista;

              if($centralRisco->save()){

               return redirect()->back()->with('success', 'Motorista denunciado, os Admininstradores cuidaram do resto!');
             }else{
              return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
              }

  //      }else {
    //          return redirect()->back()->with('erro', 'Voce nao tem acesso a central de risco!');
    //    }
    }


    public function verCentralDeRisco(){


            $centralRisco = DB::table('central_de_riscos')
                          ->join('recrutadores', 'central_de_riscos.empregador_id','=','recrutadores.id')
                          ->join('candidatos', 'central_de_riscos.candidato_id','=','candidatos.id')
                          ->join('users', 'candidatos.user_id','=','users.id')
                          ->select('central_de_riscos.*','users.id as user_id', 'users.name as name','users.celular as celular')->get();



          return view('centralRisco',compact('centralRisco'));
    }


    public function deletarCentralDeRisdco($id){

        $centralRisco = CentralDeRisco::find($id);
        if($centralRisco->delete()){
           return redirect()->back()->with('success', 'Motorista removido da central de Risco!');
        }else {
            return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
        }

    }


    public function updateCentralDeRisco(Request $request){


    //    if(Auth::user()->privilegio=="empregador"){

                $user_id = Auth::user()->id;
                $empregador = DB::table('empregadores')
                            ->where('empregadores.*', 'empregadores.user_id',$user_id)
                            ->first();

                $centralRisco = CentralDeRisco::find($request->id);
                $centralRisco->empregador_id=empregador_id;
                $centralRisco->candidato_id=$request->candidato_id;
                $centralRisco->funcoes_do_candidato=$request->funcoes_do_candidato;
                $centralRisco->infracao=$request->infracao;
                $centralRisco->merece_portunidade=$request->merece_portunidade;
                $centralRisco->versao_motorista=$request->versao_motorista;

              if($centralRisco->update()){

               return redirect()->back()->with('success', 'Motorista denunciado, os Admininstradores cuidaram do resto!');
             }else{
              return redirect()->back()->with('erro', 'Ocorreu erro, tenta novamente!');
              }

  //      }else {
    //          return redirect()->back()->with('erro', 'Voce nao tem acesso a central de risco!');
    //    }
    }


}
