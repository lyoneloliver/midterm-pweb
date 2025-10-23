<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::insert([
            ['code' => 'TW2-102', 'name' => 'Algorithm and Programming', 'sks' => 3, 'semester' => 1],
            ['code' => 'TW1-701', 'name' => 'Data Structure', 'sks' => 3, 'semester' => 2],
            ['code' => 'IF201', 'name' => 'Database System', 'sks' => 3, 'semester' => 3],
        ]);
    }
}
