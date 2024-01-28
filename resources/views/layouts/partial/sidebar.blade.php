<div class="polman-nav-static-top">
    <div class="float-left">
        <a href="">
            <img src="{{asset('assets/image/palingbaru_logo.png') }}" style="height: 45px ;" />
        </a>
    </div>
    <div class="polman-menu">
        <div style="padding-top: 15px; margin-right: -30px;">
            @if(Auth::guard('pengguna')->check())
            Hai, <b>{{auth('pengguna')->user()->png_username}}</b> ({{auth('pengguna')->user()->png_role}})
            @elseif (Auth::guard('mahasiswa')->check())
            Hai, <b>{{auth('mahasiswa')->user()->mhs_nama}}</b> (Mahasiswa)
            @else
            Selamat datang, silakan login.
            <a href="{{route('login')}}" class="btn btn-primary"></a>
            @endif

        </div>


        <div class="polman-menu-bar">
            <div class="float-right">
                <div class="fa fa-bars fa-2x" style="margin-top: 9px; cursor: pointer;" aria-hidden="true" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="menu"></div>
            </div>
        </div>
    </div>

    <div class="polman-nav-static-right collapse scrollstyle" id="menu">
        <div id="accordions" role="tablist" aria-multiselectable="true">
            <div class="list-group">
                {{-- PENGGUNA --}}
                @if(Auth::guard('pengguna')->check())
                    @if (auth('pengguna')->user()->png_role == "Koordinator TA")
                        
                    <a href='{{route('DashboardKoordinatorTA.index')}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-home fa-lg fa-pull-left'></i>Dashboard
                    </a>
                    <a href='{{route('Pembimbing')}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-user fa-lg fa-pull-left'></i>Pembimbing
                    </a>
                    <a href='{{route('Penguji')}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-user-secret fa-lg fa-pull-left'></i>Penguji
                    </a>
                    <a href='{{route("SidangKoor")}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-file-alt fa-lg fa-pull-left'></i>Sidang Koor
                    </a>
                    <a href='{{route("kategori_penilaian")}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-file-alt fa-lg fa-pull-left'></i>Kategori Penilaian
                    </a>
                    <div id='menu2' class='collapse' role='tabpanel'>
                    
                        <a href="dashboardaHasilsidang" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>Hasil Sidang </a>
                        <a href="dashboardaSidangBAPSidang" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>Sidang BAP TA </a>
                        <a href="dashboardaPenilaianSidangTa" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>penilaian Sidang TA</a>
                    </div>
                    @elseif  (auth('pengguna')->user()->png_role == "DAAA")
       
                    <a href='{{route('DashboardDAAA.index')}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-home fa-lg fa-pull-left'></i>Dashboard
                    </a>
                    <a href='{{route('DashboardUndangan.Undangan')}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-user fa-lg fa-pull-left'></i>Undangan
                    </a>
                    @elseif  (auth('pengguna')->user()->png_role == "Kepala Prodi")
       
                    <a href='{{route('DashboardKepalaProdi.index')}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-home fa-lg fa-pull-left'></i>Dashboard
                    </a>
                    <a href='{{route('DashboardUndangan.Undangan')}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-user fa-lg fa-pull-left'></i>Lihat Hasil Nilai
                    </a>
                    @endif
                {{-- Mahasiswa --}}
                @elseif (Auth::guard('mahasiswa')->check())
                    <a href='{{route('DashboardMahasiswa.index')}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-home fa-lg fa-pull-left'></i>Dashboard
                    </a>
                    <a href='{{route('Sidang')}}' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                        <i class='fa fa-pencil-alt fa-lg fa-pull-left'></i>Sidang
                    </a>
                @endif
                <a href="{{route('actioLogout')}}" class="list-group-item list-group-item-action" style="border-radius: 0px; border: none; padding-left: 23px;">
                    <i class="fa fa-sign-out fa-lg fa-pull-left"></i>Logout
                </a>

            </div>
        </div>


    </div>
</div>
</div>