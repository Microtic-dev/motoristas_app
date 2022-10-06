<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncios;
use App\Models\Candidatos;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    $motoristas = DB::table('candidatos')
                 ->join('users', 'candidatos.user_id', '=', 'users.id')
                  ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
                 ->select('candidatos.*', 'users.name as name','users.celular as celular','categorias.categoria as categoria')
                 ->get();

    $countMotoritas = DB::table('users')->where('privilegio', 'candidato')->count();
    $countCentralRisco = DB::table('users')->where('privilegio', 'candidato')->count();
    $countEmpregador = DB::table('users')->where('privilegio', 'empregador')->count();
    $countAnuncios = DB::table('anuncios')->count();


   return view('admin.index',compact('motoristas', 'countMotoritas', 'countAnuncios', 'countEmpregador' , 'countCentralRisco'));

  }

  public function motoristas()
  {
    $motoristas = DB::table('candidatos')
                 ->join('users', 'candidatos.user_id', '=', 'users.id')
                 ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
                 ->select('candidatos.*', 'users.name as name','users.celular as celular','categorias.categoria as categoria')
                 ->get();


   return view('admin.bd_motoristas',compact('motoristas'));

  }

}
