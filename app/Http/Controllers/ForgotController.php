<?php

namespace App\Http\Controllers;

use App\Notifications\PasswordResetNotification;
use App\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // return 'Vérification réussi';

        $token = Str::uuid();

        DB::table('password_resets')->insert([
            'email'=>request('email'),
            'token'=>$token,
            'created_at'=>now(),
        ]);

        $user = User::whereEmail(request('email'))->firstOrFail();
        $user->notify(new PasswordResetNotification($token));

        $success = 'Vérifier votre boite mail et suivez les instructions.';
        return back()->withSuccess($success);

    }
}
