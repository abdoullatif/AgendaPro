<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //index
    public function index(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        return view('profile.profile');
    }

    //Edite profile
    public function upProfile(Request $request, $id){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        //
        $this->validate($request, [
            'nom' => '',
            'prenom' => '',
            'email' => 'email',
            'phone' => '',
            'password' => 'min:6|confirmed',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10064',
        ]);

        $user = User::find($id);;

        /*
            Ensure the user has entered a nom
        */
        if( $request->nom != '' and $request->nom != $user->nom ){
            $user->nom = $request->nom;
        }

        if( $request->prenom != '' and $request->prenom != $user->prenom ){
            $user->prenom = $request->prenom;
        }

        if( $request->email != '' and $request->email != $user->email ){
            $user->email = $request->email;
        }

        if( $request->phone != '' and $request->phone != $user->phone ){
            $user->phone = $request->phone;
        }

        if( $request->password != '' and $request->password != $user->password ){
            $user->password = Hash::make($request->password);
        }

        if( $request->hasfile('avatar') ){
            //move image to storage
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/user/');
            $image->move($destinationPath, $imageName);
            $user->avatar = $imageName;
        }

        $user->update();
        
        return redirect("/profile")->with('success', 'Votre profile a bien ete modifier');
    }
}
