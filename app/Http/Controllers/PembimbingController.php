<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\mspebimbingpenguji;
use App\Models\mspengguna;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = mspebimbingpenguji::where('pbn_id', 'LIKE', '%' . $request->search . '%')->paginate(5);
            $title = 'Cari... "' . $request->search . '"';
        } else {
            $data = mspebimbingpenguji::paginate(5);
            $title = 'Pembimbing';
        }

        return view('DashboardKoordinatorTA.Pembimbing.Index', compact('title', 'data'));
    }

    public function create()
    {
        $usernames = mspengguna::where('png_role', 'Pembimbing')->get();
        $title = 'Pembimbing / Tambah';
        $pengujiUsernames = mspebimbingpenguji::pluck('png_username', 'png_username');
        $pbnIds = mspebimbingpenguji::pluck('pbn_id', 'pbn_id');

        return view('DashboardKoordinatorTA.Pembimbing.Create', compact('title', 'pengujiUsernames', 'usernames', 'pbnIds'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'pbn_jenis' => 'required',
            'pbn_nama' => 'required',
            'pbn_jabatan' => 'required',
            'pbn_email' => 'required|email',
            'png_username' => 'required',
        ]);

        $newPbnId = $this->generateUniqueAutomaticID();

        try {
            mspebimbingpenguji::create([
                'pbn_id' => $newPbnId,
                'pbn_jenis' => $request->pbn_jenis,
                'pbn_nama' => $request->pbn_nama,
                'pbn_jabatan' => $request->pbn_jabatan,
                'pbn_email' => $request->pbn_email,
                'png_username' => $request->png_username,
            ]);

            return redirect()->route('Pembimbing')->with('success', 'Data Berhasil Ditambah');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->route('Pembimbing')->with('error', 'Gagal menambahkan data. PBN ID sudah ada.');
        }
    }

    public function generateUniqueAutomaticID($prefix = 'PBN')
    {
        $jumlahisi = mspebimbingpenguji::count();
        $hasil = $jumlahisi + 1;
        $id = sprintf('%s%03d', $prefix, $hasil);

        while (mspebimbingpenguji::where('pbn_id', $id)->exists()) {
            $hasil++;
            $id = sprintf('%s%03d', $prefix, $hasil);
        }

        return $id;
    }

    public function edit($pbn_id)
    {
        $usernames = mspengguna::where('png_role', 'Pembimbing')->get();
        $pengujiUsernames = mspebimbingpenguji::pluck('png_username', 'png_username');
        $data = mspebimbingpenguji::find($pbn_id);
        $title = 'Kategori penilaian/Edit';

        return view('Dashboard.Pebimbing_pengguna.Edit', compact('data', 'title', 'pengujiUsernames', 'usernames'));
    }

    public function updateDataPebimbingPengguna(Request $request, $pbn_id)
    {
        $request->validate([
            'pbn_id' => 'required',
            'pbn_jenis' => 'required',
            'pbn_nama' => 'required',
            'pbn_jabatan' => 'required',
            'pbn_email' => 'required',
            'png_username' => 'required',
        ], [
            'pbn_id.required' => 'ID is required.',
            'pbn_jenis.required' => 'Nama is required.',
            'pbn_nama.required' => 'Bobot is required.',
            'pbn_jabatan.required' => 'Bobot is required.',
            'pbn_email.required' => 'Bobot is required.',
            'png_username.required' => 'Bobot is required.',
        ]);

        $data = mspebimbingpenguji::find($pbn_id);
        $data->update($request->all());

        return redirect()->route('Pembimbing')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($pbn_id)
    {
        $data = mspebimbingpenguji::find($pbn_id);
        $data->delete();

        return redirect()->route('Pembimbing')->with('success', 'Data Berhasil Dihapus');
    }
}
