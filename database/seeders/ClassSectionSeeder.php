<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassSection;

class ClassSectionSeeder extends Seeder
{
    public function run(): void
    {
        ClassSection::insert([
            [
                'academic_year_id' => 1,
                'section_code' => 'A',
                'course_id' => 1,
                'lecturer_id' => 1,
                'capacity' => 40,
            ],
            [
                'academic_year_id' => 1,
                'section_code' => 'B',
                'course_id' => 2,
                'lecturer_id' => 1,
                'capacity' => 35,
            ],
        ]);
    }
}
