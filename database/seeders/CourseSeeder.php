<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::insert([
            ['code' => 'IF101', 'name' => 'Algoritma dan Pemrograman', 'sks' => 3, 'semester' => 1],
            ['code' => 'IF102', 'name' => 'Struktur Data', 'sks' => 3, 'semester' => 2],
            ['code' => 'IF201', 'name' => 'Basis Data', 'sks' => 3, 'semester' => 3],
        ]);
    }
}
