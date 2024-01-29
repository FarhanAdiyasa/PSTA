<?php

namespace App\Http\Controllers;

use App\Models\mspengguna;
use App\Models\msmahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class mspenggunaController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
   


    public function loginproses(Request $request)
    {
        $mahasiswa = msmahasiswa::where('mhs_username', $request->username)->first();
        if ($mahasiswa && Hash::check($request->katasandi, $mahasiswa->mhs_password)) {
            session()->put('png_username', $request->username);
            $credentials = [
                'mhs_username' => $request->username,
                'password' => $request->katasandi,
            ];
            if (Auth::guard('mahasiswa')->attempt($credentials)) {
                return redirect()->route('DashboardMahasiswa.index');
            }
        } 
        $pengguna = mspengguna::where('png_username', $request->username)->first();
        if ($pengguna && Hash::check($request->katasandi, $pengguna->png_password)) {
            session()->put('png_username', $request->username);
            $credentials = [
                'png_username' => $request->username,
                'password' => $request->katasandi,
            ];
            if (Auth::guard('pengguna')->attempt($credentials)) {
                switch ($pengguna->png_role) {
                    case 'Pembimbing':
                        return redirect()->route('DashboardPebimbing.index');
                    case 'Kepala Prodi':
                        return redirect()->route('DashboardKepalaProdi.index');
                    case 'Penguji':
                        return redirect()->route('DashboardPenguji.index');
                    case 'DAAA':
                        return redirect()->route('DashboardDAAA.index');
                     case 'Koordinator TA':
                         return redirect()->route('DashboardKoordinatorTA.index');
                    default:
                        return redirect('/dashboard');
                } 
            }
        } 
    
        return redirect('login')->with('error', 'Username dan Password salah');
    }
    public function register(Request $request)
    {
        
        $title = 'Dashboard Koordinasi TA';
        return view('register', compact('title'));
      
    }
    public function Index_register()
    {
        $data = mspengguna::paginate(5);
        $title = 'Dashboard Koordinasi TA';
        return view('index', compact('title','data'));
      
    }

    public function registeruser(Request $request)
    {
        // Pastikan model User diimpor dengan benar di atas namespace Controller
     
        mspengguna::create([
            'png_username' => $request->png_username,
            'png_password' => bcrypt($request->png_password),
            'remember_token' => Str::random(60),
            'png_role' => $request->png_role,       
        ]);
      
        return redirect('Indexregister');
    }
    public function delete_pengguna($id)
    {
        $data = mspengguna::find($id);
        $data->delete();
        return redirect()->route('Indexregister')->with('success', 'Data Berhasil DI Hapus');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function logout()
    {
        if (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        } elseif (Auth::guard('pengguna')->check()) {
            Auth::guard('pengguna')->logout();
        } 
        return redirect()->route('login');
    }
    
}
