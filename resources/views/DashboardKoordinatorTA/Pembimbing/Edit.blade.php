@extends('layouts.layout')
@section('konten')

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                        <strong class="text-white">Ubah Data Pebimbing pengguna</strong>
                    </h5>
                    <div class="card-body">
                        <form action="{{route('Pembimbing.Update', $data->pbn_id)}}" method="POST" enctype="multipart/form-data" name="updatedata.pebinbing_pengguna">
                            @csrf
                            <input type="hidden" name="pbn_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->pbn_id}}" readonly>
                            <div class="mb-3">
                                <label for="pbn_jenis" class="form-label" style="font-weight: bold;">Jenis<span style="color: red;">*</span></label>
                                <select name="pbn_jenis" class="form-control" id="pbn_jenis" aria-describedby="emailHelp">
                                    <option value="Akademik" {{ $data->pbn_jenis == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                    <option value="Industri" {{ $data->pbn_jenis == 'Industri' ? 'selected' : '' }}>Industri</option>
                                </select>
                                @error('pbn_jenis')
                                    <span class="text-danger">Jenis tidak boleh kosong</span><br>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pbn_nama" class="form-label" style="font-weight: bold;">Nama<span style="color: red;">*</span></label>
                                <input type="text" name="pbn_nama" class="form-control" id="pbn_nama" aria-describedby="emailHelp" value="{{$data->pbn_nama}}">
                                @error('pbn_nama')
                                    <span class="text-danger">Nama tidak boleh kosong</span><br>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pbn_jabatan" class="form-label" style="font-weight: bold;">Jabatan<span style="color: red;">*</span></label>
                                <input type="text" name="pbn_jabatan" class="form-control" id="pbn_jabatan" aria-describedby="emailHelp" value="{{$data->pbn_jabatan}}">
                                @error('pbn_jabatan')
                                    <span class="text-danger">Jabatan tidak boleh kosong</span><br>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pbn_email" class="form-label" style="font-weight: bold;">Email<span style="color: red;">*</span></label>
                                <input type="email" name="pbn_email" class="form-control" id="pbn_email" aria-describedby="emailHelp" value="{{$data->pbn_email}}">
                                @error('pbn_email')
                                    <span class="text-danger">Email tidak boleh kosong</span><br>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="png_username" class="form-label" style="font-weight: bold;">Username<span style="color: red;">*</span></label>
                                <select name="png_username" class="form-control" id="png_username" aria-describedby="emailHelp">
                                    <option value="{{$selectedUsername}}" selected>
                                        {{ $selectedUsername }}
                                    </option>
                                @foreach($usernames as $username)
                                    <option value="{{$username->png_username}}" >
                                        {{ $username->png_username }}
                                    </option>
                                @endforeach
                                </select>
                                @error('png_username')
                                    <span class="text-danger">Username tidak boleh kosong</span><br>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" title="Submit">Ubah</button>
                                    <a href="{{route('Pembimbing')}}" class="btn btn-secondary">
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
    @endsection
