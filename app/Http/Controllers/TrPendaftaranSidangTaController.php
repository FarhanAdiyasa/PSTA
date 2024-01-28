<?php

namespace App\Http\Controllers;

use App\Models\mspengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\mspebimbingpenguji;
use App\Models\mstahunajaran;
use Illuminate\Support\Facades\DB;
use App\Models\TrPendaftaranSidangTa;
use Illuminate\Support\Facades\Storage;
    use ZipArchive;
    

class TrPendaftaranSidangTaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TrPendaftaranSidangTa::paginate(5);
        $title = 'Pembimbing';
        return view('Dashboard_Mahasiswa.Pendaftaran_Sidang.Index', compact('title', 'data'));
    }
    public function indexKoor()
    {
        $data = TrPendaftaranSidangTa::paginate(5);
        $title = 'Pembimbing';
        return view('DashboardKoordinatorTA.Pendaftaran_Sidang.Index', compact('title', 'data'));
    }
    public function setujui($id)
    {
        $title = 'Pembimbing / Tambah';
        $pdft = TrPendaftaranSidangTa::where(["pdft_id" => $id])->first();
        return view('DashboardKoordinatorTA.Pendaftaran_Sidang.Setujui', compact('title', 'pdft'));
    }
    public function verifikasi($id)
    {   
        $pdft = TrPendaftaranSidangTa::findorfail($id);
        $title = 'Pembimbing / Lengkapi';
        return view('DashboardKoordinatorTA.Pendaftaran_Sidang.verifikasi', compact('title', 'pdft'));
    }
    public function verifikasiStore(Request $request, $id)
    {   
        $pdft = TrPendaftaranSidangTa::findorfail($id);
        if($pdft->pdft_jenissidang == "Online"){
            $pdft->pdft_link = $request->pdft_link;
           
        }else{
            $pdft->pdft_tempatsidang2 = $request->pdft_tempatsidang2;
        }
        $pdft->pdft_statusverifikasidata = 'True';
        $pdft->save();
        return redirect()->route('SidangKoor')->with('success', 'Pengajuan Disetujui!');
    }
    public function disetujui($id)
    {
        $pdft = TrPendaftaranSidangTa::where(["pdft_id" => $id])->first();
        $pdft->pdft_statusverifikasidokumen = "Disetujui";
        $pdft->save();
        return redirect()->route('SidangKoor')->with('success', 'Pengajuan Disetujui!');
    }
    public function downloadTemplate($file)
    {
        if (Storage::disk('public')->exists('uploads/' . $file)) {
            return response()->download(storage_path('app/public/uploads/' . $file), $file);
        } else {
            return response()->json(['error' => 'Template not found.'], 404);
        }
    }
    public function downloadAll($id)
    {
        $pdft = TrPendaftaranSidangTa::where(["pdft_id" => $id])->first();
        $files = [
            'uploads/' . $pdft->pdft_bapsuratketerangan,
            'uploads/' . $pdft->pdft_bapprasidang,
            'uploads/' . $pdft->pdft_bapbimbingan,
            'uploads/' . $pdft->pdft_baplembarpersetujuan,
        ];
    
        // Create a temporary file for the zip archive
        $tanggal = Carbon::parse($pdft->pdft_tanggalidbuat)->format('dmY');
       $zipFileName = 'Pengajuan_'.$pdft->mhs_nim.'_'.$tanggal.'.zip';
        $zipFilePath = storage_path('app/' . $zipFileName);
        $zip = new ZipArchive();
    
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($files as $file) {
                // Add each file to the zip archive
                $fileContent = Storage::get($file);
                $zip->addFromString(basename($file), $fileContent);
            }
            $zip->close();
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Failed to create zip archive.'], 500);
        }
    }
    
    
    public function create()
    {
        $title = 'Pembimbing / Tambah';
        $pbnIds = TrPendaftaranSidangTa::pluck('pdft_id', 'pdft_id');

        return view('Dashboard_Mahasiswa.Pendaftaran_Sidang.Create', compact('title', 'pbnIds'));
    }
    public function complete($id)
    {   
        $pdft = TrPendaftaranSidangTa::findorfail($id);
        $title = 'Pembimbing / Lengkapi';
        $pembimbing =  DB::table('sidangta_mspembimbingpenguji')
        ->join('sidangta_mspengguna', 'sidangta_mspembimbingpenguji.png_username', '=', 'sidangta_mspengguna.png_username')
        ->where('sidangta_mspengguna.png_role', 'Pembimbing')
        ->select('sidangta_mspengguna.png_username')
        ->get();

        $penguji = DB::table('sidangta_mspembimbingpenguji')
        ->join('sidangta_mspengguna', 'sidangta_mspembimbingpenguji.png_username', '=', 'sidangta_mspengguna.png_username')
        ->where('sidangta_mspengguna.png_role', 'Penguji')
        ->select('sidangta_mspengguna.png_username')
        ->get();
        $tahun = mstahunajaran::get();

        return view('Dashboard_Mahasiswa.Pendaftaran_Sidang.complete', compact('title', 'pdft', 'penguji', 'pembimbing', 'tahun'));
    }
    public function completeStore(Request $request, $id)
    {   
       
        $validatedData = $request->validate([
            'pdft_perusahaan' => 'required',
            'pdft_tanggalmulai' => 'required',
            'pdft_judultugasakhir' => 'required',
            'pdft_tanggaldibuat' => 'required',
            'pdft_hrd' => 'required',
            'pdft_tanggalsidang' => 'required',
            'pdft_jenissidang' => 'required',
            'pdft_pembimbing1' => 'required|string',
            'pdft_penguji1' => 'required|string',
            'thn_id' => 'required|string',
            'pdft_pembimbing2' => 'nullable',
            'pdft_penguji2' => 'nullable',
            'pdft_penguji3' => 'nullable',
        ]);
        try {
           
            $pdft = TrPendaftaranSidangTa::findorfail($id);
            $tanggalSidang = $validatedData['pdft_tanggalsidang'];
            $tanggalCarbon = Carbon::parse($tanggalSidang);
            $waktuSidang = $tanggalCarbon->format('H:i'); 
            $pdft->pdft_waktu = $waktuSidang;
            $pdft->update($validatedData);
            return redirect()->route('Sidang')->with('success', 'Pendaftaran Sidang Berhasil Dilengkapi');
        } catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
            return redirect()->route('Sidang')->with('error', $ex->getMessage());
        }
    }

    public function Daftar(Request $request)
    {
        $rules = [
            'pdft_id' => 'required|string',
            'pdft_bapsuratketerangan' => 'required|mimes:doc,docx,pdf|max:2048',
            'pdft_bapprasidang' => 'required|mimes:doc,docx,pdf|max:2048',
            'pdft_bapbimbingan' => 'required|mimes:doc,docx,pdf|max:2048',
            'pdft_baplembarpersetujuan' => 'required|mimes:doc,docx,pdf|max:2048',
        ];
        $messages = [
            'required' => 'The :attribute field is required.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'max' => 'The :attribute may not be greater than :max kilobytes.',
        ];
        $validatedData = $request->validate($rules, $messages);
        if ($request->hasFile('pdft_bapsuratketerangan')) {
            $filename = $request->pdft_bapsuratketerangan->getClientOriginalName();
            $filenameToStore = time() . '_' . $filename;
            $request->pdft_bapsuratketerangan->storeAs('public/uploads', $filenameToStore);
            $validatedData['pdft_bapsuratketerangan'] = $filenameToStore;
        }
        if ($request->hasFile('pdft_bapprasidang')) {
            $filename = $request->pdft_bapprasidang->getClientOriginalName();
            $filenameToStore = time() . '_' . $filename;
            $request->pdft_bapprasidang->storeAs('public/uploads', $filenameToStore);
            $validatedData['pdft_bapprasidang'] = $filenameToStore;
        }
        if ($request->hasFile('pdft_bapbimbingan')) {
            $filename = $request->pdft_bapbimbingan->getClientOriginalName();
            $filenameToStore = time() . '_' . $filename;
            $request->pdft_bapbimbingan->storeAs('public/uploads', $filenameToStore);
            $validatedData['pdft_bapbimbingan'] = $filenameToStore;
        }
        if ($request->hasFile('pdft_baplembarpersetujuan')) {
            $filename = $request->pdft_baplembarpersetujuan->getClientOriginalName();
            $filenameToStore = time() . '_' . $filename;
            $request->pdft_baplembarpersetujuan->storeAs('public/uploads', $filenameToStore);
            $validatedData['pdft_baplembarpersetujuan'] = $filenameToStore;
        }
      
        $validatedData['pdft_tanggaldibuat'] = Carbon::now();
        $validatedData['mhs_username'] = auth('mahasiswa')->user()->mhs_username;
        try {
            TrPendaftaranSidangTa::create($validatedData);
            return redirect()->route('Sidang')->with('success', 'Data successfully submitted.');
        } catch (\Exception $e) {
            dd($e->getMessage());   
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TrPendaftaranSidangTa $trPendaftaranSidangTa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrPendaftaranSidangTa $trPendaftaranSidangTa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrPendaftaranSidangTa $trPendaftaranSidangTa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrPendaftaranSidangTa $trPendaftaranSidangTa)
    {
        //
    }
}
