@extends('layouts.layout')



@section('konten')

<body>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<div class="container">
            <div class="text-center mb-4">
                <h4>Penilaian Sidang TA</h4>
            </div>
            
            @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-warning">{{ session('error') }}</div>
    @endif
        <table id="Pebimbing_penguji" class="table datable" width="100%" >
            <thead style="background-color: #1F6A00; color: white;">
                <tr>
                    <th class="align-middle text-center">No.</th>
                    <th class="align-middle text-center">Pendaftaran Sidang</th>
                    <th class="align-middle text-center">Nama Mahasiswa</th>
                    <th class="align-middle text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data as $item)
                <tr style="font-weight: 100">
                    <th class="align-middle text-center"> {{$no}}</th>
                    <th class="align-middle text-center"> {{$item->pdft_id}}</th>
                    <th class="align-middle text-center"> {{$item->mhs_nama}} </th>
                    <th class="align-middle text-center">
                        @if($item->pdft_totalnilai == null)
                            <a href="/PenilaianSidang/{{ $item->pdft_id }}/nilai" class="btn btn-success center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing">
                                <i class="fas fa-edit"></i> Penilaian
                            </a>
                        @else 
                            <span class="badge bg-success">Sudah Dinilai</span>
                        @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
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

        $(document).ready( function () {
            $('#Pebimbing_penguji').DataTable();
        } );
    </script>
    
        </div>
</body>

   
@endsection