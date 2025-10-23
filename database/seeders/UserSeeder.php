<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@frs.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Dosen Satu',
            'email' => 'lecturer@frs.test',
            'password' => Hash::make('password'),
            'role' => 'lecturer',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Mahasiswa Satu',
            'email' => 'student@frs.test',
            'password' => Hash::make('password'),
            'role' => 'student',
            'is_active' => true,
        ]);
    }
}
