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

    public function UndanganStore(Request $request)
    { 
        $pdft = TrPendaftaranSidangTa::findorfail($request->pdft_id);
        if ($request->hasFile('pdft_undangan')) {
            $filename = $request->pdft_undangan->getClientOriginalName();
            $filenameToStore = time() . '_' . $filename;
            $request->pdft_undangan->storeAs('public/uploads', $filenameToStore);
            $pdft->pdft_undangan = $filenameToStore;
           
            $pdft->save();
            return redirect()->route('DashboardUndangan.Undangan')->with('success', 'Data successfully submitted.');
        }else{
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
     
       
        
    }

}
