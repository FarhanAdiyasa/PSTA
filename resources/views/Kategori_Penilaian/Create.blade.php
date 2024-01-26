@extends('layouts.layout')

@section('konten')

<body>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #0059AB;">
                        <strong class="text-white">Tambah Data Kategori Penilaian</strong>
                    </h5>

                    <div class="card-body">
                        <form action="/insertdata" method="POST" enctype="multipart/form-data">
                            @csrf

                            <?php

                            use App\Models\mskategoripenilaian; // Sesuaikan namespace dan path model yang sesuai

                            // Fungsi untuk membuat ID baru
                            function generateAutomaticID($konvert = 'KNN')
                            {
                                // Menggunakan Eloquent untuk menghitung jumlah baris
                                $jumlahBaris = mskategoripenilaian::count();

                                // Menambahkannya dengan 1
                                $hasilAkhir = $jumlahBaris + 1;

                                // Menggunakan sprintf untuk memformat ID
                                $id = sprintf('%s%03d', $konvert, $hasilAkhir);

                                return $id;
                            }
                            if (empty($mkp_id)) {
                                // Buat ID baru jika $mkp_id kosong
                                $mkp_id = generateAutomaticID();
                            }
                            ?>


                            <div class="mb-3">
                                <label for="mkp_id" class="form-label" style="font-weight: bold;">ID <span style="color: red;">*</span></label>
                                <input type="text" name="mkp_id" value="{{ $mkp_id }}" class="form-control" id="mkp_id" aria-describedby="emailHelp" readonly>
                                @error('mkp_id')
                                <span class="text-danger">{{ $message }}</span><br>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mkp_nama" class="form-label" style="font-weight: bold;">Nama<span style="color: red;">*</span></label>
                                <input type="text" name="mkp_nama" value="" class="form-control" id="mkp_nama" aria-describedby="emailHelp">
                                @error('mkp_nama')
                                <span class="text-danger">Nama Kategori penilaian tidak boleh kosong</span><br>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mkp_bobot" class="form-label" style="font-weight: bold;">Bobot<span style="color: red;">*</span></label>
                                <input type="number" name="mkp_bobot" value="" class="form-control" id="mkp_bobot" aria-describedby="emailHelp">
                                @error('mkp_bobot')
                                <span class="text-danger">Bobot Kategori penilaian tidak boleh kosong</span><br>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" title="Submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
