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
                        <form action="{{ route('Sidang.complete.store', [$pdft->pdft_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf   

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
                                <input type="text" name="pdft_perusahaan" value="" class="form-control" id="pdft_perusahaan" aria-describedby="emailHelp">
                                <!-- Error message if pdft_perusahaan is empty -->
                                @error('pdft_perusahaan')
                                <span class="text-danger">Nama Perusahaan tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_tanggalmulai" class="form-label" style="font-weight: bold;">Tanggal Mulai<span style="color: red;">*</span></label>
                                <input type="date" name="pdft_tanggalmulai" value="" class="form-control" id="pdft_tanggalmulai" aria-describedby="emailHelp">
                                <!-- Error message if pdft_tanggalmulai is empty -->
                                @error('pdft_tanggalmulai')
                                <span class="text-danger">Tanggal Mulai tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_judultugasakhir" class="form-label" style="font-weight: bold;">Judul Tugas Akhir<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_judultugasakhir" value="" class="form-control" id="pdft_judultugasakhir" aria-describedby="emailHelp">
                                <!-- Error message if pdft_judultugasakhir is empty -->
                                @error('pdft_judultugasakhir')
                                <span class="text-danger">Judul Tugas Akhir tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_tanggaldibuat" class="form-label" style="font-weight: bold;">Tanggal Dibuat<span style="color: red;">*</span></label>
                                <input type="date" name="pdft_tanggaldibuat" value="" class="form-control" id="pdft_tanggaldibuat" aria-describedby="emailHelp">
                                <!-- Error message if pdft_tanggalidbuat is empty -->
                                @error('pdft_tanggaldibuat')
                                <span class="text-danger">Tanggal Dibuat tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_hrd" class="form-label" style="font-weight: bold;">HRD<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_hrd" value="" class="form-control" id="pdft_hrd" aria-describedby="emailHelp">
                                <!-- Error message if pdft_hrd is empty -->
                                @error('pdft_hrd')
                                <span class="text-danger">HRD tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_tanggalsidang" class="form-label" style="font-weight: bold;">Tanggal Sidang & Waktu Sidang<span style="color: red;">*</span></label>
                                <input type="datetime-local" name="pdft_tanggalsidang" value="" class="form-control" id="pdft_tanggalsidang" aria-describedby="emailHelp">
                                <!-- Error message if pdft_tanggalsidang is empty -->
                                @error('pdft_tanggalsidang')
                                <span class="text-danger">Tanggal Sidang tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_jenissidang" class="form-label" style="font-weight: bold;">Jenis<span style="color: red;">*</span></label>
                                <select name="pdft_jenissidang" class="form-control" id="pdft_jenissidang" aria-describedby="emailHelp">
                                    <option value="" selected disabled>Pilih Jenis</option>
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                </select>
                                @error('pdft_jenissidang')
                                <span class="text-danger">Jenis tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3 ol" id="pdft_tempatsidang1">
                                <label for="pdft_tempatsidang1" class="form-label" style="font-weight: bold;">Tempat Sidang 1<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_tempatsidang1" value="" class="form-control" aria-describedby="emailHelp">
                                <!-- Error message if pdft_tempatsidang1 is empty -->
                                @error('pdft_tempatsidang1')
                                <span class="text-danger">Tempat Sidang 1 tidak boleh kosong</span><br>
                                @enderror
                            </div>

                         <div class="row">
                            <div class="col-6">
                                <label for="pdft_penguji1" class="form-label" style="font-weight: bold;">Penguji 1<span style="color: red;">*</span></label>
                                <select name="pdft_penguji1" class="form-control" id="pdft_penguji1">
                                    <option value="">Pilih Penguji 1</option>
                                    @foreach ($penguji as $item)
                                        <option value="{{$item->png_username}}">{{$item->png_username}}</option>
                                    @endforeach
                                    </select>
                                @error('pdft_penguji1')
                                <span class="text-danger">Waktu tidak boleh kosong</span><br>
                                @enderror
                            </div>
                                <div class="col-6">
                                    <label for="pdft_pembimbing1" class="form-label" style="font-weight: bold;">Pembimbing 1<span style="color: red;">*</span></label>
                                    <select name="pdft_pembimbing1" class="form-control" id="pdft_pembimbing1">
                                        <option value="">Pilih Pembimbing 1</option>
                                    @foreach ($pembimbing as $item)
                                        <option value="{{$item->png_username}}">{{$item->png_username}}</option>
                                    @endforeach
                                    </select>
                                    @error('pdft_pembimbing1')
                                    <span class="text-danger">Pembimbing 1 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                             
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="pdft_penguji2" class="form-label" style="font-weight: bold;">Penguji 2<span style="color: red;">*</span></label>
                                    <select name="pdft_penguji2" class="form-control" id="pdft_penguji2">
                                        <option value="">Pilih Penguji 2</option>
                                        @foreach ($penguji as $item)
                                            <option value="{{$item->png_username}}">{{$item->png_username}}</option>
                                        @endforeach
                                        </select>
                                    @error('pdft_penguji2')
                                    <span class="text-danger">Waktu tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="pdft_pembimbing2" class="form-label" style="font-weight: bold;">Pembimbing 2<span style="color: red;">*</span></label>
                                    <select name="pdft_pembimbing2" class="form-control" id="pdft_pembimbing2">
                                        <option value="">Pilih Pembimbing 2</option>
                                        @foreach ($pembimbing as $item)
                                            <option value="{{$item->png_username}}">{{$item->png_username}}</option>
                                        @endforeach
                                        </select>
                                    @error('pdft_pembimbing2')
                                    <span class="text-danger">Pembimbing 2 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="pdft_penguji3" class="form-label" style="font-weight: bold;">Penguji 3<span style="color: red;">*</span></label>
                                    <select name="pdft_penguji3" class="form-control" id="pdft_penguji3">
                                        <option value="">Pilih Penguji 3</option>
                                        @foreach ($penguji as $item)
                                            <option value="{{$item->png_username}}">{{$item->png_username}}</option>
                                        @endforeach
                                    </select>
                                    @error('pdft_penguji3')
                                    <span class="text-danger">penguji 3 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                            </div>

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
    </script>
    <script>
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
</script>

    
@endsection


                           