<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'student')->first();

        Student::create([
            'user_id' => $user->id,
            'department_id' => 1,
            'NRP' => '50272310',
            'semester' => 3,
            'gpa' => 3.45,
            'year_of_entry' => 2023,
        ]);
    }
}
