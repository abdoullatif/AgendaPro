<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function cat() {
        return view('Auth.categorie', ); //compact('universites')
    }


    public function index() {
        //$universites = User::where('rolePersonne', 'universite')->get();
        return view('Auth.login', ); //compact('universites')
    }

    //
    public function registerUser() {
        //$universites = User::where('rolePersonne', 'universite')->get();
        return view('Auth.register', ); //compact('universites')
    }

    //
    public function storeUser(Request $request) {
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
        return redirect('/home')->with('success', 'votre compte a ete creer avec succès');

    }

    //
    public function customLogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            //redirection
            //Verification
            return redirect()->route('home')->with('success', 'Heureux de vous revoir !');
            //return redirect()->route('dashboard')->with('success', 'Heureux de vous revoir !');
        } else {
            return redirect()->route('login',[])->withErrors('L\'adresse email ou le mot de passe est incorrecte');
        }
        

    }

    //
    public function signOut() {
        //Deconnection
        Session::flush();
        Auth::logout();
        return redirect("/");
    }
}
