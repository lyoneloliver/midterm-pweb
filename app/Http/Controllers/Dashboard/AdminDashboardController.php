<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Course;
use App\Models\Department;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin', [
            'student_count' => Student::count(),
            'lecturer_count' => Lecturer::count(),
            'course_count' => Course::count(),
            'department_count' => Department::count(),
        ]);
    }
}
