@extends('layouts.layout')

@section('konten')
<body>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
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
                <th class="align-middle text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($data as $index => $row)
                @if ($row->pdft_statusverifikasidokumen == null)
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $index + $data->firstItem() }}</th>
                    <td class="align-middle text-center">{{$row->pdft_ids}} Mengajukan Pendaftaran Sidang Pada {{ $row->pdft_tanggaldibuat}}</td>
                    <td class="align-middle text-center">Menunggu Persetujuan</td>
                    <td  class="align-middle text-center">
                        <a href="{{ route('SidangKoor.Setujui', ['id' => $row->pdft_id]) }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @elseif($row->pdft_statusverifikasidokumen == "Disetujui" && $row->pdft_tanggalsidang == null)
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $index + $data->firstItem() }}</th>
                    <td class="align-middle text-center">Pengajuan Pendaftaran {{$row->mhs_nim}} Sidang Pada {{ $row->pdft_tanggaldibuat}} Disetujui!</td>
                    <td class="align-middle text-center">Menunggu Pelengkapan</td>
                    <td  class="align-middle text-center">
                        <a href="{{ route('SidangKoor.Setujui', ['id' => $row->pdft_id]) }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </td>
                </tr>
                @elseif($row->pdft_statusverifikasidata == "True" && !$row->pdf_statuskelulusan)
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $index + $data->firstItem() }}</th>
                    <td class="align-middle text-center">Pengajuan Pendaftaran {{$row->mhs_nim}} Sidang Pada {{ $row->pdft_tanggaldibuat}} Disetujui!</td>
                    <td class="align-middle text-center">Menunggu Penilaian</td>
                    <td  class="align-middle text-center">
                        <a href="{{ route('SidangKoor.undang', ['id' => $row->pdft_id]) }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </td>
                </tr>
                @elseif($row->pdf_statuskelulusan)
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $index + $data->firstItem() }}</th>
                    <td class="align-middle text-center">Pengajuan Pendaftaran {{$row->mhs_nim}} Sidang Pada {{ $row->pdft_tanggaldibuat}} Disetujui!</td>
                    <td class="align-middle text-center">Sudah Dinilai</td>
                    <td  class="align-middle text-center">
                        <a href="{{ route('SidangKoor.dinilai', ['id' => $row->pdft_id]) }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </td>
                </tr>
                @else
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $index + $data->firstItem() }}</th>
                    @php
                        // Konversi tanggal menggunakan Carbon
                        $formattedDate = \Carbon\Carbon::parse($row->pdft_tanggaldibuat)->format('l, d F Y');
                    @endphp
                    <td class="align-middle text-center">Pengajuan Pendaftaran Sidang Pada {{ $formattedDate}} Disetujui!</td>
                    <td class="align-middle text-center">Menunggu Verifikasi Koordinator</td>
                    <td  class="align-middle text-center">
                        <a href="{{route('Sidang.verifikasi', ['id' => $row->pdft_id])}}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing">
                            <i class="fa-solid fa-square-check"></i>
                        </a>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
</div>
</body>  
<script>
    $(document).ready( function () {    
        $('#Pebimbing_penguji').DataTable();
    } );
</script>
@endsection