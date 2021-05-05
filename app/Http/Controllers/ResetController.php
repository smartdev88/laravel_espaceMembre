<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetController extends Controller
{
    //
    public function index($token){
        // return $token;
        $password_reset = DB::table('password_resets')->where('token', $token)->first();
        // dd($password_reset);
        // if(!$password_reset){
        //     dd('existe pas');
        // }
        abort_if(!$password_reset, 403); 
        //elle coupe le script et renvoie une erreur http
        //Forbidden - vous n'avez pas le droit à accéder à cet ressource (pas autoriser a y accéder)


        $data = [
            'title'=>$description='Rénitialisation de mot de passe',
            'description'=>$description,
            'password_reset'=>$password_reset
        ];
        return view('auth.reset', $data);

    }
}
