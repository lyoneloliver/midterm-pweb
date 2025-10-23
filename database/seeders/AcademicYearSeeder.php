<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcademicYear;

class AcademicYearSeeder extends Seeder
{
    public function run(): void
    {
        AcademicYear::insert([
            ['year' => '2024/2025', 'is_active' => true],
            ['year' => '2023/2024', 'is_active' => false],
        ]);
    }
}
