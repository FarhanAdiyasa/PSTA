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
        font-style: normal;
        font-weight: bold;
        text-decoration: none;
        font-size: 12pt;
      }
      .s1 {
        color: black;
        font-family: "Times New Roman", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 11pt;
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
    </style>
  </head>
  <body>
    <div class="container" style="margin-left: 5rem">
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <p style="text-indent: 0pt; text-align: left; marign-bottom:1rem">
          <span 
            ><table cellspacing="0" cellpadding="0">
              <tr>
                <td>
                    <img width="350" height="80" src="{{ public_path('storage/logoAstra.jpg') }}"/>
                </td>
              </tr></table></span>
        </p>
        <h1
          style="
            padding-top: 4pt;
            padding-left: 143pt;
            text-indent: 0pt;
          "
        >
          Berita Acara Sidang Tugas Akhir
        </h1>
        <h1
          style="
            padding-top: 1pt;
            padding-left: 85pt;
            text-indent: 0pt;
            line-height: 108%;
          "
        >
          Program Studi Teknik Produksi dan Proses Manufaktur
        </h1>
        <h1
        style="
          padding-left: 159pt;
          text-indent: 0pt;
          line-height: 16pt;
          text-align: left;
           margin-bottom:1rem;
        "
      >
        Tahun Ajaran 2022/2023
      </h1>
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
          Kami yang bertanda tangan di bawah ini, merupakan pembimbing dan penguji
          Sidang Tugas Akhir <br>
           Mahasiswa sebagai berikut:
        </p>
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <table  style="padding-left: 5pt; text-indent: 0pt; text-align: left">
          <tbody>
            <tr style="height:1.5rem">
              <td>
                <h2>
                  Nama
                </h2>
              </td>
              <td>
                <h2>
                  :
                </h2>
              </td>
              <td>
                <p
                class="s1"
                style="
                  padding-top: 2pt;
                  padding-left: 10pt;
                  text-indent: 0pt;
                  line-height: 108%;
                  text-align: left;
                  margin-bottom: 0.3rem;
                "
              >
                  {{$pdft->mahasiswa->mhs_nama}}
              </p>
              </td>
            </tr>
            <tr style="height:1.5rem">
              <td>
                <h2>
                  NIM
                </h2>
              </td>
              <td>
                <h2>
                  :
                </h2>
              </td>
              <td>
                <p
                class="s1"
                style="
                  padding-top: 2pt;
                  padding-left: 10pt;
                  text-indent: 0pt;
                  line-height: 108%;
                  text-align: left;
                  margin-bottom: 0.3rem;
                "
              >
              {{$pdft->mhs_username}}
              </p>
                
              </td>
            </tr>
            <tr style="height:1.5rem;">
              <td>
                <h2 style="padding-right: 3rem">
                  Judul Tugas Akhir
                </h2>
              </td>
              <td>
                <h2>
                  :
                </h2>
              </td>
              <td>
                <p
                class="s1"
                style="
                  padding-top: 2pt;
                  padding-left: 10pt;
                  text-indent: 0pt;
                  line-height: 108%;
                  text-align: left;
                  margin-bottom: 0.3rem;
                "
              >
                  {{$pdft->pdft_judultugasakhir}}
              </p>
              </td>
            </tr>
          </tbody>
        </table>
        <br>
          Menyatakan bahwa mahasiswa tersebut telah melaksanakan
          <b>Sidang Tugas Akhir, </b>pada:

        <br>
        <table  style="margin-top:1rem;padding-left: 5pt; text-indent: 0pt; text-align: left">
          <tbody>
            <tr style="height:1.5rem">
              <td>
                <h2>
                  Hari, tanggal
                </h2>
              </td>
              <td>
                <h2>
                  :
                </h2>
              </td>
              <td>
                <p
                class="s1"
                style="
                  padding-top: 2pt;
                  padding-left: 10pt;
                  text-indent: 0pt;
                  line-height: 108%;
                  text-align: left;
                  margin-bottom: 0.3rem;
                "
              >
                  {{$pdft->pdft_tanggalsidang}}
              </p>
              </td>
            </tr>
            <tr style="height:1.5rem">
              <td>
                <h2>
                  Waktu
                </h2>
              </td>
              <td>
                <h2>
                  :
                </h2>
              </td>
              <td>
                <p
                class="s1"
                style="
                  padding-top: 2pt;
                  padding-left: 10pt;
                  text-indent: 0pt;
                  line-height: 108%;
                  text-align: left;
                  margin-bottom: 0.3rem;
                "
              >
                  {{$pdft->pdft_waktu}} - Selesai
              </p>
              </td>
            </tr>
            <tr style="height:1.5rem;">
              <td>
                <h2 style="padding-right: 5rem">
                  Lokasi
                </h2>
              </td>
              <td>
                <h2>
                  :
                </h2>
              </td>
              <td>
                <p
                class="s1"
                style="
                  padding-top: 2pt;
                  padding-left: 10pt;
                  text-indent: 0pt;
                  line-height: 108%;
                  text-align: left;
                  margin-bottom: 0.3rem;
                "
              >
                  @if ($pdft->pdft_jenissidang == "Online")
                      Online
                  @else
                      {{$pdft->pdft_tempatsidang1}}
                  @endif
              </p>
              </td>
            </tr>
            <tr style="height:1.5rem;">
              <td>
                <h2 style="padding-right: 5rem">
                  Pembimbing
                </h2>
              </td>
              <td>
                <h2>
                  :
                </h2>
              </td>
              <td>
                <p
                class="s1"
                style="
                  padding-top: 2pt;
                  padding-left: 10pt;
                  text-indent: 0pt;
                  line-height: 108%;
                  text-align: left;
                "
              >
                  1. {{$pdft->pdft_pembimbing1}}
              </p>
                <br>
                <p
                class="s1"
                style="
                  padding-left: 10pt;
                  text-indent: 0pt;
                  line-height: 108%;
                  text-align: left;
                  margin-bottom: 0.3rem;
                "
              >
                  2. {{$pdft->pdft_pembimbing2}}
            </p>
              </td>
            </tr>
          </tbody>
        </table>
        <br>
          Dengan hasil penilaian sebagai berikut:
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <table
          style="border-collapse: collapse; margin-left: 5.27398pt"
          cellspacing="0"
        >
          <tr style="height: 13pt">
            <td
              style="
                width: 71pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s2"
                style="
                  padding-left: 12pt;
                  padding-right: 11pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: center;
                "
              >
                Penguji
              </p>
            </td>
            <td
              style="
                width: 173pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s2"
                style="
                  padding-left: 53pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                Nama Penguji
              </p>
            </td>
            <td
              style="
                width: 96pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s2"
                style="
                  padding-left: 9pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                Nilai Ujian (NU)
              </p>
            </td>
            <td
              style="
                width: 45pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s2"
                style="
                  padding-left: 7pt;
                  padding-right: 7pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: center;
                "
              >
                Bobot
              </p>
            </td>
            <td
              style="
                width: 66pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s2"
                style="
                  padding-left: 5pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                NU x Bobot
              </p>
            </td>
          </tr>
          @php
              $total = 0;
          @endphp
          @for ($i = 0; $i < $penguji; $i++) 
          
          <tr style="height: 25pt">
            <td
              style="
                width: 71pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s2"
                style="
                  padding-top: 5pt;
                  padding-left: 12pt;
                  padding-right: 11pt;
                  text-indent: 0pt;
                  text-align: center;
                "
              >
                Penguji 1
              </p>
            </td>
            <td
              style="
                width: 173pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: center;"><br />{{$result[$i]->pbn_nama}} </p>
            </td>
            <td
              style="
                width: 96pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: center"><br /> {{$result[$i]->total_nilai}}</p>
            </td>
            <td
              style="
                width: 45pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s3"
                style="
                  padding-top: 5pt;
                  padding-left: 7pt;
                  padding-right: 7pt;
                  text-indent: 0pt;
                  text-align: center;
                "
              >
                1/{{$penguji}}
              </p>
            </td>
            <td
              style="
                width: 66pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: center"><br />
                {{$result[$i]->total_nilai / $penguji}}
                @php
                     $total += $result[$i]->total_nilai / $penguji
                @endphp
              </p>
            </td>
          </tr>
         @endfor
          {{-- <tr style="height: 22pt">
            <td
              style="
                width: 71pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s2"
                style="
                  padding-top: 4pt;
                  padding-left: 12pt;
                  padding-right: 11pt;
                  text-indent: 0pt;
                  text-align: center;
                "
              >
                Penguji 2
              </p>
            </td>
            <td
              style="
                width: 173pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: left"><br /></p>
            </td>
            <td
              style="
                width: 96pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: left"><br /></p>
            </td>
            <td
              style="
                width: 45pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s3"
                style="
                  padding-top: 4pt;
                  padding-left: 7pt;
                  padding-right: 7pt;
                  text-indent: 0pt;
                  text-align: center;
                "
              >
                1/3
              </p>
            </td>
            <td
              style="
                width: 66pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: left"><br /></p>
            </td>
          </tr>
          <tr style="height: 22pt">
            <td
              style="
                width: 71pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s2"
                style="
                  padding-top: 4pt;
                  padding-left: 12pt;
                  padding-right: 11pt;
                  text-indent: 0pt;
                  text-align: center;
                "
              >
                Penguji 3
              </p>
            </td>
            <td
              style="
                width: 173pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: left"><br /></p>
            </td>
            <td
              style="
                width: 96pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: left"><br /></p>
            </td>
            <td
              style="
                width: 45pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p
                class="s3"
                style="
                  padding-top: 4pt;
                  padding-left: 7pt;
                  padding-right: 7pt;
                  text-indent: 0pt;
                  text-align: center;
                "
              >
                1/3
              </p>
            </td>
            <td
              style="
                width: 66pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: left"><br /></p>
            </td>
          </tr> --}}
          <tr style="height: 21pt">
            <td
              style="
                width: 385pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
              colspan="4"
            >
              <p
                class="s2"
                style="
                  padding-top: 4pt;
                  padding-left: 173pt;
                  padding-right: 173pt;
                  text-indent: 0pt;
                  text-align: center;
                "
              >
                Jumlah
              </p>
            </td>
            <td
              style="
                width: 66pt;
                border-top-style: solid;
                border-top-width: 1pt;
                border-left-style: solid;
                border-left-width: 1pt;
                border-bottom-style: solid;
                border-bottom-width: 1pt;
                border-right-style: solid;
                border-right-width: 1pt;
              "
            >
              <p style="text-indent: 0pt; text-align: center"><br />{{$total}}
              </p>
            </td>
          </tr>
        </table>
        <p
          class="s1"
          style="
            padding-top: 6pt;
            padding-left: 5pt;
            text-indent: 0pt;
            text-align: left;
          "
        >
          Dengan grade untuk angka tersebut adalah ….. , sehingga mahasiswa tersebut
          dinyatakan:
        </p>
        <ul>
          <li>
            <input type="checkbox" style="
                padding-left: 16pt;
                text-indent: -10pt;
                line-height: 13pt;
                text-align: left;
                margin-left:2rem;
                margin-top:0.5rem;"/>Lulus
          </li>
          <li>
            <input type="checkbox" style="
                padding-left: 16pt;
                text-indent: -10pt;
                line-height: 13pt;
                text-align: left;
                margin-left:2rem;
                margin-top:0.5rem;"/>Lulus dengan revisi
          </li>
          <li>
            <input type="checkbox" style="
                padding-left: 16pt;
                text-indent: -10pt;
                line-height: 13pt;
                text-align: left;
                margin-left:2rem;
                margin-top:0.5rem;"/>Tidak Lulus, mengulang ujian sidang
          </li>
        </ul>
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <table
          style="border-collapse: collapse; margin-left: 15.964pt"
          cellspacing="0"
        >
          <tr style="height: 30pt">
            <td style="width: 266pt" colspan="2">
              <p
                class="s2"
                style="
                  padding-left: 26pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                Ketua Penguji / Pembimbing 1
              </p>
            </td>
            <td style="width: 157pt">
              <p
                class="s2"
                style="
                  padding-left: 23pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                Pembimbing 2
              </p>
            </td>
          </tr>
          <tr style="height: 43pt">
            <td style="width: 266pt" colspan="2">
              <p style="text-indent: 0pt; text-align: left"><br /></p>
              <p
                class="s2"
                style="
                  padding-top: 7pt;
                  padding-left: 41pt;
                  text-indent: 0pt;
                  text-align: left;
                  margin-top: 3rem;
                "
              >
                (……………………..….)
              </p>
            </td>
            <td style="width: 157pt">
              <p style="text-indent: 0pt; text-align: left"><br /></p>
              <p class="s2" style="text-indent: 0pt; text-align: left;margin-top: 3rem;">
                (……………………..….)
              </p>
            </td>
          </tr>
          <tr style="height: 40pt">
            <td style="width: 134pt">
              <p
                class="s2"
                style="
                  padding-top: 7pt;
                  padding-left: 2pt;
                  padding-right: 16pt;
                  text-indent: 0pt;
                  text-align: center;
                "
              >
                Penguji 1
              </p>
            </td>
            <td style="width: 132pt">
              <p
                class="s2"
                style="
                  padding-top: 7pt;
                  padding-left: 16pt;
                  text-indent: 0pt;
                  text-align: center;
                "
              >
                Penguji 2
              </p>
            </td>
            <td style="width: 157pt">
              <p
                class="s2"
                style="
                  padding-top: 7pt;
                  padding-left: 74pt;
                  text-indent: 0pt;
                  text-align: left;
                "
              >
                Penguji 3
              </p>
            </td>
          </tr>
          <tr style="height: 32pt">
            <td style="width: 134pt">
              <p style="text-indent: 0pt; text-align: left"><br /></p>
              <p
                class="s2"
                style="
                  padding-left: 2pt;
                  padding-right: 16pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: center;
                  margin-top: 3rem;
                "
              >
                (……………………..….)
              </p>
            </td>
            <td style="width: 132pt">
              <p style="text-indent: 0pt; text-align: left"><br /></p>
              <p
                class="s2"
                style="
                  padding-left: 16pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: center;
                  margin-top: 3rem;
                "
              >
                (……………………..….)
              </p>
            </td>
            <td style="width: 157pt">
              <p style="text-indent: 0pt; text-align: left"><br /></p>
              <p
                class="s2"
                style="
                  padding-left: 39pt;
                  text-indent: 0pt;
                  line-height: 12pt;
                  text-align: left;
                  margin-top: 3rem;
                "
              >
                (……………………..….)
              </p>
            </td>
          </tr>
        </table>
        <p style="text-indent: 0pt; text-align: left"><br /></p>
        <p style="padding-left: 5pt; text-indent: 0pt; text-align: left">
          Petunjuk:
        </p>
        <ol id="l2">
          <li data-list-text="1.">
            <p style="padding-left: 41pt; text-indent: -18pt; text-align: left">
              Komponen Nilai Ujian Tugas Akhir dari para Penguji
            </p>
          </li>
          <li data-list-text="2.">
            <p
              style="
                padding-left: 41pt;
                text-indent: -18pt;
                line-height: 109%;
                text-align: left;
              "
            >
              Nilai ujian adalah penjumlahan dari (NU x Bobot) dari para Penguji,
              yang dibulatkan dengan ketentuan: &lt; 0.5 <br>dibulatkan menjadi 0 dan
              >= 0.5 dibulatkan menjadi 1.
            </p>
          </li>
          <li data-list-text="3.">
            <p
              style="
                padding-left: 41pt;
                text-indent: -18pt;
                line-height: 10pt;
                text-align: left;
              "
            >
              Nilai ujian dengan huruf mengikuti konversi berikut:
            </p>
          </li>
        </ol>
        <p style="padding-left: 41pt; text-indent: 0pt; text-align: left">
          85 – 100 = A; 70 – 84 = B; 60 – 69 = C; 40 – 59 = D; 0 – 39 = E
        </p>
    </div>
  </body>
</html>
