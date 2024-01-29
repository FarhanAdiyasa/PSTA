<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TrPendaftaranSidangTa;

class DashboardPebimbingController extends Controller
{
    //
    public function index()
    {
        $title = 'Dashboard Pebimbing';
        $result = DB::select('CALL sp_total_nilai(?)', array("PDFT002"));
        $pdft = TrPendaftaranSidangTa::where(["pdft_id" => "PDFT002"])->first();
        $penguji = 1;
        if($pdft->pdft_penguji2){
            $penguji++;
        }
        if($pdft->pdft_penguji3){
            $penguji++;
        }
        return view ('Pdf.berita_acara', compact('title', 'pdft', 'result', 'penguji'));
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
