<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //index
    public function index(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        $users = User::where('role', 'Client')->get();
        return view('client.client', compact('users'));
    }

    //add
    public function addClient(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        return view('client.add');
    }

    //store
    public function storeClient(Request $request){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        //
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10064',
        ]);

        //move image to storage
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/user/');
        $image->move($destinationPath, $imageName);

        //
        $user = new User;
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->avatar = $imageName;
        $user->role = 'Client'; //administrateur, employé, client
        $user->save();

        //
        return redirect('/client')->with('success', 'le compte a ete creer avec succès');
    }
}
