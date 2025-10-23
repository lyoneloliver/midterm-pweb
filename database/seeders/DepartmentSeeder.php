<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::insert([
            ['name' => 'Informatics', 'code' => 'IF'],
            ['name' => 'Information System', 'code' => 'IS'],
            ['name' => 'Computer Engineer', 'code' => 'IT'],
        ]);
    }
}
