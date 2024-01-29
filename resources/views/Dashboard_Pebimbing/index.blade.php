@extends('layouts.layout')



@section('konten')

<body>
<div class="container">
            <div class="text-center mb-4">
                <h4>Selamat Datang Pembimbing</h4>
            </div>
            <a href="{{route('generate.pdf.undangan', ['idTr'=>'PDFT002'])}}">Tes</a>
            <form class="mx-auto" style="width: 300px;">
               
            </form>
        </div>
</body>

   
@endsection