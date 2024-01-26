<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\mspengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Create 10 sample data entries
        for ($i = 1; $i <= 10; $i++) {
            mspengguna::create([
                'png_username' => 'user' . $i, // You can adjust the username as needed
                'png_password' => Hash::make('password'), // You can adjust the default password as needed
                'png_role' => mspengguna::getValidRoles()[array_rand(mspengguna::getValidRoles())], // Randomly select a role
            ]);
        }
    }
}
