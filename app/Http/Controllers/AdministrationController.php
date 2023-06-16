<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    //index
    public function index(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        //Afficher les administrateur et employer
        $users = User::where('role', 'Administrateur')
        ->orWhere('role', 'Employer')->get();
        return view('administration.user', compact('users'));
    }

    //index
    public function addAdmin(){
        if( auth()->check() ){}
        else{
            return redirect("/")->withErrors('Session Deconnecter, Veuillez vous connecter');
        }
        return view('administration.add');
    }

    //Store
        //
    public function storeUserAdmin(Request $request) {
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
                'role' => 'required',
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
            $user->role = $request->input('role'); //Administrateur, Employer, Client
            $user->save();
    
            //
            return redirect('/administration')->with('success', 'le compte a ete creer avec succès');
    
    }



}
