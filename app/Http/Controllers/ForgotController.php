<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotController extends Controller
{
    //
    public function index(){ //formulaire d'oublie de pwd
        $data = [
            'title'=> $description = 'Oublie de mot de passe',
            'description'=> $description
        ];
        return view('auth.forgot', $data);
    }

    public function store(Request $request){ 
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        return 'Vérification réussi';
    }
}
