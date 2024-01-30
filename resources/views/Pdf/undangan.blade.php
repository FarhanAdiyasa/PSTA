<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="id" lang="id">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>file_1706446372824</title>
    <meta name="author" content="Hence Ronald" />
    <style type="text/css">
      * {
        margin: 0;
        padding: 0;
        text-indent: 0;
      }
      h1 {
        color: black;
        font-family: "Times New Roman", serif;
        text-decoration: none;
        font-size: 12pt;
      }
      .s1 {
        color: black;
        font-family: "Times New Roman", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 12pt;
       
      }
      h2 {
        color: black;
        font-family: "Times New Roman", serif;
        font-style: normal;
        font-weight: bold;
        text-decoration: none;
        font-size: 11pt;
      }
      .s2 {
        color: black;
        font-family: "Times New Roman", serif;
        font-style: normal;
        font-weight: bold;
        text-decoration: none;
        font-size: 11pt;
      }
      .s3 {
        color: black;
        font-family: "Times New Roman", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 11pt;
      }
      p {
        color: black;
        font-family: "Times New Roman", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 9pt;
        margin: 0pt;
      }
      .s4 {
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 9pt;
      }
      li {
        display: block;
      }
      #l1 {
        padding-left: 0pt;
      }
      #l1 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 11pt;
      }
      li {
        display: block;
      }
      #l2 {
        padding-left: 0pt;
        counter-reset: d1 1;
      }
      #l2 > li > *:first-child:before {
        counter-increment: d1;
        content: counter(d1, decimal) ". ";
        color: black;
        font-family: "Times New Roman", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 9pt;
      }
      #l2 > li:first-child > *:first-child:before {
        counter-increment: d1 0;
      }
      table,
      tbody {
        vertical-align: top;
        overflow: visible;
      }
      .page-break {
          page-break-after: always;
      }
    </style>
    
  </head>
  <body>
    @if ($pdft->pdft_pembimbing1)
        
    <div class="container" style="margin-left: 5rem; max-width:39rem;max-height:1123px">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <p style="text-indent: 0pt; text-align: left; marign-bottom:1rem">
          <span 
            ><table cellspacing="0" cellpadding="0">
              <tr>
                <td>
                    <img width="350" height="100" src="{{ public_path('storage/logo-astra-baru.jpg') }}"/>
                </td>
              </tr></table></span>
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          text-align: left;
          margin-bottom: 0.3rem;
        "
      >
      @php
      $bulan = [
          'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ];
      @endphp
      Cikarang, {{ now()->format('d ') }}{{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
      </p>
        <div style="
        padding-top: 1pt;
        margin-top: 2rem;
        margin-bottom: 2rem;
        margin-left: 0.4rem;
        text-indent: 0pt;
        line-height: 108%;">
         <table>
            <tr>
                <td style="padding-right: 4rem">
                  No 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  {{ intval(trim(str_replace('PDFT', '', $pdft->pdft_id))) }}/PA-TPM/VIII/2023
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Perihal 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  Undangan Sidang Tugas Akhir
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Lampiran 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                    Jadwal Sidang
                </td>
            </tr>
         </table>
        </div>
      
        <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
            margin-bottom: 0.3rem;
          "
        >
         Kepada Yth,
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          font-weight:bold;
          text-align: left;
          text-decoration: underline;
        "
      >
       {{$pdft->pbg->pbn_nama}}
      </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    @if ($pdft->pbg->pbn_jenis == "Akademik")
        Dosen
    @else
        Dosen Industri
    @endif
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Politeknik Astra
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Cibatu, Cikarang Selatan, Kab. Bekasi, Jawa Barat, 17530
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2.3rem;
      "
    >
    Dengan Hormat,
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2rem;
      "
    >
    Sehubungan dengan adanya pelaksanaan Tugas Akhir Mahasiswa Teknik Produksi dan Proses
    Manufaktur (TPM) tingkat III tahun ajaran {{$pdft->thn->thn_tahunajaran}}, maka dengan ini kami mohon kesediaan
    Bapak/Ibu untuk hadir sebagai Pembimbing pada Sidang Tugas Akhir tersebut (jadwal sidang tugas
    akhir terlampir).    
    </p>
        <p
          class="s1"
          style="
            padding-top: 7pt;
            margin-top:1rem;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
          Adapun tempat dan waktu pelaksanaan sidang sebagai berikut :
        </p>
        <div class="" style="margin-left:4rem; margin-top:0.2rem">
          <table>
              <tr>
                  <td style="padding-right: 4rem">
                    Hari/Tanggal
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @php
                    $bulan = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];
                
                    $hari = [
                        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
                    ];
                @endphp
                
                {{ $hari[$pdft->pdft_tanggalsidang->format('w')] }} / {{ $pdft->pdft_tanggalsidang->format('d') }} {{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
                
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Waktu
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    {{$pdft->pdft_waktu}} WIB – Selesai.
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Tempat  
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @if ($pdft->pdft_jenissidang == "Online")
                        Online
                    @else
                        {{$pdft->pdft_tempatsidang1}}
                    @endif
                  </td>
              </tr>
          </table>
        </div>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Atas bantuan dan kerjasama Bapak/Ibu kami mengucapkan terima kasih.
        </p>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Hormat Kami,
        </p>
        <div class="">
          <p
          class="s1"
          style="
          margin-top: 7rem;
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            font-weight:bold;
            text-align: left;
            text-decoration: underline;
          "
        >
        Steve Kurniawan. S.T., M.M.
        </p>
          <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
          "
        >
        Ketua Program Studi TPM
        </p>
        </div>
    </div>
    <div class="" style="margin-bottom:0px;margin-top:7.2rem">
      <img width="794" height="120" src="{{ public_path('storage/footer.jpg') }}"/>
    </div>
    
    @endif
    @if ($pdft->pdft_pembimbing2)
    <div class="page-break"></div>
    <div class="container" style="margin-left: 5rem; max-width:39rem;max-height:1123px">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <p style="text-indent: 0pt; text-align: left; marign-bottom:1rem">
          <span 
            ><table cellspacing="0" cellpadding="0">
              <tr>
                <td>
                    <img width="350" height="100" src="{{ public_path('storage/logo-astra-baru.jpg') }}"/>
                </td>
              </tr></table></span>
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          text-align: left;
          margin-bottom: 0.3rem;
        "
      >
      @php
      $bulan = [
          'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ];
      @endphp
      Cikarang, {{ now()->format('d ') }}{{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
      </p>
        <div style="
        padding-top: 1pt;
        margin-top: 2rem;
        margin-bottom: 2rem;
        margin-left: 0.4rem;
        text-indent: 0pt;
        line-height: 108%;">
         <table>
            <tr>
                <td style="padding-right: 4rem">
                  No 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  {{ intval(trim(str_replace('PDFT', '', $pdft->pdft_id))) }}/PA-TPM/VIII/2023
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Perihal 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  Undangan Sidang Tugas Akhir
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Lampiran 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                    Jadwal Sidang
                </td>
            </tr>
         </table>
        </div>
      
        <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
            margin-bottom: 0.3rem;
          "
        >
         Kepada Yth,
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          font-weight:bold;
          text-align: left;
          text-decoration: underline;
        "
      >
      {{$pdft->pbg2->pbn_nama}}
      </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    @if ($pdft->pbg2->pbn_jenis == "Akademik")
        Dosen
    @else
        Dosen Industri
    @endif
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Politeknik Astra
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Cibatu, Cikarang Selatan, Kab. Bekasi, Jawa Barat, 17530
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2.3rem;
      "
    >
    Dengan Hormat,
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2rem;
      "
    >
    Sehubungan dengan adanya pelaksanaan Tugas Akhir Mahasiswa Teknik Produksi dan Proses
    Manufaktur (TPM) tingkat III tahun ajaran {{$pdft->thn->thn_tahunajaran}}, maka dengan ini kami mohon kesediaan
    Bapak/Ibu untuk hadir sebagai Pembimbing pada Sidang Tugas Akhir tersebut (jadwal sidang tugas
    akhir terlampir).    
    </p>
        <p
          class="s1"
          style="
            padding-top: 7pt;
            margin-top:1rem;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
          Adapun tempat dan waktu pelaksanaan sidang sebagai berikut :
        </p>
        <div class="" style="margin-left:4rem; margin-top:0.2rem">
          <table>
              <tr>
                  <td style="padding-right: 4rem">
                    Hari/Tanggal
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @php
                    $bulan = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];
                
                    $hari = [
                        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
                    ];
                @endphp
                
                {{ $hari[$pdft->pdft_tanggalsidang->format('w')] }} / {{ $pdft->pdft_tanggalsidang->format('d') }} {{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
                
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Waktu
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    {{$pdft->pdft_waktu}} WIB – Selesai.
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Tempat  
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @if ($pdft->pdft_jenissidang == "Online")
                        Online
                    @else
                        {{$pdft->pdft_tempatsidang1}}
                    @endif
                  </td>
              </tr>
          </table>
        </div>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Atas bantuan dan kerjasama Bapak/Ibu kami mengucapkan terima kasih.
        </p>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Hormat Kami,
        </p>
        <div class="">
          <p
          class="s1"
          style="
          margin-top: 7rem;
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            font-weight:bold;
            text-align: left;
            text-decoration: underline;
          "
        >
        Steve Kurniawan. S.T., M.M.
        </p>
          <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
          "
        >
        Ketua Program Studi TPM
        </p>
        </div>
    </div>
    <div class="" style="margin-bottom:0px;margin-top:7.2rem">
      <img width="794" height="120" src="{{ public_path('storage/footer.jpg') }}"/>
    </div>
    @endif
    @if ($pdft->pdft_penguji1)
    <div class="page-break"></div>
    <div class="container" style="margin-left: 5rem; max-width:39rem;max-height:1123px">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <p style="text-indent: 0pt; text-align: left; marign-bottom:1rem">
          <span 
            ><table cellspacing="0" cellpadding="0">
              <tr>
                <td>
                    <img width="350" height="100" src="{{ public_path('storage/logo-astra-baru.jpg') }}"/>
                </td>
              </tr></table></span>
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          text-align: left;
          margin-bottom: 0.3rem;
        "
      >
      @php
      $bulan = [
          'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ];
      @endphp
      Cikarang, {{ now()->format('d ') }}{{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
      </p>
        <div style="
        padding-top: 1pt;
        margin-top: 2rem;
        margin-bottom: 2rem;
        margin-left: 0.4rem;
        text-indent: 0pt;
        line-height: 108%;">
         <table>
            <tr>
                <td style="padding-right: 4rem">
                  No 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  {{ intval(trim(str_replace('PDFT', '', $pdft->pdft_id))) }}/PA-TPM/VIII/2023
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Perihal 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  Undangan Sidang Tugas Akhir
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Lampiran 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                    Jadwal Sidang
                </td>
            </tr>
         </table>
        </div>
      
        <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
            margin-bottom: 0.3rem;
          "
        >
         Kepada Yth,
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          font-weight:bold;
          text-align: left;
          text-decoration: underline;
        "
      >
      {{$pdft->pnj->pbn_nama}}
      </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    @if ($pdft->pnj->pbn_jenis == "Akademik")
        Dosen
    @else
       {{$pdft->pnj->pbn_jabatan}}
    @endif
    </p>
    @if ($pdft->pnj->pbn_jenis == "Akademik")
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Politeknik Astra
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Cibatu, Cikarang Selatan, Kab. Bekasi, Jawa Barat, 17530
    </p>
    @else
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
   {{$pdft->pdft_perusahaan}}
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Di tempat
    </p>
    @endif
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2.3rem;
      "
    >
    Dengan Hormat,
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2rem;
      "
    >
    Sehubungan dengan adanya pelaksanaan Tugas Akhir Mahasiswa Teknik Produksi dan Proses
    Manufaktur (TPM) tingkat III tahun ajaran {{$pdft->thn->thn_tahunajaran}}, maka dengan ini kami mohon kesediaan
    Bapak/Ibu untuk hadir sebagai Pembimbing pada Sidang Tugas Akhir tersebut (jadwal sidang tugas
    akhir terlampir).    
    </p>
        <p
          class="s1"
          style="
            padding-top: 7pt;
            margin-top:1rem;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
          Adapun tempat dan waktu pelaksanaan sidang sebagai berikut :
        </p>
        <div class="" style="margin-left:4rem; margin-top:0.2rem">
          <table>
              <tr>
                  <td style="padding-right: 4rem">
                    Hari/Tanggal
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @php
                    $bulan = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];
                
                    $hari = [
                        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
                    ];
                @endphp
                
                {{ $hari[$pdft->pdft_tanggalsidang->format('w')] }} / {{ $pdft->pdft_tanggalsidang->format('d') }} {{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
                
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Waktu
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    {{$pdft->pdft_waktu}} WIB – Selesai.
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Tempat  
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @if ($pdft->pdft_jenissidang == "Online")
                        Online
                    @else
                        {{$pdft->pdft_tempatsidang1}}
                    @endif
                  </td>
              </tr>
          </table>
        </div>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Atas bantuan dan kerjasama Bapak/Ibu kami mengucapkan terima kasih.
        </p>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Hormat Kami,
        </p>
        <div class="">
          <p
          class="s1"
          style="
            padding-top: 2pt;
            margin-top: 7rem;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            font-weight:bold;
            text-align: left;
            text-decoration: underline;
          "
        >
        Steve Kurniawan. S.T., M.M.
        </p>
          <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
          "
        >
        Ketua Program Studi TPM
        </p>
        </div>
    </div>
    <div class="" style="margin-bottom:0px;margin-top:7.2rem">
      <img width="794" height="120" src="{{ public_path('storage/footer.jpg') }}"/>
    </div>
    @endif
    @if ($pdft->pdft_penguji2)
    <div class="page-break"></div>
    <div class="container" style="margin-left: 5rem; max-width:39rem;max-height:1123px">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <p style="text-indent: 0pt; text-align: left; marign-bottom:1rem">
          <span 
            ><table cellspacing="0" cellpadding="0">
              <tr>
                <td>
                    <img width="350" height="100" src="{{ public_path('storage/logo-astra-baru.jpg') }}"/>
                </td>
              </tr></table></span>
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          text-align: left;
          margin-bottom: 0.3rem;
        "
      >
      @php
      $bulan = [
          'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ];
      @endphp
      Cikarang, {{ now()->format('d ') }}{{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
      </p>
        <div style="
        padding-top: 1pt;
        margin-top: 2rem;
        margin-bottom: 2rem;
        margin-left: 0.4rem;
        text-indent: 0pt;
        line-height: 108%;">
         <table>
            <tr>
                <td style="padding-right: 4rem">
                  No 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  {{ intval(trim(str_replace('PDFT', '', $pdft->pdft_id))) }}/PA-TPM/VIII/2023
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Perihal 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  Undangan Sidang Tugas Akhir
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Lampiran 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                    Jadwal Sidang
                </td>
            </tr>
         </table>
        </div>
      
        <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
            margin-bottom: 0.3rem;
          "
        >
         Kepada Yth,
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          font-weight:bold;
          text-align: left;
          text-decoration: underline;
        "
      >
      {{$pdft->pnj2->pbn_nama}}
      </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    @if ($pdft->pnj2->pbn_jenis == "Akademik")
        Dosen
    @else
        Dosen Industri
    @endif
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Politeknik Astra
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Cibatu, Cikarang Selatan, Kab. Bekasi, Jawa Barat, 17530
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2.3rem;
      "
    >
    Dengan Hormat,
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2rem;
      "
    >
    Sehubungan dengan adanya pelaksanaan Tugas Akhir Mahasiswa Teknik Produksi dan Proses
    Manufaktur (TPM) tingkat III tahun ajaran {{$pdft->thn->thn_tahunajaran}}, maka dengan ini kami mohon kesediaan
    Bapak/Ibu untuk hadir sebagai Pembimbing pada Sidang Tugas Akhir tersebut (jadwal sidang tugas
    akhir terlampir).    
    </p>
        <p
          class="s1"
          style="
            padding-top: 7pt;
            margin-top:1rem;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
          Adapun tempat dan waktu pelaksanaan sidang sebagai berikut :
        </p>
        <div class="" style="margin-left:4rem; margin-top:0.2rem">
          <table>
              <tr>
                  <td style="padding-right: 4rem">
                    Hari/Tanggal
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @php
                    $bulan = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];
                
                    $hari = [
                        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
                    ];
                @endphp
                
                {{ $hari[$pdft->pdft_tanggalsidang->format('w')] }} / {{ $pdft->pdft_tanggalsidang->format('d') }} {{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
                
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Waktu
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    {{$pdft->pdft_waktu}} WIB – Selesai.
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Tempat  
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @if ($pdft->pdft_jenissidang == "Online")
                        Online
                    @else
                        {{$pdft->pdft_tempatsidang1}}
                    @endif
                  </td>
              </tr>
          </table>
        </div>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Atas bantuan dan kerjasama Bapak/Ibu kami mengucapkan terima kasih.
        </p>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Hormat Kami,
        </p>
        <div class="">
          
          <p
          class="s1"
          style="
          margin-top: 7rem;
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            font-weight:bold;
            text-align: left;
            text-decoration: underline;
          "
        >
        Steve Kurniawan. S.T., M.M.
        </p>
          <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
          "
        >
        Ketua Program Studi TPM
        </p>
        </div>
    </div>
    <div class="" style="margin-bottom:0px;margin-top:7.2rem">
      <img width="794" height="120" src="{{ public_path('storage/footer.jpg') }}"/>
    </div>
    @endif
    @if ($pdft->pdft_penguji3)
    <div class="page-break"></div>
    <div class="container" style="margin-left: 5rem; max-width:39rem;max-height:1123px">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <p style="text-indent: 0pt; text-align: left; marign-bottom:1rem">
          <span 
            ><table cellspacing="0" cellpadding="0">
              <tr>
                <td>
                    <img width="350" height="100" src="{{ public_path('storage/logo-astra-baru.jpg') }}"/>
                </td>
              </tr></table></span>
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          text-align: left;
          margin-bottom: 0.3rem;
        "
      >
      @php
      $bulan = [
          'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ];
      @endphp
      Cikarang, {{ now()->format('d ') }}{{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
      </p>
        <div style="
        padding-top: 1pt;
        margin-top: 2rem;
        margin-bottom: 2rem;
        margin-left: 0.4rem;
        text-indent: 0pt;
        line-height: 108%;">
         <table>
            <tr>
                <td style="padding-right: 4rem">
                  No 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  {{ intval(trim(str_replace('PDFT', '', $pdft->pdft_id))) }}/PA-TPM/VIII/2023
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Perihal 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                  Undangan Sidang Tugas Akhir
                </td>
            </tr>
            <tr>
                <td style="padding-right: 4rem">
                  Lampiran 
                </td>
                <td style="padding-right: 0.3rem">
                    :
                </td>
                <td>
                    Jadwal Sidang
                </td>
            </tr>
         </table>
        </div>
      
        <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
            margin-bottom: 0.3rem;
          "
        >
         Kepada Yth,
        </p>
        <p
        class="s1"
        style="
          padding-top: 2pt;
          padding-left: 5pt;
          text-indent: 0pt;
          line-height: 108%;
          font-weight:bold;
          text-align: left;
          text-decoration: underline;
        "
      >
      {{$pdft->pnj3->pbn_nama}}
      </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    @if ($pdft->pnj3->pbn_jenis == "Akademik")
        Dosen
    @else
        Dosen Industri
    @endif
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Politeknik Astra
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
      "
    >
    Cibatu, Cikarang Selatan, Kab. Bekasi, Jawa Barat, 17530
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2.3rem;
      "
    >
    Dengan Hormat,
    </p>
      <p
      class="s1"
      style="
        padding-top: 2pt;
        padding-left: 5pt;
        text-indent: 0pt;
        line-height: 108%;
        text-align: left;
        margin-top:2rem;
      "
    >
    Sehubungan dengan adanya pelaksanaan Tugas Akhir Mahasiswa Teknik Produksi dan Proses
    Manufaktur (TPM) tingkat III tahun ajaran {{$pdft->thn->thn_tahunajaran}}, maka dengan ini kami mohon kesediaan
    Bapak/Ibu untuk hadir sebagai Pembimbing pada Sidang Tugas Akhir tersebut (jadwal sidang tugas
    akhir terlampir).    
    </p>
        <p
          class="s1"
          style="
            padding-top: 7pt;
            margin-top:1rem;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
          Adapun tempat dan waktu pelaksanaan sidang sebagai berikut :
        </p>
        <div class="" style="margin-left:4rem; margin-top:0.2rem">
          <table>
              <tr>
                  <td style="padding-right: 4rem">
                    Hari/Tanggal
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @php
                    $bulan = [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];
                
                    $hari = [
                        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
                    ];
                @endphp
                
                {{ $hari[$pdft->pdft_tanggalsidang->format('w')] }} / {{ $pdft->pdft_tanggalsidang->format('d') }} {{ $bulan[now()->format('n') - 1] }}{{ now()->format(' Y') }}
                
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Waktu
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    {{$pdft->pdft_waktu}} WIB – Selesai.
                  </td>
              </tr>
              <tr>
                  <td style="padding-right: 4rem">
                    Tempat  
                  </td>
                  <td style="padding-right: 0.3rem">
                      :
                  </td>
                  <td>
                    @if ($pdft->pdft_jenissidang == "Online")
                        Online
                    @else
                        {{$pdft->pdft_tempatsidang1}}
                    @endif
                  </td>
              </tr>
          </table>
        </div>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Atas bantuan dan kerjasama Bapak/Ibu kami mengucapkan terima kasih.
        </p>
        <p
          class="s1"
          style="
          margin-top:1.4rem;
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
        Hormat Kami,
        </p>
        <div class="">
          <p
          class="s1"
          style="
          margin-top: 7rem;
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            font-weight:bold;
            text-align: left;
            text-decoration: underline;
          "
        >
        Steve Kurniawan. S.T., M.M.
        </p>
          <p
          class="s1"
          style="
            padding-top: 2pt;
            padding-left: 5pt;
            text-indent: 0pt;
            line-height: 108%;
            text-align: left;
          "
        >
        Ketua Program Studi TPM
        </p>
        </div>
    </div>
    <div class="" style="margin-bottom:0px;margin-top:7.2rem">
      <img width="794" height="120" src="{{ public_path('storage/footer.jpg') }}"/>
    </div>
    @endif
  </body>
</html>
