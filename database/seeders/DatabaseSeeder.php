<?php

namespace Database\Seeders;

use App\Models\DataPenyakit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => '1',
            'password' => Hash::make('rahasia123'),
        ]);
        User::create([
            'name' => 'Budi Setiaji',
            'email' => 'user@user.com',
            'role' => '2',
            'password' => Hash::make('rahasia123'),
        ]);
        DataPenyakit::create([
            'nama_penyakit' => 'nama penyakit',
            'gejala1' => 'gejala 1',
            'gejala2' => 'gejala 2',
            'gejala3' => 'gejala 3',
            'gejala4' => 'gejala 4',
            'saran_dokter' => 'saran dokter',
        ]);
    }
}
