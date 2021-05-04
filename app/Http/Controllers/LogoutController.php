<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function logout(){ //déconnexion
        Auth::logout();
        return redirect()->route('login');
    }
}
