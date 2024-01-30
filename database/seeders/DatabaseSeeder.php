<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\mspengguna;
use App\Models\msmahasiswa;
use App\Models\mstahunajaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\TrPendaftaranSidangTa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $penggunaData = [
            [
                'png_username' => 'Anisa Budiarti',
                'png_password' => Hash::make('anisa'),
                'png_role' => 'Koordinator TA',
            ],
            [
                'png_username' => 'Raden Rara Kartika',
                'png_password' => Hash::make('rara'),
                'png_role' => 'Pembimbing',
            ],
            [
                'png_username' => 'Sisia Dika Ariyanto',
                'png_password' => Hash::make('sisia'),
                'png_role' => 'Penguji',
            ],
            [
                'png_username' => 'DAAA',
                'png_password' => Hash::make('daaa'),
                'png_role' => 'Penguji',
            ],
            [
                'png_username' => 'Steve Kurniawan',
                'png_password' => Hash::make('steve'),
                'png_role' => 'Kepala Prodi',
            ],
            [
                'png_username' => 'Mohammad Winarso',
                'png_password' => Hash::make('winarso'),
                'png_role' => 'Pembimbing',
            ],
            [
                'png_username' => 'Yohanes B. Cahyo',
                'png_password' => Hash::make('yohanes'),
                'png_role' => 'Penguji',
            ],
            // Add more data if needed
        ];
    
        // Insert data into database
        foreach ($penggunaData as $data) {
            mspengguna::create($data);
        }
    }
    // public function run()
    // {
    //     // Define sample data for mahasiswa
    //     // $mahasiswaData = [
    //     //     [
    //     //         'mhs_username' => 'mahasiswa1',
    //     //         'mhs_password' => Hash::make('password1'), // Use Hash facade to securely hash passwords
    //     //         'mhs_nama' => 'Mahasiswa 1',
    //     //     ],
    //     //     [
    //     //         'mhs_username' => 'mahasiswa2',
    //     //         'mhs_password' => Hash::make('password2'),
    //     //         'mhs_nama' => 'Mahasiswa 2',
    //     //     ],
    //     //     [
    //     //         'mhs_username' => 'mahasiswa3',
    //     //         'mhs_password' => Hash::make('password3'),
    //     //         'mhs_nama' => 'Mahasiswa 3',
    //     //     ],
    //     //     [
    //     //         'mhs_username' => 'mahasiswa4',
    //     //         'mhs_password' => Hash::make('password4'),
    //     //         'mhs_nama' => 'Mahasiswa 4',
    //     //     ],
    //     //     [
    //     //         'mhs_username' => 'mahasiswa5',
    //     //         'mhs_password' => Hash::make('password5'),
    //     //         'mhs_nama' => 'Mahasiswa 5',
    //     //     ],
    //     //     [
    //     //         'mhs_username' => 'mahasiswa6',
    //     //         'mhs_password' => Hash::make('password6'),
    //     //         'mhs_nama' => 'Mahasiswa 6',
    //     //     ],
    //     //     [
    //     //         'mhs_username' => 'mahasiswa7',
    //     //         'mhs_password' => Hash::make('password7'),
    //     //         'mhs_nama' => 'Mahasiswa 7',
    //     //     ],
    //     //     [
    //     //         'mhs_username' => 'mahasiswa8',
    //     //         'mhs_password' => Hash::make('password8'),
    //     //         'mhs_nama' => 'Mahasiswa 8',
    //     //     ],
    //     //     [
    //     //         'mhs_username' => 'mahasiswa9',
    //     //         'mhs_password' => Hash::make('password9'),
    //     //         'mhs_nama' => 'Mahasiswa 9',
    //     //     ],
    //     //     [
    //     //         'mhs_username' => 'mahasiswa10',
    //     //         'mhs_password' => Hash::make('password10'),
    //     //         'mhs_nama' => 'Mahasiswa 10',
    //     //     ],
    //     //     // Add more sample data as needed
    //     // ];

    //     // // Loop through the data and create mahasiswa records
    //     // foreach ($mahasiswaData as $data) {
    //     //     msmahasiswa::create($data);
    //     // }
    //     $tahunajaranData = [
    //         [
    //             'thn_id' => 'TA2023',
    //             'thn_tahunajaran' => '2023/2024',
    //             'thn_status' => 'Aktif',
    //         ],
    //         [
    //             'thn_id' => 'TA2024',
    //             'thn_tahunajaran' => '2024/2025',
    //             'thn_status' => 'Aktif',
    //         ],
    //         // Add more data if needed
    //     ];

    //     // Insert data into database
    //     foreach ($tahunajaranData as $data) {
    //         mstahunajaran::create($data);
    //     }
    // }
}
