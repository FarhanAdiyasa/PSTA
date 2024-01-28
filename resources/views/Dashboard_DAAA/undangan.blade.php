@extends('layouts.layout')

@section('konten')
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                <strong class="text-white">Sidang Tugas Akhir</strong>
            </h5>
        </div>
    </div>
  

    <div class="card-body">
        
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="Pebimbing_penguji" class="table datable" width="100%">
        <thead>
            <tr>
                <th class="align-middle text-center">No.</th>
                <th class="align-middle text-center">Pendaftaran Sidang</th>
                <th class="align-middle text-center">Status</th>
                <th class="align-middle text-center">Cetak</th>
            </tr>
        </thead>
        <tbody>
            @if (auth('pengguna')->user()->png_role == "Kepala Prodi")
            @php
            $no = 1;
            @endphp
            @foreach($data as $index => $row)
                @if($row->pdft_totalnilai != NULL)
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $index + $data->firstItem() }}</th>
                    <td class="align-middle text-center">Pengajuan Pendaftaran Sidang Pada {{ $row->pdft_tanggaldibuat}} Disetujui!</td>
                    <td class="align-middle text-center">Menunggu Penilaian</td>
                    <td  class="align-middle text-center">
                        <a href="{{route('Sidang.verifikasi', ['id' => $row->pdft_id])}}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing">
                            <i class="fa-solid fa-print"></i>
                        </a>
                    </td>
                </tr>
                @endif
            @endforeach
            @elseif (auth('pengguna')->user()->png_role == "DAA")
            @php
            $no = 1;
            @endphp
            @foreach($data as $index => $row)
                @if($row->pdft_statusverifikasidata == 'True')
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $index + $data->firstItem() }}</th>
                    <td class="align-middle text-center">Pengajuan Pendaftaran Sidang Pada {{ $row->pdft_tanggaldibuat}} Disetujui!</td>
                    <td class="align-middle text-center">Menunggu Penilaian</td>
                    <td  class="align-middle text-center">
                        <a href="{{route('Sidang.verifikasi', ['id' => $row->pdft_id])}}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing">
                            <i class="fa-solid fa-print"></i>
                        </a>
                    </td>
                </tr>
                @endif
            @endforeach
            @endif
           
        </tbody>
    </table>
</div>
</div>
</body>  
@endsection