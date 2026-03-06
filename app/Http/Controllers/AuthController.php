<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login'); // ← Dossier auth
    }

    public function showRegister() {
        return view('auth.register'); // ← Dossier auth
    }

    public function login(Request $request) {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
                
            if (Auth::user()->role === 'admin') {
                 return redirect()->route('admin.dashboard');
            } else {
                return redirect('/');  // page utilisateur
            }
        }
        return back()->withErrors(['email' => 'Identifiants incorrects']);
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        Auth::login($user);
        return redirect('/');
    }
}
