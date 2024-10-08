@extends('layouts.layout')
@section('konten')
<body>
<div class="container">
    <div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                        <strong class="text-white">Ubah Data Kategori Penilaian</strong>
                    </h5>
                    <div class="card-body">
                        <form action="/kategori_penilaian/updatedata/{{$data->mkp_id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="mkp_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{$data->mkp_id}}"readonly>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"style="font-weight: bold;">Nama</label>
                                <input type="text" name="mkp_nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{$data->mkp_nama}}">
                                @error('mkp_nama')
                                <span class="text-danger">Nama Kategori penilaian tidak boleh kosong</span><br>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"style="font-weight: bold;">Bobot</label>
                                <input type="text" step="any" name="mkp_bobot" class="form-control" id="mkp_bobot" value="{{$data->mkp_bobot}}">
                                @error('mkp_bobot')
                                <span class="text-danger">Bobot Kategori penilaian tidak boleh kosong</span><br>
                                @enderror
                            </div>
                            
                            <div class="row">
                            <div class="col-md-12">
                            <button type="submit" id="submit" class="btn btn-primary" title="Submit">Ubah</button>
                            <a href="/kategori_penilaian" class="btn btn-secondary">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                            </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
