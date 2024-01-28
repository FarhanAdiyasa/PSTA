<?php

namespace App\Http\Controllers;

use App\Models\mskategoripenilaian; // Add the correct namespace for your model
use Illuminate\Http\Request;

class mskategoripenilaianController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = mskategoripenilaian::where('mkp_nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
            $title = 'Pencarian: "' . $request->search . '"';
        } else {
            $data = mskategoripenilaian::paginate(5);
        $title = 'kategori penilaian';
        }
       
        return view('kategori_penilaian.Index', compact('title', 'data'));
    }
    public function Create()
    {
        $title = 'kategori penilaian / Tambah';

        return view('kategori_penilaian.create', compact('title'));

    }

    public function insertdata(Request $request)
    {
       
        // Validasi input
        $request->validate([
            'mkp_id' => 'required',
            'mkp_nama' => 'required',
            'mkp_bobot' => 'required',
        ]);

        // Menambahkan mkp_id ke dalam data yang akan di-create
        $data = [
            'mkp_id' => $request->mkp_id,
            'mkp_nama' => $request->mkp_nama,
            'mkp_bobot' => $request->mkp_bobot,
        ];

        // Menggunakan create untuk menyimpan data ke dalam database
        mskategoripenilaian::create($data);

        return redirect()->route('kategori_penilaian')->with('success', 'Data Berhasil Ditambah');
    }
    

    
    public function Edit($mkp_id)
    {
        $data = mskategoripenilaian::find($mkp_id);
        $title = 'Kategori penilaian/Edit';
        return view('kategori_penilaian.Edit', compact('data','title'));
    }

    public function updatedata(Request $request, $mkp_id)
    {
        $request->validate([
    'mkp_id' => 'required',
    'mkp_nama' => 'required',
    'mkp_bobot' => 'required',
], [
    'mkp_id.required' => 'ID is required.',
    'mkp_nama.required' => 'Nama is required.',
    'mkp_bobot.required' => 'Bobot is required.',
]);


        $data = mskategoripenilaian::find($mkp_id);
        $data->update($request->all());
        return redirect()->route('kategori_penilaian')->with('success', 'Data Berhasil DI Update');
    }
    public function delete($id)
    {
        $data = mskategoripenilaian::find($id);
        $data->delete();
        return redirect()->route('kategori_penilaian')->with('success', 'Data Berhasil DI Hapus');
    }
}
