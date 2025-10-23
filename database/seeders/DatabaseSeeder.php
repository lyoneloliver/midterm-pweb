<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DepartmentSeeder::class,
            LecturerSeeder::class,
            StudentSeeder::class,
            AcademicYearSeeder::class,
            CourseSeeder::class,
            ClassSectionSeeder::class,
            GradingScaleSeeder::class,
        ]);
    }
}
