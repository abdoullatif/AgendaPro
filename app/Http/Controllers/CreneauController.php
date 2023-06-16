<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Creneau;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreneauController extends Controller
{
    //index
    public function index(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        $creneaux = DB::table('creneau')->join('users', 'users.id', '=', 'creneau.users_id')->get();;
        return view('creneau.creneau', compact('creneaux'));
    }

    //add Creneau
    public function addCreneau(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }


        return view('creneau.add');
    }

    //store Creneau
    public function storeCreneau(Request $request){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        //
        $this->validate($request, [
            'date_heur_debut' => 'required|unique:creneau',
            'date_heur_fin' => 'required|unique:creneau',
            'note' => 'required',
        ]);

        //Notification
        $creneau = new Creneau;
        $creneau->users_id = auth()->user()->id; 
        $creneau->date_heur_debut = $request->input('date_heur_debut');
        $creneau->date_heur_fin = $request->input('date_heur_fin');
        $creneau->statut = 'En attente'; // Confirmé, En attente, Annulé
        $creneau->note = $request->input('note');
        $creneau->save();

        //Notification
        $notification = new Notification;
        $notification->users_id = auth()->user()->id;
        $notification->creneau_id = $creneau->id;
        $notification->type_notification = "reservation"; //confirmation de rendezvous, rappel, annulation
        $notification->contenue = "Votre Reservation a bien ete prix en compte !";
        $notification->statut = "envoyé"; // envoyé, non envoyé,lu

        //
        return redirect('/creneau')->with('success', 'Votre reservation a ete enregistrer avec succès');

    }
}
