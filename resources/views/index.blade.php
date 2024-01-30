@extends('layouts.layout')
@section('konten')

<body>
<div class="container">
        <center>
            <span style="font-size: Larger; font-weight: bold;">Tahun Ajaran</span>
        </center><br>

        <div class="row mb-3">
            <div class="col-6 d-flex align-items-center">
                <a href="register" class="btn-lg mt-3" style="font-size: 15px; background-color: #1F6A00; color: white;">+Tambah Data</a>
            </div>
            <div class="col-6 d-flex align-items-center ml-auto">
                <form action="/dashboardKTamabah_tahun_ajaran" method="GET" class="d-flex">
                    <input type="search" name="search" class="form-control" placeholder="Cari id..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
            </div>
        </div>


        
        
        @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif
       

        <table id="tahun_ajaran" class="table datable" width="100%">
            <thead>
                <tr>
                    <th class="align-middle text-center">No.</th>
                    <th class="align-middle text-center">username </th>
                   
                    <th class="align-middle text-center">Role </th>
                    <th class="align-middle text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($data as $row)
                <tr>
                    <th scope="align-middle text-center">{{$no++}}</th>
                    <td class="align-middle text-center">{{ $row->png_username}}</td>
                   
                    <td class="align-middle text-center">{{ $row->png_role }}</td>
                    <td  class="align-middle text-center">
                        <a href="/delete_pengguna/{{ $row->png_username }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.pebinbing_pengguna">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger delete-button center" style="padding: 5px 5px; font-size: 10px;"
                            data-id="{{ $row->png_username }}" data-png_role="{{ $row->png_role }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>

    <!-- Script untuk meng-handle SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete-button').click(function () {
            var png_username = $(this).attr('data-id');
            var png_role = $(this).attr('data-png_role');

            Swal.fire({
                title: "Yakin?",
                text: "Kamu akan menghapus data dengan Nama " + png_role,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete_tahun_ajaran/" + png_username + ""
                    Swal.fire(
                        "Terhapus!",
                        "Data telah dihapus.",
                        "success"
                    );
                }
            });
        });
    </script>
    
</body>
@endsection
