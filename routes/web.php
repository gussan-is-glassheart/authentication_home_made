<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function (){
  Route::get('/register', [UserController::class, 'showRegister'])->name('register');
  Route::post('/register', [UserController::class, 'register']);
  Route::get('/login', [UserController::class, 'showLogin'])->name('login');
  Route::post('/login', [UserController::class, 'login']);
});

Route::middleware('auth')->group(function (){
  Route::post('logout', [UserController::class, 'logout'])->name('user.logout');

  Route::middleware('verified')->group(function (){
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
  });
});

Route::get('/email/verify', function (){
  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}',function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();

  return back()->with('message', '認証リンクを送信しました');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');