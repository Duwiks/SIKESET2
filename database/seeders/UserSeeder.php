<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin',
            'jurusan' => 'Sistem Informasi',
            'telepon' => '08129876543',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'jenis' => 'admin'
        ]);
    }
}