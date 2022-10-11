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


    $empregadores = DB::table('empregadors')
                ->join('users', 'empregadors.user_id','=','users.id')
                ->select('empregadors.*','users.name as name','users.email as email','users.celular as celular')
                ->orderBy('id', 'DESC')
                ->paginate(5);


    $denuncias = DB::table('central_de_riscos')
                ->join('candidatos', 'central_de_riscos.user_id', '=', 'candidatos.user_id')
                ->join('provincias', 'candidatos.provincia_id', '=', 'provincias.id')
                ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
                ->join('users', 'candidatos.user_id', '=', 'users.id')
                ->select('central_de_riscos.*', 'users.name as nome', 'users.email as email',
                 'users.privilegio as privilegio', 'provincias.name as provincia', 'users.celular as celular',
                'categorias.categoria as categoria')
                ->orderBy('id', 'DESC')
                ->paginate(5);


    $last30motoristas = DB::table("users")
                ->select('id')
                ->where('privilegio', 'candidato')
                ->where('created_at', '>', now()->subDays(30)->endOfDay())
                ->count();

    $last30empregador = DB::table("empregadors")
                      ->select('id')
                      ->where('created_at', '>', now()->subDays(30)->endOfDay())
                      ->count();

    $last30denuncias = DB::table("central_de_riscos")
                      ->select('id')
                      ->where('created_at', '>', now()->subDays(30)->endOfDay())
                      ->count();

    $anunciosDentroDoPrazo = DB::table("anuncios")
                      ->select('id')
                      ->where('validade', '>', now())
                      ->count();

    $countMotoritas = DB::table('users')->where('privilegio', 'candidato')->count();
    $countCentralRisco = DB::table('central_de_riscos')->count();
    $countEmpregador = DB::table('empregadors')->count();
    $countAnuncios = DB::table('anuncios')->count();


   return view('admin.index',compact('motoristas','empregadores','denuncias',
   'last30motoristas','last30empregador','last30denuncias','anunciosDentroDoPrazo',
   'countMotoritas', 'countAnuncios', 'countEmpregador' , 'countCentralRisco'));

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


 public function empregadores()
 {
   $empregadores = DB::table('empregadors')
               ->join('users', 'empregadors.user_id','=','users.id')
               ->select('empregadors.*','users.name as name','users.email as email','users.celular as celular')
               ->orderBy('id', 'DESC')
               ->paginate(5);


  return view('admin.bd_empregadores',compact('empregadores'));
 }

}
