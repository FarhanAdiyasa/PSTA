@extends('layouts.layout')

@section('konten')

<body>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                        <strong class="text-white">Tambah Data Pembimbing dan Penguji</strong>
                    </h5>

                    <div class="card-body">
                        <form action="{{route('Pembimbing.Insert')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <?php

                            use App\Models\mspebimbingpenguji; // Sesuaikan namespace dan path model yang sesuai

                            // Anggap $mkp_id adalah ID yang sudah ada atau diambil dari suatu sumber

                            // Fungsi untuk membuat ID baru
                            function generateAutomaticID($prefix = 'PBN')
                            {
                                // Menggunakan Eloquent untuk menghitung jumlah baris
                                $jumlahisi = mspebimbingpenguji::count();

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


                            <input type="hidden" name="pbn_id" value="{{ $pbn_id }}" class="form-control" id="pbn_id" aria-describedby="emailHelp" readonly>
                            <input type="hidden" name="pbn_status" value="1" class="form-control" id="pbn_status">

                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="pbn_jenis" class="form-label" style="font-weight: bold;">Jenis<span style="color: red;">*</span></label>
                                    <select name="pbn_jenis" class="form-control" id="pbn_jenis" aria-describedby="emailHelp">
                                        <option value="" selected disabled>Pilih Jenis</option>
                                        <option value="Akademik">Akademik</option>
                                        <option value="Industri">Industri</option>
                                    </select>
                                    @error('pbn_jenis')
                                    <span class="text-danger">Jenis tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pbn_nama" class="form-label" style="font-weight: bold;">Nama<span style="color: red;">*</span></label>
                                    <input type="text" name="pbn_nama" value="" class="form-control" id="pbn_nama" aria-describedby="emailHelp">
                                    @error('pbn_nama')
                                    <span class="text-danger">Nama tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pbn_jabatan" class="form-label" style="font-weight: bold;">Jabatan<span style="color: red;">*</span></label>
                                    <input type="text" name="pbn_jabatan" value="" class="form-control" id="pbn_jenis" aria-describedby="emailHelp">
                                    @error('pbn_jabatan')
                                    <span class="text-danger">Jabatan tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pbn_email" class="form-label" style="font-weight: bold;">Email<span style="color: red;">*</span></label>
                                    <input type="email" name="pbn_email" value="" class="form-control" id="pbn_email" aria-describedby="emailHelp">
                                    @error('pbn_email')
                                    <span class="text-danger">Email tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="png_username" class="form-label" style="font-weight: bold;">Username<span style="color: red;">*</span></label>
                                    <select name="png_username" class="form-control" id="png_username" aria-describedby="emailHelp">
                                        <option value="" selected disabled>Pilih Username</option>
                                        @foreach($usernames as $username)
                                        <option value="{{$username->png_username}}">{{ $username->png_username }}</option>
                                        @endforeach
                                    </select>
                                    @error('png_username')
                                    <span class="text-danger">Username tidak boleh kosong</span><br>
                                    @enderror
                                </div>




                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" title="Submit">Submit</button>
                                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection