@extends('layouts.layout')

@section('konten')
@if (session('error'))
<div class="alert alert-warning">{{ session('error') }}</div>
@endif
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #1F6A00;">
                        <strong class="text-white">Pendaftaran Sidang Tugas Akhir</strong>
                    </h5>

                    <div class="card-body">
                            <div class="mb-3">
                                <label for="pdft_bapsuratketerangan" class="form-label">BAP Surat Keterangan</label><br>
                               Download <a href="{{ route('download', ['file' => $pdft->pdft_bapsuratketerangan]) }}">{{$pdft->pdft_bapsuratketerangan}}</a>
                            </div>

                            <div class="mb-3">
                                <label for="pdft_bapprasidang" class="form-label">BAP Prasidang</label><br>
                                Download <a href="{{ route('download', ['file' => $pdft->pdft_bapprasidang]) }}">{{$pdft->pdft_bapprasidang}}</a>
                            </div>

                            <div class="mb-3">
                                <label for="pdft_bapbimbingan" class="form-label">BAP Bimbingan</label><br>
                                Download <a href="{{ route('download', ['file' => $pdft->pdft_bapbimbingan]) }}">{{$pdft->pdft_bapbimbingan}}</a>
                            </div>

                            <div class="mb-3">
                                <label for="pdft_baplembarpersetujuan" class="form-label">BAP Lembar Persetujuan</label><br>
                                Download <a href="{{ route('download', ['file' => $pdft->pdft_baplembarpersetujuan]) }}">{{$pdft->pdft_baplembarpersetujuan}}</a>
                            </div>
                            <a href="{{route('SidangKoor')}}" class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                            <a href="{{ route('download.all', ['id' => $pdft->pdft_id]) }}" class="btn btn-primary">Download All As Zip</a>
                            
                            @if ($pdft->pdft_statusverifikasidokumen != 'Disetujui')
                                <a href="#" class="btn btn-primary mx-5" id="setujuiButton">Setujui</a>
                            @endif
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('setujuiButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default action (i.e., following the link)
    
            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menyetujui?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // If user clicks "Ya, Setujui!", proceed with the approval action
                if (result.isConfirmed) {
                    window.location.href = "{{ route('setujui', ['id' => $pdft->pdft_id]) }}";
                }
            });
        });
    </script>
@endsection
