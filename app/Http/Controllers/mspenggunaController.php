<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\mspengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
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
        // Validasi input
        $validator = Validator::make($request->all(), [
            'png_username' => 'required',
            'png_password' => 'required',
        ]);
    
        // Cek validasi
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        }
    
        $username = $request->input('png_username');
        $password = $request->input('png_password');
    
        // Retrieve the user from the database based on the provided username
        $user = mspengguna::where('png_username', $username)->first();
    
        // Check if the user exists and verify the password
        if ($user && password_verify($password, $user->getOriginal('png_password'))) {
            // Authentication successful, create a session and redirect to the dashboard
            Session::put('username', $user->png_username);
    
            // Check if the user has the 'png_role' field in the model
            if ($user->png_role) {
                Session::put('png_role', $user->png_role);
        
                // Redirect based on user role
                switch ($user->png_role) {
                    case 'Mahasiswa':
                        return redirect()->route('DashboardMahasiswa.index');
                    case 'Pembimbing':
                        return redirect()->route('DashboardPebimbing.index');
                    case 'Kepala_Prodi':
                        return redirect()->route('DashboardKepalaProdi.index');
                    case 'Penguji':
                        return redirect()->route('DashboardPenguji.index');
                    case 'DAAA':
                        return redirect()->route('DashboardDAAA.index');
                     case 'Koordinator_TA':
                         return redirect()->route('dashboard.index');
                    // Add more cases for other roles if needed
                    default:
                        return redirect('/dashboard');
                }
            }
        }
    
        // Authentication failed
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
        Auth::logout();
        return view('login');
    }
    
}
