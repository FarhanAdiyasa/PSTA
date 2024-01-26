<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardMahasiswaController extends Controller
{
    //
    public function index()
    {
        $title = 'Dashboard Mahasiswa';
        return view ('Dashboard_Mahasiswa.index', compact('title'));
    }
    public function Pesyaratan_Pendaftaran()
    {
        $title = 'Dashboard Pesyaratan Pendaftaran';
        return view ('Dashboard_Mahasiswa.Pesyaratan_Pendaftaran.index', compact('title'));
    }
    public function Pendaftaran_Sidang()
    {
        $title = 'Dashboard Pendaftaran Sidang';
        return view ('Dashboard_Mahasiswa.Pendaftaran_sidang.index', compact('title'));
    }
    public function Hasil_sidang()
    {
        $title = 'Dashboard Hasil Sidang';
        return view ('Dashboard_Mahasiswa.Hasil_sidang.index', compact('title'));
    }
    
}
