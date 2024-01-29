<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TrPendaftaranSidangTa;

class DashboardDAAAController extends Controller
{
    public function index()
    {
        $title = 'Dashboard DAAA';
        return view ('Dashboard_DAAA.index', compact('title'));
    }
    public function Undangan()
    {
        $data = TrPendaftaranSidangTa::paginate(5);
        $title = 'Dashboard Undangan';
        return view ('Dashboard_DAAA.undangan', compact('title', 'data'));
    }
    //
}
