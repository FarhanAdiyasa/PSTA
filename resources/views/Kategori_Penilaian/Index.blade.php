@extends('layouts.layout')
@section('konten')


<body>
    <div class="container">
        <center>
            <span style="font-size: Larger; font-weight: bold;">Kategori Penilaian</span>
        </center><br>

        <div class="row">
        <div class="row mb-3">
            <div class="col-12 d-flex align-items-center">
                <a href="Create" class="btn" style="background-color:#0059ab; color:white; font-size: 10px;">+Tambah Data</a>
                <div class="col-6 d-flex align-items-center ml-auto">
                <form action="/kategori_penilaian" method="GET" class="d-flex">
                    <input type="search" name="search" class="form-control" placeholder="Cari Nama..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
            </div>
            </div>
        </div>
        </div>
        @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif
        </div>

        <table id="Sidang_Tahun_ajaran" class="table datable" width="100%">
            <thead>
                <tr>
                    <th class="align-middle text-center">No.</th>
                    <th class="align-middle text-center">Nama</th>
                    <th class="align-middle text-center">Bobot</th>
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
                    <td class="align-middle text-center">{{ $row->mkp_nama }}</td>
                    <td class="align-middle text-center">{{ $row->mkp_bobot }}</td>
                    <td  class="align-middle text-center">
                        <a href="/Edit/{{ $row->mkp_id }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger delete-button center" style="padding: 5px 5px; font-size: 10px;"
                            data-id="{{ $row->mkp_id }}" data-mkp_nama="{{ $row->mkp_nama }}">
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
            var mkp_id = $(this).attr('data-id');
            var mkp_nama = $(this).attr('data-mkp_nama');

            Swal.fire({
                title: "Yakin?",
                text: "Kamu akan menghapus data dengan Tahun Ajaran " + mkp_nama,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete/" + mkp_id + ""
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
