<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController, RegisterController,
    LogoutController, ForgotController,
    ResetController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('post.register');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('post.login');

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('forgot', [ForgotController::class, 'index'])->name('forgot');
Route::post('forgot', [ForgotController::class, 'store'])->name('post.forgot');

Route::get('reset/{token}', [ResetController::class, 'index'])->name('reset');
Route::post('reset', [ResetController::class, 'reset'])->name('post.reset');