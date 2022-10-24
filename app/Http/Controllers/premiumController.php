<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincias;
use App\Models\Categorias;
use App\Models\Anuncios;
use App\Models\Candidatos;
use App\Models\Empregador;
use App\Http\Controllers\DatetimeHelper;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;
use Carbon\Carbon;

class premiumController extends Controller
{
    public function activatePremium(Request $request){
        $user = User::find($request->id);
        $user->is_premium="yes";
        $user->premium_count=0;
        $user->premium_date= Carbon::now();
        if($user->update()){
           return redirect()->back()->with('success', 'Upgrate feito');
        }else{
           return redirect()->back()->with('error', 'Ocorreu um erro');
        }
    }

    public function desactivatePremium(Request $request){
        $user = User::find($request->id);
        $user->premium_count=0;
        $user->premium_date= Carbon::now();
        $user->is_premium="no";
        if($user->update()){
           return redirect()->back()->with('success', 'Upgrate feito');
        }else{
             return redirect()->back()->with('error', 'Ocorreu um erro');
        }
    }

    public function checkPremiumTime(Request $request){
        $user = User::find($request->id);
        $user->premium_count=0;
        $user->premium_date= Carbon::now();
        $user->is_premium="no";
        if($user->update()){
           return redirect()->back()->with('success', 'Upgrate feito');
        }else{
             return redirect()->back()->with('error', 'Ocorreu um erro');
        }
    }



    public function getUsers(Request $request){

        $users = User::all();


        return view('admin.premium',compact('users'));
    }
}
