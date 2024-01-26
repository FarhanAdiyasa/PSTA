<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPebimbingController extends Controller
{
    //
    public function index()
    {
        $title = 'Dashboard Pebimbing';
        return view ('Dashboard_Pebimbing.index', compact('title'));
    }
    public function hasilSidang()
    {
        $title = 'Dashboard Hasil Sidang';
        return view ('Dashboard_Pebimbing.hasil_sidang.index', compact('title'));
    }
    public function Sidang_bap_ta()
    {
        $title = 'Dashboard Hasil Sidang';
        return view ('Dashboard_Pebimbing.Sidang_BAP_TA.index', compact('title'));
    }
    public function Undangan_sidang()
    {
        $title = 'Dashboard Hasil Sidang';
        return view ('Dashboard_Pebimbing.Undangan_sidang.index', compact('title'));
    }
}
