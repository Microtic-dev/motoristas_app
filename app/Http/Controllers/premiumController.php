<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincias;
use App\Models\Categorias;
use App\Models\Anuncios;
use App\Models\Candidatos;
use App\Models\Empregador;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class premiumController extends Controller
{
    public function activatePremium(Request $request){
        $user = User::find($request->id);
        $user->is_premium="yes";
        print_r($user);
        die();
        if($user->update()){
        //   return redirect()->back()->with('success', 'Upgrate feito');
        }else{
        //     return redirect()->back()->with('error', 'Ocorreu um erro');
        }
    }

    public function desactivatePremium(Request $request){
        $user = User::find($request->id);
        $user->is_premium="no";
        if($user->update()){
           return redirect()->back()->with('success', 'Upgrate feito');
        }else{
             return redirect()->back()->with('error', 'Ocorreu um erro');
        }
    }

    public function checkPremiumTime(Request $request){
        $user = User::find($request->id);
        $user->is_premium="no";
        if($user->update()){
           return redirect()->back()->with('success', 'Upgrate feito');
        }else{
             return redirect()->back()->with('error', 'Ocorreu um erro');
        }
    }



    public function getUsers(Request $request){


       $users = DB::table('users')
                ->join('empregadors','users.id','=','empregadors.user_id')
                ->select('users.*')
                ->orderBy('id', 'DESC')
                ->get();



        return view('admin.premium',compact('users'));

    }
}
