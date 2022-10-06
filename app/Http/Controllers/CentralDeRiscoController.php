<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\CentralDeRisco;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CentralDeRiscoController extends Controller
{


  $table->bigIncrements('id');
  $table->bigInteger('empregador_id')->unsigned();
  $table->bigInteger('candidato_id')->unsigned();
  $table->text('funcoes_do_candidato')->nullable();
  $table->string('infracao')->nullable();
  $table->string('merece_portunidade')->nullable();
  $table->text('versao_motorista');


    public function denunciarMotorista(Request $request){

        if(Auth->privilegio=="empregador"){

                $centralRisco = new CentralDeRisco;
                $centralRisco->empregador_id=$request->empregador_id;
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

        }else {
              return redirect()->back()->with('erro', 'Voce nao tem acesso a centralRisco!');
        }

    }
}
