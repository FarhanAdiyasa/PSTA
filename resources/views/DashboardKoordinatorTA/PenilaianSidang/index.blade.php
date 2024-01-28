@extends('layouts.layout')
@section('konten')

<body>
<div class="container">
            <div class="text-center mb-4">
                <h4>Selamat Datang Penilaian Sidang TA</h4>
            </div>
            
            <div class="container">
                <center>
                    <span style="font-size: Larger; font-weight: bold;">Penilaian Sidang</span>
                </center><br>
        
                <div class="row">
                <div class="row mb-3">
                </div>
                </div>
                @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif
                </div>
        
                <table id="Pebimbing_penguji" class="table datable" width="100%">
                    <thead>
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
                        @foreach($dataPenilaianSidang as $index)
                            <tr>
                                <th  class="align-middle text-center"scope="row">{{ $no }}</th>
                                <td class="align-middle text-center">{{$index->pdft_id}}</td>
                                <td class="align-middle text-center">{{$index->mhs_nama}}</td>
                                <td  class="align-middle text-center">
                                    <a href="{{route('Sidang.nilai', ['id' => $index->pdft_id])}}" class="btn btn-success center" style="padding: 5px 5px; font-size: 10px;"name="Sidang.nilai">
                                        <i class="fas fa-edit"></i> <span>Nilai</span>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
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
            </script>
        </div>
</body>

   
@endsection