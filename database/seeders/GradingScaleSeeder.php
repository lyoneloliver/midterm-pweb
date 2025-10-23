<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradingScale;

class GradingScaleSeeder extends Seeder
{
    public function run(): void
    {
        GradingScale::insert([
            ['grade' => 'A', 'min_score' => 85, 'max_score' => 100, 'grade_point' => 4.00],
            ['grade' => 'B', 'min_score' => 70, 'max_score' => 84, 'grade_point' => 3.00],
            ['grade' => 'C', 'min_score' => 55, 'max_score' => 69, 'grade_point' => 2.00],
            ['grade' => 'D', 'min_score' => 40, 'max_score' => 54, 'grade_point' => 1.00],
            ['grade' => 'E', 'min_score' => 0, 'max_score' => 39, 'grade_point' => 0.00],
        ]);
    }
}
