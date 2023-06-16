<?php

namespace App\Http\Controllers;

use App\Models\Creneau;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    //index
    public function index(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }

        //
        $creneaux = Creneau::All();
        return view('calendrier.calendrier', compact('creneaux'));
    }
}
