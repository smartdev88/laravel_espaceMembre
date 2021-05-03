<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        // return 'Page register';
        $data = [
            'title'=>'Inscription',
            'description'=>'Welcome in your '.config('app.name')
        ];
        // dd($data);
        return view('auth.register', $data);
    }
    public function register(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:9,20',
        ]);

        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();

        $success = 'Inscription terminée';
        return back()->withSuccess($success);
    }
}
