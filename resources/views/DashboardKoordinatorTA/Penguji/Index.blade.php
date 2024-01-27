@extends('layouts.layout')
@section('konten')

<body>
<div class="container">

        <center>
            <span style="font-size: Larger; font-weight: bold;">Penguji</span>
        </center><br>

        <div class="row mb-3">
            <div class="col-6 d-flex align-items-center">
                <a href="{{route('Penguji.Create')}}" class="btn btn-primary" style="padding: 5px 5px; font-size: 13px;">+Tambah Penguji</a>
            </div>
            <div class="col-6 d-flex align-items-center ml-auto">
                <form action="/Penguji" method="GET" class="d-flex">
                    <input type="search" name="search" class="form-control" placeholder="Cari id..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
            </div>
        </div>

        @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-warning">{{ session('error') }}</div>
    @endif
        <table id="Pebimbing_penguji" class="table datable" width="100%">
            <thead>
                <tr>
                    <th class="align-middle text-center">No.</th>
                    <th class="align-middle text-center">ID </th>
                    <th class="align-middle text-center">Jenis</th>
                    <th class="align-middle text-center">Nama</th>
                    <th class="align-middle text-center">jabatan</th>
                    <th class="align-middle text-center">Email</th>
                    <th class="align-middle text-center">Username</th>
                    <th class="align-middle text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($data as $index => $row)
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $index + $data->firstItem() }}</th>
                    <td class="align-middle text-center">{{ $row->pbn_id}}</td>
                    <td class="align-middle text-center">{{ $row->pbn_jenis }}</td>
                    <td class="align-middle text-center">{{ $row->pbn_nama }}</td>
                    <td class="align-middle text-center">{{ $row->pbn_jabatan }}</td>
                    <td class="align-middle text-center">{{ $row->pbn_email }}</td>
                    <td class="align-middle text-center">{{ $row->png_username }}</td>
                    <td  class="align-middle text-center">
                        <a href="/Penguji/Edit/{{ $row->pbn_id }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Penguji">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger delete-button center" style="padding: 5px 5px; font-size: 10px;"
                            data-id="{{ $row->pbn_id }}" data-pbn_nama="{{ $row->pbn_nama }}">
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
            var pbn_id = $(this).data('id');
            var pbn_nama = $(this).data('pbn_nama');
    
            Swal.fire({
                title: "Yakin?",
                text: "Kamu akan menghapus data dengan Nama " + pbn_nama,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Get CSRF token
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
                    $.ajax({
                        url: "/Pembimbing/Delete/" + pbn_id,
                        type: 'POST',
                        data: {
                            _token: csrfToken // Pass CSRF token with the request
                        },
                        success: function (response) {
                            Swal.fire(
                                "Terhapus!",
                                "Data telah dihapus.",
                                "success"
                            ).then(() => {
                                // Reload or update your page after successful deletion
                                location.reload(); // Reload the page
                            });
                        },
                        error: function (xhr, status, error) {
                            // Handle errors here
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
    
</body>
@endsection
