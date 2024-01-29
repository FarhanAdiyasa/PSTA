@extends('layouts.layout')

@section('konten')
@if (session('error'))
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<div class="alert alert-warning">{{ session('error') }}</div>
@endif
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                        <strong class="text-white">Data Mahasiswa</strong>
                    </h5>

                    <div class="card-body">
                        <form enctype="multipart/form-data">
                            @csrf   
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="pdft_perusahaan" class="form-label" style="font-weight: bold;">Nama Mahasiswa</label>
                                    <input type="text" name="pdft_perusahaan" class="form-control" id="pdft_perusahaan" aria-describedby="emailHelp" value="{{$mahasiswa->mhs_nama}}" readonly>
                                </div>
                            
                                <div class="mb-3 col-4">
                                    <label for="pdft_tanggalmulai" class="form-label" style="font-weight: bold;">HRD</label>
                                    <input type="text" name="pdft_tanggalmulai" value="{{$data->pdft_hrd}}" class="form-control" id="pdft_tanggalmulai" readonly>
                                    
                                </div>
                            
                                <div class="mb-3 col-4">
                                    <label for="pdft_judultugasakhir" class="form-label" style="font-weight: bold;">Perusahaan</label>
                                    <input type="text" name="pdft_judultugasakhir" value="{{$data->pdft_perusahaan}}" class="form-control" id="pdft_judultugasakhir"  readonly>
                                    
                                </div>
                            </div>
                            
                        
                            <div class="mb-3">
                                <label for="pdft_tanggaldibuat" class="form-label" style="font-weight: bold;">Judul Tugas Akhir</label>
                                <input type="text" name="pdft_tanggaldibuat" value="{{$data->pdft_judultugasakhir}}" class="form-control" id="pdft_tanggaldibuat"  readonly>
                                
                            </div>
                    
                        </form>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-12" style="border: 2em">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                        <strong class="text-white">Lembar Penilaian</strong>
                    </h5>

                    <div class="card-body">
                        <form action="/PenilaianSidang/{{$data->pdft_id}}/save" method="POST" enctype="multipart/form-data">
                            @csrf   
                            <?php

                            use App\Models\dtlnilaikategori; // Sesuaikan namespace dan path model yang sesuai

                            // Anggap $mkp_id adalah ID yang sudah ada atau diambil dari suatu sumber

                            // Fungsi untuk membuat ID baru
                            function generateAutomaticID($prefix = 'DNK')
                            {
                                // Menggunakan Eloquent untuk menghitung jumlah baris
                                $jumlahisi = dtlnilaikategori::count();

                                // Menambahkannya dengan 1
                                $hasil = $jumlahisi + 1;

                                // Menggunakan sprintf untuk memformat ID
                                $id = sprintf('%s%03d', $prefix, $hasil);

                                return $id;
                            }

                            // Periksa apakah $mkp_id kosong atau tidak diatur
                            if (empty($dnk_id)) {
                                // Buat ID baru jika $mkp_id kosong
                                $dnk_id = generateAutomaticID();
                            }
                            ?>
                            <input type="hidden" class="form-control nilai" name="dnk_id" placeholder="Nilai" value="{{ $dnk_id }}"/>
                            <table id="Penilaian" class="table datable" width="100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">No.</th>
                                        <th class="align-middle text-center">Kategori Penilaian</th>
                                        <th class="align-middle text-center">Bobot (%)</th>
                                        <th class="align-middle text-center">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    $total = 0;
                                    @endphp
                                    @foreach ($kategori as $item)
                                        @php
                                            $total = $total + $item->mkp_bobot;
                                        @endphp
                                        <tr>
                                            <td class="align-middle text-center col-2">{{$no}}</td>
                                            <td class="align-middle text-center col-4">{{$item->mkp_nama}}</td>
                                            <td class="align-middle text-center col-4">{{$item->mkp_bobot * 100}} %</td>
                                            <td class="align-middle text-center col-2">
                                                <input type="number" min="0" max="100" name="{{$item->mkp_id}}" class="form-control nilai" placeholder="Nilai" value="{{ old($item->mkp_id) }}"/>
                                                @error($item->mkp_id)
                                                    <span class="text-danger">Masukan Nilai!</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var jenisSelect = document.getElementById('pdft_jenissidang');
            var tempatSidang1 = document.getElementById('pdft_tempatsidang1');
            var waktuInput = document.getElementById('pdft_waktu');

            function setFieldsVisibility() {
                var selectedJenis = jenisSelect.value;
    
                if (selectedJenis === 'Offline') {
                    tempatSidang1.style.display = 'block';
                    tempatSidang1.required = true; 
                } else {
                    tempatSidang1.style.display = 'none';
                    tempatSidang1.required = false;
                }

            }

            setFieldsVisibility();

            jenisSelect.addEventListener('change', function() {
                setFieldsVisibility();
            });
        });

        
        $(document).ready( function () {
            $('#Pebimbing_penguji').DataTable();
            $('#Penilaian').DataTable();

            $('.nilai').on('input', function() {
                var value = parseInt($(this).val());

                // Check if the entered value is less than 0
                if (value < 0) {
                    $(this).val(0);
                }

                // Check if the entered value is greater than 100
                if (value > 100) {
                    $(this).val(100);
                }
            });
        } );
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var penguji1 = document.getElementById('pdft_penguji1');
            var penguji2 = document.getElementById('pdft_penguji2');
            var penguji3 = document.getElementById('pdft_penguji3');
    
            var pengujiOptions = document.querySelectorAll('#pdft_penguji1 option, #pdft_penguji2 option, #pdft_penguji3 option');
    
            penguji1.addEventListener('change', function() {
                removeSelectedOption(penguji1.value, 'pdft_penguji1');
            });
    
            penguji2.addEventListener('change', function() {
                removeSelectedOption(penguji2.value, 'pdft_penguji2');
            });
    
            penguji3.addEventListener('change', function() {
                removeSelectedOption(penguji3.value, 'pdft_penguji3');
            });
    
            function removeSelectedOption(selectedValue, paret) {
                pengujiOptions.forEach(function(option) {
                    if (option.value === selectedValue) {
                        option.disabled = true;
                    } else {
                        option.disabled = false;
                        pengujiOptions.forEach(function(tion) {
                            if(tion.parentElement.id != paret){
                                var selectedOption = document.getElementById(tion.parentElement.id).value;
                                if (selectedOption=== option.value) {
                                    option.disabled = true;
                                }
                            }
                        });
                       
                    }
                });
            }
        });
    </script>
   <script>
    document.addEventListener('DOMContentLoaded', function() {
        var pembimbing1 = document.getElementById('pdft_pembimbing1');
        var pembimbing2 = document.getElementById('pdft_pembimbing2');

        var pembimbingOptions = document.querySelectorAll('#pdft_pembimbing1 option, #pdft_pembimbing2 option');

        pembimbing1.addEventListener('change', function() {
            removeSelectedOption(pembimbing1.value, 'pdft_pembimbing1');
        });

        pembimbing2.addEventListener('change', function() {
            removeSelectedOption(pembimbing2.value, 'pdft_pembimbing2');
        });

        function removeSelectedOption(selectedValue, paret) {
                pembimbingOptions.forEach(function(option) {
                    if (option.value === selectedValue) {
                        option.disabled = true;
                    } else {
                        option.disabled = false;
                        pembimbingOptions.forEach(function(tion) {
                            if(tion.parentElement.id != paret){
                                var selectedOption = document.getElementById(tion.parentElement.id).value;
                                if (selectedOption=== option.value) {
                                    option.disabled = true;
                                }
                            }
                        });
                       
                    }
                });
            }
    });
</script> --}}

    
@endsection


                           