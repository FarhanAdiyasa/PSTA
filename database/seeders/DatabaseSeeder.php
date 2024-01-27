<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\msmahasiswa;
use App\Models\mspengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run()
    // {
    //     // Create 10 sample data entries
    //     for ($i = 1; $i <= 10; $i++) {
    //         mspengguna::create([
    //             'png_username' => 'user' . $i, // You can adjust the username as needed
    //             'png_password' => Hash::make('password'), // You can adjust the default password as needed
    //             'png_role' => mspengguna::getValidRoles()[array_rand(mspengguna::getValidRoles())], // Randomly select a role
    //         ]);
            
    //     }
    // }
    public function run()
    {
        // Define sample data for mahasiswa
        $mahasiswaData = [
            [
                'mhs_username' => 'mahasiswa1',
                'mhs_password' => Hash::make('password1'), // Use Hash facade to securely hash passwords
                'mhs_nama' => 'Mahasiswa 1',
            ],
            [
                'mhs_username' => 'mahasiswa2',
                'mhs_password' => Hash::make('password2'),
                'mhs_nama' => 'Mahasiswa 2',
            ],
            [
                'mhs_username' => 'mahasiswa3',
                'mhs_password' => Hash::make('password3'),
                'mhs_nama' => 'Mahasiswa 3',
            ],
            [
                'mhs_username' => 'mahasiswa4',
                'mhs_password' => Hash::make('password4'),
                'mhs_nama' => 'Mahasiswa 4',
            ],
            [
                'mhs_username' => 'mahasiswa5',
                'mhs_password' => Hash::make('password5'),
                'mhs_nama' => 'Mahasiswa 5',
            ],
            [
                'mhs_username' => 'mahasiswa6',
                'mhs_password' => Hash::make('password6'),
                'mhs_nama' => 'Mahasiswa 6',
            ],
            [
                'mhs_username' => 'mahasiswa7',
                'mhs_password' => Hash::make('password7'),
                'mhs_nama' => 'Mahasiswa 7',
            ],
            [
                'mhs_username' => 'mahasiswa8',
                'mhs_password' => Hash::make('password8'),
                'mhs_nama' => 'Mahasiswa 8',
            ],
            [
                'mhs_username' => 'mahasiswa9',
                'mhs_password' => Hash::make('password9'),
                'mhs_nama' => 'Mahasiswa 9',
            ],
            [
                'mhs_username' => 'mahasiswa10',
                'mhs_password' => Hash::make('password10'),
                'mhs_nama' => 'Mahasiswa 10',
            ],
            // Add more sample data as needed
        ];

        // Loop through the data and create mahasiswa records
        foreach ($mahasiswaData as $data) {
            msmahasiswa::create($data);
        }
    }
}
