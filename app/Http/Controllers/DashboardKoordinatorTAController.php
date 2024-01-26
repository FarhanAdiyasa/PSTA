<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\msmahasiswa;
use App\Models\mspebimbingpenguji;
use App\Models\mstahunajaran;
use Illuminate\Http\Request;

class DashboardKoordinatorTAController extends Controller
{
    //
    public function index()
    {
        $title = 'Dashboard Koordinator TA';
        return view('DashboardKoordinatorTA.index', compact('title'));
    }
    public function Pembimbing(Request $request)
    {
        $title = 'Pembimbing';

        if ($request->has('search')) {
            $data = mspebimbingpenguji::where('pbn_id', 'LIKE', '%' . $request->search . '%')->paginate(5);
            $title = 'Cari... "' . $request->search . '"';
        } else {
            $data = mspebimbingpenguji::paginate(5);
            $title = 'Pembimbing';
        }

        return view('DashboardKoordinatorTA.Pembimbing.Index', compact('title', 'data'));
    }
    public function HasilSidang()
    {
        $title = 'Hasil Sidang';
        return view('DashboardKoordinatorTA.HasilSidang.index', compact('title'));
    }
    public function PenilaianSidang()
    {
        $title = 'Penilaian Sidang TA';
        return view('DashboardKoordinatorTA.PenilaianSidang.index', compact('title'));
    }
    public function BAPSidang()
    {
        $title = 'BAP Sidang TA';
        return view('DashboardKoordinatorTA.BAPSidang.index', compact('title'));
    }
}
