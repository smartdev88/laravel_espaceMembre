<?php

namespace App\Http\Controllers;

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
}
