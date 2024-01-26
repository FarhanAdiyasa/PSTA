<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardDAAAController extends Controller
{
    public function index()
    {
        $title = 'Dashboard DAAA';
        return view ('Dashboard_DAAA.index', compact('title'));
    }
    public function Undangan()
    {
        $title = 'Dashboard Undangan';
        return view ('Dashboard_DAAA.Undagan.index', compact('title'));
    }
    //
}
