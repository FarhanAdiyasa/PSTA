<?php

namespace App\Http\Controllers;

use App\Models\mspengguna;
use App\Models\msmahasiswa;
use Illuminate\Http\Request;
use App\Models\mstahunajaran;
use App\Models\mspebimbingpenguji;
use App\Http\Controllers\Controller;
use App\Models\TrPendaftaranSidangTa;
use Illuminate\Support\Facades\DB;

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
            $data = mspebimbingpenguji::where('pbn_id', 'LIKE', '%' . $request->search . '%')
                                        ->where('pbn_status', 1)->paginate(5);
            $title = 'Cari... "' . $request->search . '"';
        } else {
            $penguji = mspengguna::where(['png_role' => 'Pembimbing'])->pluck('png_username');
            $data = mspebimbingpenguji::whereIn('png_username', $penguji)
                                    ->where('pbn_status', 1)->paginate(5);
            $title = 'Pembimbing';
        }

        return view('DashboardKoordinatorTA.Pembimbing.Index', compact('title', 'data'));
    }
    public function Penguji(Request $request) {
        if ($request->has('search')) {
            $data = mspebimbingpenguji::where('pbn_id', 'LIKE', '%' . $request->search . '%')
                                        ->where('pbn_status', 1)->paginate(5);
            $title = 'Cari... "' . $request->search . '"';
        } else {
            $penguji = mspengguna::where(['png_role' => 'Penguji'])->pluck('png_username');
            $data = mspebimbingpenguji::whereIn('png_username', $penguji)
                                    ->where('pbn_status', 1)->paginate(5);
            $title = 'Penguji';
        }
        return view('DashboardKoordinatorTA.Penguji.Index', compact('title', 'data'));
    }
    public function HasilSidang()
    {
        $title = 'Hasil Sidang';
        return view('DashboardKoordinatorTA.HasilSidang.index', compact('title'));
    }
    public function PenilaianSidang()
    {
        $title = 'Penilaian Sidang TA';
        $dataPenilaianSidang = DB::select('SELECT * FROM `vw_penilaian`');
        return view('DashboardKoordinatorTA.PenilaianSidang.index', compact('title', 'dataPenilaianSidang'));
    }
    public function BAPSidang()
    {
        $title = 'BAP Sidang TA';
        return view('DashboardKoordinatorTA.BAPSidang.index', compact('title'));
    }
}
