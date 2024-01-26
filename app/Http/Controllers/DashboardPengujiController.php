<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPengujiController extends Controller
{
    //
    public function index()
    {
        $title = 'Dashboard Penguji';
        return view ('Dashboard_Penguji.index', compact('title'));
    }
    public function hasil_sidang()
    {
        $title = 'Dashboard Hasil Sidang';
        return view ('Dashboard_Penguji.Hasilsidang.index', compact('title'));
    }
    public function BAP_sidang_TA()
    {
        $title = 'Dashboard BAP Sidang TA';
        return view ('Dashboard_Penguji.BAP_sidang_TA.index', compact('title'));
    }
    public function Form_Penilaian()
    {
        $title = 'Dashboard Form Penilaian';
        return view ('Dashboard_Penguji.Form_Penilaian.index', compact('title'));
    }
    public function Penilaian_Sidang_TA()
    {
        $title = 'Dashboard Hasil Sidang';
        return view ('Dashboard_Penguji.Penilaian_Sidang_TA.index', compact('title'));
    }
}
