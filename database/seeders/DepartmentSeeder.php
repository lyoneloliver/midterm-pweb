<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::insert([
            ['name' => 'Informatika', 'code' => 'IF'],
            ['name' => 'Sistem Informasi', 'code' => 'SI'],
            ['name' => 'Teknik Komputer', 'code' => 'TK'],
        ]);
    }
}
