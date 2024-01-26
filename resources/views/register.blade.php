@extends('layouts.layout')
@section('konten')
@section('navbar')
<h1>navbar</h1>
@endsection

<div class="container d-flex justify-content-end align-items-center polman-form-login register-divider">
<h4 class="text mb-4 login-divide">Login</h4>
        <hr class="black-bold-divider">

                    <div class="card-body">
                        <form action="/registeruser" method="POST" enctype="multipart/form-data">
    @csrf

    <?php

use App\Models\mspengguna;

function generateAutomaticID($prefix = 'USR')
{
    // Mengambil ID terakhir dari database
    $lastID = mspengguna::latest('png_username')->value('png_username');

    // Mengambil angka dari ID terakhir dan menambahkannya dengan 1
    $lastNumber = (int)substr($lastID, strlen($prefix));
    $newNumber = $lastNumber + 1;

    // Menggunakan sprintf untuk memformat ID baru
    $newID = sprintf('%s%03d', $prefix, $newNumber);

    return $newID;
}

// ...

// Periksa apakah $png_username kosong atau tidak diatur
if (empty($png_username)) {
    // Buat ID baru jika $png_username kosong
    $png_username = generateAutomaticID();
}
?>

<div class="mb-3">
    <label for="png_username" class="form-label" style="font-weight: bold;">Username <span style="color: red;">*</span></label>
    <input type="text" name="png_username" value="{{ $png_username }}" class="form-control" id="png_username" aria-describedby="emailHelp" readonly>
    @error('png_username')
    <span class="text-danger">{{ $message }}</span><br>
    @enderror
</div>
 
        <div class="mb-2">
            <label for="exampleInputPassword1" class="form-label">Password<span style="color: red;">*</span></label>
            <input type="password" class="form-control" name="png_password">
            @error('png_password')
                <span class="text-danger">Password tidak boleh kosong</span><br>
            @enderror
        </div>
        <div class="mb-2">
            <label for="exampleInputPassword1" class="form-label">Pengguna<span style="color: red;">*</span></label>
            <select name="png_role"  id="png_role"  aria-label="Default select example" class="form-control">
        <option value="" selected disabled>Pilih Jabatan</option>
        <option value="DAAA">DAAA</option>
        <option value="Penguji">Penguji</option>
        <option value="Pembimbing">Pembimbing</option>
        <option value="Koordinator TA">Koordinator TA</option>
        <option value="Mahasiswa">Mahasiswa</option>
        <option value="Kepala Prodi">Kepala Prodi</option>
    </select>
            @error('png_password')
                <span class="text-danger">Password tidak boleh kosong</span><br>
            @enderror
        </div>
      
        <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
       
        <br>
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>

    <!-- Penyesuaian untuk mengurangi ruang di bawah form -->
    <div style="margin-bottom: 20px;"></div>
</div>


@endsection
