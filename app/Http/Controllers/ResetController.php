<?php

namespace App\Http\Controllers;

use App\User;
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

    public function reset(Request $request){
        // dd(request()->all());
        $request->validate([
            'email'=>'required|email',
            'token'=>'required',
            'password'=>'required|between:9,20|confirmed',
        ]);
        if(!DB::table('password_resets')
                ->where('email', request('email'))
                ->where('token', request('token'))->count()){
            $error ='Vérifier votre adresse email';
            return back()->withError($error)->withInput();        
        }
        $user = User::whereEmail(request('email'))->firstOrFail();
        // dd($user);
        $user->password = bcrypt(request('password'));
        $user->save();

        DB::table('password_resets')->whereEmail(request('email'))->delete();

        $success = 'Mot de passe mis à jour.';
        return redirect()->route('login')->withSuccess($success);

    }
}
