<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Creneau;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\AlerteNotification;

class CreneauController extends Controller
{
    //index
    public function index(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        //$creneaux = DB::table('creneau')->join('users', 'users.id', '=', 'creneau.users_id')->get();
        if(auth()->user()->role != "Client"){
            $creneaux = DB::table('creneau')
                        ->select('creneau.id as id', 'note', 'date_heur_debut', 'date_heur_fin', 'avatar', 'nom', 'prenom', 'email', 'phone', 'statut')
                        ->join('users', 'users.id', '=', 'creneau.users_id')
                        ->get();
        return view('creneau.creneau', compact('creneaux'));
        } else {
            $creneaux = DB::table('creneau')
                        ->select('creneau.id as id', 'note', 'date_heur_debut', 'date_heur_fin', 'avatar', 'nom', 'prenom', 'email', 'phone', 'statut')
                        ->join('users', 'users.id', '=', 'creneau.users_id')
                        ->where('users.id', auth()->user()->id)
                        ->get();
        return view('creneau.creneau', compact('creneaux'));
        }
        
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
        $user = User::find(auth()->user()->id);

        //Note
        $data = [
            'titre' => 'Notification',
            'users_id' => auth()->user()->id,
            'creneau_id' => $creneau->id,
            'type_notification' => "reservation", //confirmation de rendezvous, rappel, annulation,
            'contenue' => "Votre Reservation a bien ete prix en compte !",
            'statut' => "envoyé",
            'date' => now(),
        ];

        //
        //$user->notify(new AlerteNotification($data));

        //
        return redirect('/creneau')->with('success', 'Votre reservation a ete enregistrer avec succès');

    }

    //Edite Creneau
    public function editCreneau($id){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        $creneau = Creneau::find($id);
        return view('creneau.edit', compact('creneau'));
    }

    //Edite Creneau
    public function editstoreCreneau(Request $request, $id){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        $creneau = Creneau::find($id);;

        /*
            Ensure the user has entered a nom
        */
        if( $request->id != '' and $request->id != $creneau->id ){
            $creneau->id = $request->id;
        }

        if( $request->user_id != '' and $request->user_id != $creneau->user_id ){
            $creneau->user_id = $request->user_id;
        }

        if( $request->date_heur_debut != '' and $request->date_heur_debut != $creneau->date_heur_debut ){
            $creneau->date_heur_debut = $request->date_heur_debut;
        }

        if( $request->date_heur_fin != '' and $request->date_heur_fin != $creneau->date_heur_fin ){
            $creneau->date_heur_fin = $request->date_heur_fin;
        }

        //
        $creneau->statut = 'En attente';

        if( $request->note != '' and $request->note != $creneau->note ){
            $creneau->note = $request->note;
        }

        $creneau->update();
        
        return redirect("/creneau")->with('success', 'Le rendez-vous a bien ete modifier');
    }

    //Edite Creneau
    public function delCreneau($id){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        $creneau = Creneau::findOrFail($id);
        $creneau->delete();

        return redirect("/creneau")->with('success','Le rendez-vous a bien ete supprimer');
    }

    //Edite Creneau comfirrmed
    public function confirmedCreneau($id){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        $creneau = Creneau::find($id);
        
        $creneau->statut = 'Confirme';

        $creneau->update();

        return redirect("/creneau")->with('success','Le rendez-vous comfirmer');
    }

    //Edite Creneau cancel
    public function cancelCreneau($id){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        $creneau = Creneau::find($id);
        
        $creneau->statut = 'Annule';

        $creneau->update();

        return redirect("/creneau")->with('success','Le rendez-vous Annuler');
    }


}
