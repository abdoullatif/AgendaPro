<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Creneau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function nombre_admin_employer()
    {
        return User::where('role', 'Administrateur')->orwhere('role', 'Employe')->count();
    }

    public function nombre_client()
    {
        return User::where('role', 'Client')->count();
    }

    public function nombre_creneau()
    {
        return Creneau::count('id');
    }

    public function nombre_creneau_comfirmed()
    {
        return Creneau::where('statut', 'Comfirme')->count();
    }

    public function creneaux()
    {
        return DB::table('creneau')
                    ->join('users', 'users.id', '=', 'creneau.users_id')
                    ->orderBy('creneau.id', 'desc')
                    ->take(6)
                    ->get();
    }

}
