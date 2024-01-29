@extends('layouts.layout')
@section('konten')

<body>
    <div class="container">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                        <strong class="text-white">Pendaftaran Sidang Tugas Akhir</strong>
                    </h5>

                    <div class="card-body">
                        <form action="{{ route('Sidang.complete.store', '[$pdft->pdft_id]') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="pdft_perusahaan" value="{{$pdft->pdft_perusahaan}}" class="form-control" id="pdft_perusahaan" aria-describedby="emailHelp" readonly>
                                <!-- Error message if pdft_perusahaan is empty -->
                                @error('pdft_perusahaan')
                                <span class="text-danger">Nama Perusahaan tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_tanggalmulai" class="form-label" style="font-weight: bold;">Tanggal Mulai<span style="color: red;">*</span></label>
                                <input type="datetime-local" name="pdft_tanggalmulai" value="{{$pdft->pdft_tanggalmulai}}" class="form-control" id="pdft_tanggalmulai" aria-describedby="emailHelp" readonly>
                                <!-- Error message if pdft_tanggalmulai is empty -->
                                @error('pdft_tanggalmulai')
                                <span class="text-danger">Tanggal Mulai tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_judultugasakhir" class="form-label" style="font-weight: bold;">Judul Tugas Akhir<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_judultugasakhir" value="{{$pdft->pdft_judultugasakhir}}" class="form-control" id="pdft_judultugasakhir" aria-describedby="emailHelp" readonly>
                                <!-- Error message if pdft_judultugasakhir is empty -->
                                @error('pdft_judultugasakhir')
                                <span class="text-danger">Judul Tugas Akhir tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_tanggaldibuat" class="form-label" style="font-weight: bold;">Tanggal Dibuat<span style="color: red;">*</span></label>
                                <input type="date" name="pdft_tanggaldibuat" value="{{$pdft->pdft_tanggaldibuat}}" class="form-control" id="pdft_tanggaldibuat" aria-describedby="emailHelp" readonly>
                                <!-- Error message if pdft_tanggalidbuat is empty -->
                                @error('pdft_tanggaldibuat')
                                <span class="text-danger">Tanggal Dibuat tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_hrd" class="form-label" style="font-weight: bold;">HRD<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_hrd" value="{{$pdft->pdft_hrd}}" class="form-control" id="pdft_hrd" aria-describedby="emailHelp" readonly>
                                <!-- Error message if pdft_hrd is empty -->
                                @error('pdft_hrd')
                                <span class="text-danger">HRD tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="pdft_tanggalsidang" class="form-label" style="font-weight: bold;">Tanggal Sidang & Waktu Sidang<span style="color: red;">*</span></label>
                                <input type="datetime-local" name="pdft_tanggalsidang" value="{{$pdft->pdft_tanggalsidang}}" class="form-control" id="pdft_tanggalsidang" aria-describedby="emailHelp" readonly>
                                <!-- Error message if pdft_tanggalsidang is empty -->
                                @error('pdft_tanggalsidang')
                                <span class="text-danger">Tanggal Sidang tidak boleh kosong</span><br>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pdft_jenissidang" class="form-label" style="font-weight: bold;">Jenis<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_tanggalsidang" value="{{ $pdft->pdft_jenissidang }}" class="form-control" id="pdft_tanggalsidang" aria-describedby="emailHelp" readonly>
                                
                                @error('pdft_jenissidang')
                                <span class="text-danger">Jenis tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="thn_id" class="form-label" style="font-weight: bold;">Tahun Ajaran<span style="color: red;">*</span></label>
                                <input name="pdft_tanggalsidang" value="{{ $pdft->thn_id }}" class="form-control" id="pdft_tanggalsidang" aria-describedby="emailHelp" readonly>
                                
                                @error('thn_id')
                                <span class="text-danger">Jenis tidak boleh kosong</span><br>
                                @enderror
                            </div>
                        
                            @if($pdft->pdft_jenissidang != "Online")
                                <div class="mb-3 ol" id="pdft_tempatsidang1">
                                    <label for="pdft_tempatsidang1" class="form-label" style="font-weight: bold;">Tempat Sidang 1<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_tempatsidang1" value="{{ $pdft->pdft_tempatsidang1 }}" class="form-control" aria-describedby="emailHelp" readonly>
                                    <!-- Error message if pdft_tempatsidang1 is empty -->
                                    @error('pdft_tempatsidang1')
                                    <span class="text-danger">Tempat Sidang 1 tidak boleh kosong</span><br>
                                    @enderror
                                </div>

                                <div class="mb-3 ol" id="pdft_tempatsidang2">
                                    <label for="pdft_tempatsidang1" class="form-label" style="font-weight: bold;">Tempat Sidang 2<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_tempatsidang1" value="{{ $pdft->pdft_tempatsidang12 }}" class="form-control" aria-describedby="emailHelp" readonly>
                                    <!-- Error message if pdft_tempatsidang1 is empty -->
                                    @error('pdft_tempatsidang1')
                                    <span class="text-danger">Tempat Sidang 1 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                            @endif

                         <div class="row">
                            <div class="col-6">
                                <label for="pdft_penguji1" class="form-label" style="font-weight: bold;">Penguji 1<span style="color: red;">*</span></label>
                                <input type="text" name="pdft_tempatsidang1" value="{{ $pdft->pdft_penguji1 }}" class="form-control" aria-describedby="emailHelp" readonly>
                                
                                @error('pdft_penguji1')
                                <span class="text-danger">Penguji 1 tidak boleh kosong</span><br>
                                @enderror
                            </div>
                                <div class="col-6">
                                    <label for="pdft_pembimbing1" class="form-label" style="font-weight: bold;">Pembimbing 1<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_tempatsidang1" value="{{ $pdft->pdft_pembimbing1 }}" class="form-control" aria-describedby="emailHelp" readonly>
                                
                                    @error('pdft_pembimbing1')
                                    <span class="text-danger">Pembimbing 1 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                             
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="pdft_penguji2" class="form-label" style="font-weight: bold;">Penguji 2<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_tempatsidang1" value="{{ $pdft->pdft_penguji1 }}" class="form-control" aria-describedby="emailHelp" readonly>
                                
                                    @error('pdft_penguji2')
                                    <span class="text-danger">Waktu tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="pdft_pembimbing2" class="form-label" style="font-weight: bold;">Pembimbing 2<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_tempatsidang1" value="{{ $pdft->pdft_pembimbing2 }}" class="form-control" aria-describedby="emailHelp" readonly>
                                
                                    @error('pdft_pembimbing2')
                                    <span class="text-danger">Pembimbing 2 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="pdft_penguji3" class="form-label" style="font-weight: bold;">Penguji 3<span style="color: red;">*</span></label>
                                    <input type="text" name="pdft_tempatsidang1" value="{{ $pdft->pdft_penguji3 }}" class="form-control" aria-describedby="emailHelp" readonly>
                                
                                    @error('pdft_penguji3')
                                    <span class="text-danger">penguji 3 tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            @if($pdft->pdft_jenissidang)
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-primary" type="button">Unduh Undangan</button>
                                    <button class="btn btn-primary" type="button">Form Penilaian</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

   
@endsection