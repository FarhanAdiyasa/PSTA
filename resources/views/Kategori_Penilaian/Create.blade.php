@extends('layouts.layout')

@section('konten')

<body>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                        <strong class="text-white">Tambah Data Kategori Penilaian</strong>
                    </h5>

                    <div class="card-body">
                        <form action="/kategori_penilaian" method="POST" enctype="multipart/form-data">
                            @csrf

                            <?php

                            use App\Models\mskategoripenilaian; // Sesuaikan namespace dan path model yang sesuai

                            // Fungsi untuk membuat ID baru
                            function generateAutomaticID($konvert = 'KNN')
                            {
                                // Menggunakan Eloquent untuk menghitung jumlah baris
                                $jumlahBaris = mskategoripenilaian::latest()->first('mkp_id');
                                
                                // Memotong tiga karakter pertama
                                $potongDepan = substr($jumlahBaris, 3); 
                                                            
                                // Mengambil tiga karakter terakhir, mengonversi menjadi integer, menambahkan 1
                                $hasilAkhir = intval(substr($potongDepan, -3)) + 1;

                                // Menggunakan sprintf untuk memformat ID
                                $id = sprintf('%s%03d', $konvert, $hasilAkhir);

                                return $id;
                            }
                            if (empty($mkp_id)) {
                                // Buat ID baru jika $mkp_id kosong
                                $mkp_id = generateAutomaticID();
                            }
                            ?>


                            <input type="hidden" name="mkp_id" value="{{ $mkp_id }}" class="form-control" id="mkp_id" aria-describedby="emailHelp" readonly>
                            <div class="mb-3">
                                <label for="mkp_nama" class="form-label" style="font-weight: bold;">Nama<span style="color: red;">*</span></label>
                                <input type="text" name="mkp_nama" value="" class="form-control" id="mkp_nama" aria-describedby="emailHelp">
                                @error('mkp_nama')
                                <span class="text-danger">Nama Kategori penilaian tidak boleh kosong</span><br>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mkp_bobot" class="form-label" style="font-weight: bold;">Bobot<span style="color: red;">*</span></label>
                                <input type="number" step="any" name="mkp_bobot" value="" class="form-control" id="mkp_bobot" />
                                @error('mkp_bobot')
                                <span class="text-danger">Bobot Kategori penilaian tidak boleh kosong</span><br>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" id="submit" title="Submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('#mkp_bobot').on('input', function () {
        var bobotValue = $(this).val();
        
        // Menghapus leading zeros
        bobotValue = bobotValue.replace(/^0+/, '');

        // Menghapus tanda titik
        bobotValue = bobotValue.replace(/\,/g, '');

        // Jika inputan hanya 0 atau kosong, nonaktifkan tombol submit
        if (bobotValue === '0' || bobotValue === '') {
            $('#submit').prop('disabled', true);
        }
        else if(parseFloat(bobotValue) <= -1) {
            $(this).val('0.0');
        }
        else {
            console.log(bobotValue);
            if (bobotValue.includes(',')) {
                bobotValue = bobotValue.replace(',', '.');
            }

            // Jika inputan lebih dari 1, set nilai ke 1.0
            var floatValue = parseFloat(bobotValue);
            if (!isNaN(floatValue) && floatValue > 1) {
                $(this).val('1.0');
            }

            // Aktifkan tombol submit
            $('#submit').prop('disabled', false);
        }
    });
</script>
@endsection
