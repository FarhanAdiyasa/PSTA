<?php

namespace App\Http\Controllers;

use validation;
use App\Models\mspengguna;
use App\Models\msmahasiswa;
use Illuminate\Http\Request;
use App\Models\mstahunajaran;
use Illuminate\Support\Carbon;
use App\Models\dtlnilaikategori;
use App\Models\mspebimbingpenguji;
use Illuminate\Support\Facades\DB;
use App\Models\mskategoripenilaian;
use Illuminate\Support\Facades\Auth;
use App\Models\TrPendaftaranSidangTa;
use Illuminate\Validation\ValidationException;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use iio\libmergepdf\Merger;
use ZipArchive;
    


class TrPendaftaranSidangTaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TrPendaftaranSidangTa::where('mhs_username', session()->get('png_username'))->paginate(5);
        $title = 'Sidang Tugas Akhir';
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
    public function downloadForm()
    {
        $templatePath = 'penilaian.pdf';
    
        if (Storage::disk('public')->exists($templatePath)) {
            return response()->download(storage_path('app/public/' . $templatePath), 'Template Penilaian.pdf');//Nama
        } else {
            return response()->json(['error' => 'Template not found.'], 404);
        }
    }
    public function downloadUndangan($file)
    {
        if (Storage::disk('public')->exists('uploads/'.$file)) {
            return response()->download(storage_path('app/public/uploads/' . $file), $file);//Nama
        } else {
            return response()->json(['error' => 'Template not found.'], 404);
        }
    }
    public function generatePdfNilai($idTr, $idUsn)
    {
        $nilai = dtlnilaikategori::where(['pdft_id'=>$idTr, 'png_username'=>$idUsn])->get();
        $pdft = TrPendaftaranSidangTa::where(["pdft_id" => $idTr])->first();
        $pdf = Pdf::loadView('Pdf.penilaian', compact(['nilai', 'pdft']));
        return $pdf->download('PS_'.$pdft->mahasiswa->mhs_nama.'_'.$idUsn.'.pdf');//Nama
    }
    public function generatePdfBap($idTr)
    {
        $result = DB::select('CALL sp_total_nilai(?)', array($idTr));
        $pdft = TrPendaftaranSidangTa::where(["pdft_id" => $idTr])->first();
        $penguji = 0;
        if($pdft->pdft_penguji2){
            $penguji++;
        }
        if($pdft->pdft_penguji3){
            $penguji++;
        }
        $pdf = Pdf::loadView('Pdf.berita_acara', compact(['pdft', 'penguji', 'result']));
        return $pdf->download('PS_'.$pdft->mahasiswa->mhs_nama.'_'.$pdft->mhs_username.'.pdf');//Nama
    }
    public function undang(string $id) {
        $pdft = TrPendaftaranSidangTa::findorFail($id);
        $mahasiswa = msmahasiswa::where('mhs_username', $pdft->mhs_username)->first();
        $title = 'Detail Sidang & Undangan Sidang';


        return view('DashboardKoordinatorTA.Pendaftaran_sidang.undang', compact('title', 'pdft', 'mahasiswa'));
    }
    public function generatePdfUndangan($idTr)
    {
        $m = new Merger();
        $pdft = TrPendaftaranSidangTa::where(["pdft_id" => $idTr])->first();
        $gr = mspebimbingpenguji::where(['png_username' => $pdft->pdft_pembimbing1])->first();
        $pdf = Pdf::loadView('Pdf.undangan', compact(['pdft', 'gr']));
        $m->addRaw($pdf->output());
        $pdf2 = PDF::loadView('Pdf.undanganLandscape', compact(['pdft']))->setPaper('a4', 'landscape');
        $nama_file = $pdft->pdft_id.'_Undangan.pdf';//Nama
        $m->addRaw($pdf2->output());
        return response($m->merge())
                ->withHeaders([
                    'Content-Type' => 'application/pdf',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.$nama_file,
                ]);
       
    }
    public function downloadTemplate($file)
    {
        if (Storage::disk('public')->exists('uploads/' . $file)) {
            return response()->download(storage_path('app/public/uploads/' . $file), $file);
        } else {
            return response()->json(['error' => 'Template not found.'], 404);
        }
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

    public function dinilai(string $id) {
        $pdft = TrPendaftaranSidangTa::findorFail($id);
        $mahasiswa = msmahasiswa::where('mhs_username', $pdft->mhs_username)->first();
        $title = 'Detail Penilaian';


        $penguji = TrPendaftaranSidangTa::where(['pdft_id' => $id])
                                        ->first(['pdft_penguji1', 'pdft_penguji2', 'pdft_penguji3']);

        $penilaianPenguji1 = $penilaianPenguji2 = $penilaianPenguji3 = [];

        if ($penguji !== null) {
            foreach (range(1, 3) as $index) {
                $pengujiField = "pdft_penguji{$index}";

                if ($penguji->$pengujiField !== null) {
                    $penilaianField = "penilaianPenguji{$index}";

                    $$penilaianField = dtlnilaikategori::where('png_username', $penguji->$pengujiField)
                        ->where('pdft_id', $id)
                        ->get();
                }
            }
        }
        return view('DashboardKoordinatorTA.HasilSidang.index', compact('title', 'pdft', 'mahasiswa', 'penilaianPenguji1', 'penilaianPenguji2', 'penilaianPenguji3'));
    }

    public function detail(string $id) {
        $pdft = TrPendaftaranSidangTa::findorFail($id);
        $mahasiswa = msmahasiswa::where('mhs_username', $pdft->mhs_username)->first();
        $title = 'Detail Penilaian';


        $penguji = TrPendaftaranSidangTa::where(['pdft_id' => $id])
                                        ->first(['pdft_penguji1', 'pdft_penguji2', 'pdft_penguji3']);

        $penilaianPenguji1 = [];
        $penilaianPenguji2 = [];
        $penilaianPenguji3 = [];

        if ($penguji !== null) {
            foreach (range(1, 3) as $index) {
                $pengujiField = "pdft_penguji{$index}";

                if ($penguji->$pengujiField !== null) {
                    $penilaianField = "penilaianPenguji{$index}";
                    $$penilaianField = dtlnilaikategori::where('png_username', $penguji->$pengujiField)
                        ->where('pdft_id', $id)
                        ->get();
                }
            }
        }
        return view('Dashboard_Mahasiswa.Hasil_sidang.detail', compact('title', 'pdft', 'mahasiswa', 'penilaianPenguji1', 'penilaianPenguji2', 'penilaianPenguji3'));
    }

    public function penilaian() {
        $data = DB::select('SELECT * FROM `vw_penilaian`');
        $title = 'Penilaian Sidang';
        return view('Dashboard_Penguji.Penilaian_Sidang_TA.Index', compact('title', 'data'));
    }

    public function nilai(string $id) {
        $data = TrPendaftaranSidangTa::where('pdft_id', $id)->first();
        $mahasiswa = DB::select("SELECT * FROM `sidangta_msmahasiswa` WHERE `mhs_username` = ? LIMIT 1", [$data->mhs_username]);
        $title = 'Penilaian Sidang';
        $mahasiswa = $mahasiswa[0];

        //Kategori Penilaian
        $kategori = mskategoripenilaian::all();
        return view('Dashboard_Penguji.Penilaian_Sidang_TA.create', compact('title', 'data', 'mahasiswa', 'kategori'));
    }

    public function penilaian_save(Request $request, string $id) {
        try {
            // Get category IDs
            $dataKategori = mskategoripenilaian::pluck('mkp_id');
            // Get all categories
            $kategori = mskategoripenilaian::all();
            // Get all request data
            $requestData = $request->all();
    
            // Validate each category
            foreach ($dataKategori as $kategoriId) {
                $request->validate([
                    $kategoriId => 'required',
                ]);
            }
    
            // Extract data from the request excluding the first two keys
            $filteredData = array_slice($requestData, 2, null, true);

            // Convert the values to integers
            $filteredData = array_map('intval', $filteredData);

            $sum = array_sum($filteredData);

            // Divide the sum by 3 and convert to integer
            $roundedSum = floor($sum / 3);
            // Output the result
            $lulus = "lulus";
            if($roundedSum >= 20){
                $lulus = "Lulus";
            }else if($roundedSum >=10 && $roundedSum <20){
                $lulus = "Revisi";
            }else{$lulus = " Tidak Lulus";
            }

            DB::update('UPDATE `sidangta_trpendaftaransidangta` SET pdft_totalnilai =  ?, pdf_statuskelulusan = ? WHERE pdft_id = ?', [$roundedSum, $lulus, $id]);

            

            // Insert data into the database
            foreach ($kategori as $item) {
                DB::table('sidangta_dtlnilaikategori')->insert([
                    'dnk_id' => $request->dnk_id,
                    'mkp_id' => $item->mkp_id,
                    'mkp_nama' => $item->mkp_nama,
                    'dnk_nilai' => $filteredData[$item->mkp_id],
                    'pdft_id' => $id,
                    'png_username' => session()->get('png_username')
                ]);
            }
    
            return redirect()->route('Penilaian.sidang')->with('success', 'Data successfully submitted.');
    
        } catch (ValidationException $e) {
            // Handle validation exception here
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions here
            return response()->json(['error' => $e], 500);
        }
    }
    
}
