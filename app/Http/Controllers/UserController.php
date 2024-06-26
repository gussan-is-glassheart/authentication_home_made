<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
  public function showRegister()
  {
    return view('register');
  }

  public function register(RegisterRequest $request)
  {
    $user = User::query()->create([
      'name'=>$request['name'],
      'email'=>$request['email'],
      'password'=>Hash::make($request['password'])
    ]);

    Auth::login($user);

    $user->sendEmailVerificationNotification();

    return redirect()->route('verification.notice');
  }

  public function profile()
  {
    return view('profile');
  }

  public function logout()
  {
    Auth::logout();

    return redirect('/');
  }

  public function showLogin()
  {
    return view('login');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      if (Auth::user()->hasVerifiedEmail()) {
          $request->session()->regenerate();
          return redirect()->intended('profile');
      } else {
          // ユーザーが認証されていない場合、認証ページにリダイレクト
          return redirect()->route('verification.notice');
      }
  }

    return back();
  }
}
