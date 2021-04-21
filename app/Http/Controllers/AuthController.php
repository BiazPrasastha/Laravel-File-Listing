<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login_()
    {
        if (Auth::user()) {
            return redirect()->route('index');
        } else {
            return view('login');
        }
    }

    function login(Request $request)
    {
        $user = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::attempt($user)) {
            return redirect()->route('index');
        } else {
            return back()->with('error', 'Login Failed, Please Check Your Username & Password');
        }
    }
    function register_()
    {
        return view('register');
    }
    function register(Request $request)
    {
        $validate = $request->validate([
            'username' => 'unique:users,username',
            'password1' => 'same:password|min:5'
        ], [
            'username.unique' => 'Username Already Exist.',
            'password1.same' => 'Password Not Match, Please Try Again.',
            'password1.min' => 'Password Minimum 5 Character.'
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password1);
        $user->save();
        return redirect()->route('login');
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
