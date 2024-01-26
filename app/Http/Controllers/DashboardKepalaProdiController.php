<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardKepalaProdiController extends Controller
{
    //
    public function index()
    {
        $title = 'Dashboard Kepala Prodi';
        return view ('Dashboard_Kepala_Prodi.index', compact('title'));
    }
    public function Hasilsidang()
    {
        $title = 'Dashboard Hasil Sidang';
        return view ('Dashboard_Kepala_Prodi.Hasil_sidang_Mahasiswa.index', compact('title'));
    }
    public function grafik_data()
    {
        $title = 'Dashboard Grafik data Sidang';
        return view ('Dashboard_Kepala_Prodi.Grafik_data_sidang.index', compact('title'));
    }
    
    
    
}
