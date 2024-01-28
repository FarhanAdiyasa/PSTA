<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrPendaftaranSidangTa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrPendaftaranSidangTaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        TrPendaftaranSidangTa::create([
            'pdft_id' => 'PDF001',
            'pdft_bapsuratketerangan' => 'YourBapSuratKeteranganValue',
            'pdft_bapprasidang' => 'YourBapPrasidangValue',
            'pdft_bapbimbingan' => 'YourBapBimbinganValue',
            'pdft_baplembarpersetujuan' => 'YourBapLembarPersetujuanValue',
            'pdft_statusverifikasidokumen' => 'YourStatusVeri',
            'pdft_perusahaan' => 'YourPerusahaanValue',
            'pdft_tanggalmulai' => '2022-01-01', // Contoh tanggal, sesuaikan format sesuai kebutuhan
            'pdft_judultugasakhir' => 'YourJudulTugasAkhirValue',
            'pdft_tanggaldibuat' => now(),
            'pdft_hrd' => 'YourHrdValue',
            'pdft_tanggalsidang' => '2022-02-01 12:00:00', // Contoh tanggal dan waktu sidang, sesuaikan format sesuai kebutuhan
            'pdft_jenissidang' => 'YourJenis',
            'pdft_tempatsidang1' => 'YourTempat',
            'pdft_tempatsidang2' => 'YourTempat',
            'pdft_waktu' => 'YourWaktuValue',
            'pdft_link' => 'YourLinkValue',
            'pdft_statusverifikasidata' => 'YourStatus',
            'pdft_totalnilai' => 85, // Contoh nilai, sesuaikan dengan kebutuhan
            'pdft_catatan' => 'YourCatatanValue',
            'pdf_statuskelulusan' => 'YourStatu',
            'mhs_username' => 'mahasiswa1',
            'thn_id' => 'THN001',
            'pdft_penguji1' => 'YourPengu',
            'pdft_penguji2' => 'YourPengu',
            'pdft_penguji3' => 'YourPengu',
            'pdft_pembimbing1' => 'YourPemb',
            'pdft_pembimbing2' => 'YourPemb',
        ]);
    }
}
