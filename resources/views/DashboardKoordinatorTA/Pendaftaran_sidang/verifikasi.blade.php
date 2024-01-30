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
                            <div class="mb-3">
                                <label for="pdft_bapsuratketerangan" class="form-label">BAP Surat Keterangan</label><br>
                               Download <a href="{{ route('download', ['file' => $pdft->pdft_bapsuratketerangan]) }}">{{$pdft->pdft_bapsuratketerangan}}</a>
                            </div>

                            <div class="mb-3">
                                <label for="pdft_bapprasidang" class="form-label">BAP Prasidang</label><br>
                                Download <a href="{{ route('download', ['file' => $pdft->pdft_bapprasidang]) }}">{{$pdft->pdft_bapprasidang}}</a>
                            </div>

                            <div class="mb-3">
                                <label for="pdft_bapbimbingan" class="form-label">BAP Bimbingan</label><br>
                                Download <a href="{{ route('download', ['file' => $pdft->pdft_bapbimbingan]) }}">{{$pdft->pdft_bapbimbingan}}</a>
                            </div>

                            <div class="mb-3">
                                <label for="pdft_baplembarpersetujuan" class="form-label">BAP Lembar Persetujuan</label><br>
                                Download <a href="{{ route('download', ['file' => $pdft->pdft_baplembarpersetujuan]) }}">{{$pdft->pdft_baplembarpersetujuan}}</a>
                            </div>
                            <div class="mb-3">
                                <label for="pdft_perusahaan" class="form-label" style="font-weight: bold;">Nama Perusahaan<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_perusahaan" value="{{$pdft->pdft_perusahaan}}" class="form-control" id="pdft_perusahaan" readonly>
                                <!-- Error message if pdft_perusahaan is empty -->
                                @error('pdft_perusahaan')
                                <span class="text-danger">Nama Perusahaan tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_tanggalmulai" class="form-label" style="font-weight: bold;">Tanggal Mulai<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_tanggalmulai" value="{{ $pdft->pdft_tanggalmulai }}" class="form-control" id="pdft_tanggalmulai" readonly>
                                <!-- Error message if pdft_tanggalmulai is empty -->                                
                                @error('pdft_tanggalmulai')
                                <span class="text-danger">Tanggal Mulai tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_judultugasakhir" class="form-label" style="font-weight: bold;">Judul Tugas Akhir<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_judultugasakhir" value="{{$pdft->pdft_judultugasakhir}}" class="form-control" id="pdft_judultugasakhir" readonly>
                                <!-- Error message if pdft_judultugasakhir is empty -->
                                @error('pdft_judultugasakhir')
                                <span class="text-danger">Judul Tugas Akhir tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_tanggaldibuat" class="form-label" style="font-weight: bold;">Tanggal Dibuat<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_tanggaldibuat" value="{{$pdft->pdft_tanggaldibuat}}" class="form-control" id="pdft_tanggaldibuat" readonly>
                                <!-- Error message if pdft_tanggalidbuat is empty -->
                                @error('pdft_tanggaldibuat')
                                <span class="text-danger">Tanggal Dibuat tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_hrd" class="form-label" style="font-weight: bold;">HRD<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_hrd" value="{{$pdft->pdft_hrd}}" class="form-control" id="pdft_hrd" readonly>
                                <!-- Error message if pdft_hrd is empty -->
                                @error('pdft_hrd')
                                <span class="text-danger">HRD tidak boleh kosong</span><br>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="pdft_tanggalsidang" class="form-label" style="font-weight: bold;">Tanggal Sidang & Waktu Sidang<span style="color: red;">*</span></label>
                                        <input type="text" name="pdft_tanggalsidang" value="{{$pdft->pdft_tanggalsidang}}" class="form-control" id="pdft_tanggalsidang" readonly>
                                        <!-- Error message if pdft_tanggalsidang is empty -->
                                        @error('pdft_tanggalsidang')
                                        <span class="text-danger">Tanggal Sidang tidak boleh kosong</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="pdft_jenissidang" class="form-label" style="font-weight: bold;">Jenis<span style="color: red;">*</span></label>
                                        <select name="pdft_jenissidang" class="form-control" id="pdft_jenissidang" readonly>
                                            <option value="{{$pdft->pdft_jenissidang}}">{{$pdft->pdft_jenissidang}}</option>
                                        </select>
                                        @error('pdft_jenissidang')
                                        <span class="text-danger">Jenis tidak boleh kosong</span><br>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if ($pdft->pdft_jenissidang && $pdft->pdft_jenissidang == "Offline")
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3 ol" id="pdft_tempatsidang1">
                                        <label for="pdft_tempatsidang1" class="form-label" style="font-weight: bold;">Tempat Sidang 1<span style="color: red;">*</span></label>
                                        <input type="text" name="pdft_tempatsidang1" value="{{$pdft->pdft_tempatsidang1}}" class="form-control" readonly>
                                        <!-- Error message if pdft_tempatsidang1 is empty -->
                                        @error('pdft_tempatsidang1')
                                        <span class="text-danger">Tempat Sidang 1 tidak boleh kosong</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    @if ($pdft->pdft_tempatsidang2)
                                    <div class="mb-3 ol" id="pdft_tempatsidang2">
                                        <label for="pdft_tempatsidang2" class="form-label" style="font-weight: bold;">Tempat Sidang 2<span style="color: red;">*</span></label>
                                        <input type="text" name="pdft_tempatsidang2" value="{{$pdft->pdft_tempatsidang2}}" class="form-control" readonly>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                            @if ($pdft->pdft_link)
                                <div class="mb-3 ol" id="pdft_link">
                                    <label for="pdft_link" class="form-label" style="font-weight: bold;">Link Sidang<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_link" value="{{$pdft->pdft_link}}" class="form-control" readonly>
                                </div>
                            @endif
                          

                            <div class="row">
                                <div class="col-6">
                                    <label for="pdft_penguji1" class="form-label" style="font-weight: bold;">Penguji 1<span style="color: red;">*</span></label>
                                    <select name="pdft_penguji1" class="form-control" id="pdft_penguji1" @readonly(true)>
                                        <option value="{{$pdft->pdft_penguji1}}">{{$pdft->pdft_penguji1}}</option>
                                </select>
                                </div>
                                    <div class="col-6">
                                        <label for="pdft_pembimbing1" class="form-label" style="font-weight: bold;">Pembimbing 1<span style="color: red;">*</span></label>
                                        <select name="pdft_pembimbing1" class="form-control" id="pdft_pembimbing1" @readonly(true)>
                                            <option value="{{$pdft->pdft_pembimbing1}}">{{$pdft->pdft_pembimbing1}}</option>
                                    </select>
                                    </div>
                                 
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="pdft_penguji2" class="form-label" style="font-weight: bold;">Penguji 2<span style="color: red;">*</span></label>
                                        <select name="pdft_penguji2" class="form-control" id="pdft_penguji2" @readonly(true)>
                                            <option value="{{$pdft->pdft_penguji2}}">{{$pdft->pdft_penguji2}}</option>
                                    </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="pdft_pembimbing2" class="form-label" style="font-weight: bold;">Pembimbing 2<span style="color: red;">*</span></label>
                                        <select name="pdft_pembimbing2" class="form-control" id="pdft_pembimbing2" @readonly(true)>
                                            <option value="{{$pdft->pdft_pembimbing2}}">{{$pdft->pdft_pembimbing2}}</option>
                                    </select>
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="pdft_penguji3" class="form-label" style="font-weight: bold;">Penguji 3<span style="color: red;">*</span></label>
                                        <select name="pdft_penguji3" class="form-control" id="pdft_penguji3" @readonly(true)>
                                                <option value="{{$pdft->pdft_penguji3}}">{{$pdft->pdft_penguji3}}</option>
                                        </select>
                                        @error('pdft_penguji3')
                                        <span class="text-danger">penguji 3 tidak boleh kosong</span><br>
                                        @enderror
                                    </div>
                                </div>
                            <!-- Tombol untuk menampilkan modal -->
                            @if (!Auth::guard('mahasiswa')->check())
                                @if ($pdft->pdft_statusverifikasidata != 'True')
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInputLinkSidang">Verifikasi</button>
                                @endif
                            @endif
                            <div class="modal fade" id="modalInputLinkSidang" tabindex="-1" aria-labelledby="modalInputLinkSidangLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalInputLinkSidangLabel">Input Link Sidang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form untuk input link sidang -->
                                            <form action="{{route('Sidang.verifikasi.store', ['id'=>$pdft->pdft_id])}}" method="POST">
                                                @csrf
                                                @if($pdft->pdft_jenissidang == "Online")
                                                <div class="mb-3">
                                                    <label for="pdft_link" class="form-label">Link Sidang</label>
                                                    <input type="text" class="form-control" id="pdft_link" name="pdft_link" placeholder="Masukkan link sidang" required>
                                                </div>
                                                @else
                                                <div class="mb-3">
                                                    <label for="pdft_tempatsidang2" class="form-label">Tempat Sidang</label>
                                                    <input type="text" class="form-control" id="pdft_tempatsidang2" name="pdft_tempatsidang2" placeholder="Masukkan Tempat Sidang" required>
                                                </div>
                                                @endif
                                                @if (!Auth::guard('mahasiswa')->check())
                                                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

            var inputElement = document.getElementById('pdft_tanggalmulai');
            var tanggalDibuatElement = document.getElementById('pdft_tanggaldibuat');
            var dateString = inputElement.value;
            var dateString2 = tanggalDibuatElement.value;

            // Konversi string tanggal ke objek Date
            var dateObject = new Date(dateString);
            var dateObject2 = new Date(dateString2);

            // Daftar nama hari dalam Bahasa Indonesia
            var daysOfWeek = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var daysOfWeek2 = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

            // Ambil nama hari
            var dayName = daysOfWeek[dateObject.getDay()];
            var dayName2 = daysOfWeek2[dateObject2.getDay()];

            // Ambil tanggal, bulan, dan tahun
            var day = dateObject.getDate();
            var day2 = dateObject2.getDate();
            var monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var monthNames2 = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var monthName = monthNames[dateObject.getMonth()];
            var monthName2 = monthNames2[dateObject2.getMonth()];
            var year = dateObject.getFullYear();
            var year2 = dateObject2.getFullYear();

            // Format tanggal yang diinginkan
            var formattedDate = dayName + ', ' + day + ' ' + monthName + ' ' + year;
            var formattedDate2 = dayName2 + ', ' + day2 + ' ' + monthName2 + ' ' + year2;

            // Set nilai input dengan tanggal yang diformat
            inputElement.value = formattedDate;
            tanggalDibuatElement.value = formattedDate2;

            //Format Tanggal Sidang
            


            function setFieldsVisibility() {
                var selectedJenis = jenisSelect.value;
    
                if (selectedJenis === 'Offline') {
                    tempatSidang1.style.display = 'block';
                } else{
                    tempatSidang1.style.display = 'none';
                }
            }

            setFieldsVisibility();

            jenisSelect.addEventListener('change', function() {
                setFieldsVisibility();
            });
            
        });
    </script>
    
