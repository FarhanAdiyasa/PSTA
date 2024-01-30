@extends('layouts.layout')
@section('konten')


<body>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <div class="container">
        <center>
            <span style="font-size: Larger; font-weight: bold;">Kategori Penilaian</span>
        </center><br>

        <div class="row">
        <div class="row mb-3">
            <div class="col-12 d-flex align-items-center">
                <a href="kategori_penilaian/Create" class="btn-lg mt-3" style="font-size: 15px; background-color: #1F6A00; color: white;">+Tambah Kategori Penilaian</a>
            </div>
        </div>
        </div>
        @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif
        </div>

        <table id="Pebimbing_penguji" class="table datable" width="100%" >
            <thead style="background-color: #1F6A00; color: white;">
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
                        <a href="/kategori_penilaian/Edit/{{ $row->mkp_id }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;">
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
                    window.location = "/kategori_penilaian/delete/" + mkp_id + ""
                    Swal.fire(
                        "Terhapus!",
                        "Data telah dihapus.",
                        "success"
                    );
                }
            });
        });
        $(document).ready( function () {    
            $('#Pebimbing_penguji').DataTable();
        } );
    </script>
</body>
@endsection
