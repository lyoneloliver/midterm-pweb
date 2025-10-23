<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecturer;
use App\Models\User;

class LecturerSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'lecturer')->first();

        Lecturer::create([
            'user_id' => $user->id,
            'department_id' => 1,
            'nip' => '198706012024011001',
            'position' => 'Dosen Tetap',
        ]);
    }
}
