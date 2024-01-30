@extends('layouts.layout')

@section('konten')
@php
    use Carbon\Carbon;
@endphp
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
                <th class="align-middle text-center">Cetak</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($data as $index => $row)
            @if($row->pdft_statusverifikasidata == "True")
            <tr>
                <th  class="align-middle text-center"scope="row">{{$no}}</th>
                @php
                    // Konversi tanggal menggunakan Carbon dengan pengaturan Bahasa Indonesia
                    setlocale(LC_TIME, 'id_ID');
                    $formattedDate = Carbon::parse($row->pdft_tanggaldibuat)->isoFormat('dddd, D MMMM YYYY');
                @endphp
                <td class="align-middle text-center">Pengajuan Pendaftaran {{$row->mhs_nim}} Sidang Pada {{ $formattedDate}} Disetujui!</td>
                <td class="align-middle text-center">Menunggu Penilaian</td>
                <td  class="align-middle text-center">
                    <a href="{{route('generate.pdf.undangan', ["idTr"=>$row->pdft_id])}}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing">
                        <i class="fa-solid fa-download"></i>
                    </a>
                    <button type="button" class="btn btn-info center" data-bs-toggle="modal" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing" data-bs-target="#modalInputLinkSidang"><i class="fa-solid fa-upload"></i></button>
                    <div class="modal fade" id="modalInputLinkSidang" tabindex="-1" aria-labelledby="modalInputLinkSidangLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalInputLinkSidangLabel">Input Link Sidang</h5>
                                    <button type="button" class="btn-close center" data-bs-dismiss="modal" aria-label="Close" style="padding: 5px 5px; font-size: 10px;"name="Edit.Pembimbing"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form untuk input link sidang -->
                                    <form action="{{route('DashboardUndangan.Upload')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" value="{{$row->pdft_id}}" name="pdft_id">
                                        <div class="mb-3">
                                            <label for="pdft_link" class="form-label">Undangan Sidang</label>
                                            <input type="file" name="pdft_undangan" class="form-control" id="pdft_undangan" accept=".pdf">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Unggah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @php
                $no++;
            @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>
</div>
<script>
    $(document).ready( function () {    
        $('#Pebimbing_penguji').DataTable();
    } );
</script>
</body>  
@endsection