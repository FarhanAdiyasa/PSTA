@extends('layouts.layout')

@section('konten')
@if (session('error'))
<div class="alert alert-warning">{{ session('error') }}</div>
@endif
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                        <strong class="text-white">Pendaftaran Sidang Tugas Akhir</strong>
                    </h5>

                    <div class="card-body">
                        <form action="{{ route('Sidang.Insert') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <?php

                            use App\Models\TrPendaftaranSidangTa; // Sesuaikan namespace dan path model yang sesuai

                            // Anggap $mkp_id adalah ID yang sudah ada atau diambil dari suatu sumber

                            // Fungsi untuk membuat ID baru
                            function generateAutomaticID($prefix = 'PDFT')
                            {
                                // Menggunakan Eloquent untuk menghitung jumlah baris
                                $jumlahisi = TrPendaftaranSidangTa::count();

                                // Menambahkannya dengan 1
                                $hasil = $jumlahisi + 1;

                                // Menggunakan sprintf untuk memformat ID
                                $id = sprintf('%s%03d', $prefix, $hasil);

                                return $id;
                            }

                            // Periksa apakah $mkp_id kosong atau tidak diatur
                            if (empty($pbn_id)) {
                                // Buat ID baru jika $mkp_id kosong
                                $pbn_id = generateAutomaticID();
                            }
                            ?>

                            <div class="mb-3">
                                <input type="hidden" name="pdft_id" class="form-control" id="pdft_id" value="{{ generateAutomaticID('PDFT') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="pdft_bapsuratketerangan" class="form-label">BAP Surat Keterangan</label>
                                <input type="file" name="pdft_bapsuratketerangan" class="form-control" id="pdft_bapsuratketerangan" accept=".pdf">
                                @error('pdft_bapsuratketerangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pdft_bapprasidang" class="form-label">BAP Prasidang</label>
                                <input type="file" name="pdft_bapprasidang" class="form-control" id="pdft_bapprasidang" accept=".pdf">
                                @error('pdft_bapprasidang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pdft_bapbimbingan" class="form-label">BAP Bimbingan</label>
                                <input type="file" name="pdft_bapbimbingan" class="form-control" id="pdft_bapbimbingan" accept=".pdf">
                                @error('pdft_bapbimbingan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pdft_baplembarpersetujuan" class="form-label">BAP Lembar Persetujuan</label>
                                <input type="file" name="pdft_baplembarpersetujuan" class="form-control" id="pdft_baplembarpersetujuan" accept=".pdf">
                                @error('pdft_baplembarpersetujuan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