@endsection


                            {{-- <div class="row">
                                <div class="col-6">
                                    <label for="pdft_pembimbing1" class="form-label" style="font-weight: bold;">Pembimbing 1<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_pembimbing1" value="" class="form-control" readonly>
                                    <!-- Error message if pdft_pembimbing1 is empty -->
                                    @error('pdft_pembimbing1')
                                    <span class="text-danger">Pembimbing 1 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="pdft_waktu" class="form-label" style="font-weight: bold;">Waktu<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_waktu" value="" class="form-control" readonly>
                                    <!-- Error message if pdft_waktu is empty -->
                                    @error('pdft_waktu')
                                    <span class="text-danger">Waktu tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="pdft_pembimbing2" class="form-label" style="font-weight: bold;">Pembimbing 2<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_pembimbing2" value="" class="form-control" readonly>
                                    <!-- Error message if pdft_pembimbing2 is empty -->
                                    @error('pdft_pembimbing2')
                                    <span class="text-danger">Pembimbing 2 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="pdft_waktu" class="form-label" style="font-weight: bold;">Waktu<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_waktu" value="" class="form-control" readonly>
                                    <!-- Error message if pdft_waktu is empty -->
                                    @error('pdft_waktu')
                                    <span class="text-danger">Waktu tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="pdft_pembimbing3" class="form-label" style="font-weight: bold;">Pembimbing 3<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_pembimbing3" value="" class="form-control" readonly>
                                    <!-- Error message if pdft_pembimbing3 is empty -->
                                    @error('pdft_pembimbing3')
                                    <span class="text-danger">Pembimbing 3 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                            </div> --}}