<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Creneau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function dashboard(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        
        //$admin_employer = DB::select('select count(id) as admin_employer from users where role = \'Administrateur\' and role = \'Client\'');
        
        $admin_employer = User::where('role', 'Administrateur')->orwhere('role', 'Employe')->count();

        $client = User::where('role', 'Client')->count();

        $creneau = Creneau::count('id');

        $creneau_comfirmed = Creneau::where('statut', 'Comfirme')->count();

        //$creneaux = DB::table('creneau')->join('users', 'users.id', '=', 'creneau.users_id')->get();

        $creneaux = DB::table('creneau')
                        ->join('users', 'users.id', '=', 'creneau.users_id')
                        ->orderBy('creneau.id', 'desc')
                        ->take(6)
                        ->get();

        return view('dashboard.dashboard', compact('admin_employer', 'client', 'creneau', 'creneau_comfirmed', 'creneaux'));
    }

    //
    public function index(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        
        //$admin_employer = DB::select('select count(id) as admin_employer from users where role = \'Administrateur\' and role = \'Client\'');
        
        $admin_employer = User::where('role', 'Administrateur')->orwhere('role', 'Employe')->count();

        $client = User::where('role', 'Client')->count();

        $creneau = Creneau::count('id');

        $creneau_comfirmed = Creneau::where('statut', 'Comfirme')->count();

        //$creneaux = DB::table('creneau')->join('users', 'users.id', '=', 'creneau.users_id')->get();

        $creneaux = DB::table('creneau')
                        ->join('users', 'users.id', '=', 'creneau.users_id')
                        ->orderBy('creneau.id', 'desc')
                        ->take(6)
                        ->get();

        return view('dashboard.home', compact('admin_employer', 'client', 'creneau', 'creneau_comfirmed', 'creneaux'));
    }
}
