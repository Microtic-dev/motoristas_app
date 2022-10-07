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
                  ->join('provincias',  'candidatos.provincia_id', '=', 'provincias.id')
                 ->select('candidatos.*','users.id as user_id', 'users.name as name','users.celular as celular',
                 'categorias.categoria as categoria','provincias.name as provincia')
                 ->orderBy('id', 'DESC')
                 ->paginate(5);


    $empregadores = DB::table('users')
                ->where('privilegio', 'empregador')
                ->orderBy('id', 'DESC')
                ->paginate(5);

    $countMotoritas = DB::table('users')->where('privilegio', 'candidato')->count();
    $countCentralRisco = DB::table('central_de_riscos')->count();
    $countEmpregador = DB::table('users')->where('privilegio', 'empregador')->count();
    $countAnuncios = DB::table('anuncios')->count();


   return view('admin.index',compact('motoristas','empregadores', 'countMotoritas', 'countAnuncios', 'countEmpregador' , 'countCentralRisco'));

  }

  public function motoristas()
  {
    $motoristas = DB::table('candidatos')
                 ->join('users', 'candidatos.user_id', '=', 'users.id')
                 ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
                 ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
                 ->select('candidatos.*', 'users.name as name','users.celular as celular','categorias.categoria as categoria',
                 'provincias.name as provincia')
                 ->get();


   return view('admin.bd_motoristas',compact('motoristas'));

  }

}
