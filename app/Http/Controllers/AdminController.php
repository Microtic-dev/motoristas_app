<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {

  if(Auth::user()){
    $motoristas = DB::table('candidatos')
                 ->join('users', 'candidatos.user_id', '=', 'users.id')
                  ->join('categorias', 'candidatos.categoria_id', '=', 'categorias.id')
                 ->select('candidatos.*', 'users.name as name','users.celular as celular','categorias.categoria as categoria')
                 ->get();

   return view('admin.index',compact('motoristas'));
   }
}
}
