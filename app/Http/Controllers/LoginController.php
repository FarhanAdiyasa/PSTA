<?php

namespace App\Http\Controllers;

use App\Models\mspengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Perbarui impor Hash
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginproses(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }

        return redirect('login');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function registeruser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'ID is required.',
            'email.required' => 'Nama is required.',
            'password.required' => 'Bobot is required.',
        ]);

        mspengguna::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        } elseif (Auth::guard('pengguna')->check()) {
            Auth::guard('pengguna')->logout();
        } 
        Auth::guard('mahasiswa')->logout();
        Auth::guard('pengguna')->logout();
        return redirect()->route('login');
    }
}
