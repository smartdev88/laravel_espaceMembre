<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        $data = [
            'title' => 'Login - ' . config('app.name'),
            'description'=>'Connexion à votre compte '.config('app.name')
        ];
        return view('auth.login', $data);
    }
}
