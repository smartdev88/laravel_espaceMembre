<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dump(request()->all());

        
        // dd('---');
      
        $email = request('email');
        $password = request('password');
        $remember = request()->has('remember');

        // dump($remember);

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            // The user is being remembered...
            return redirect('/');
        }

        return back()->withError('Mauvaise indentification.')->withInput();
    }
}
