<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SemesterEnrollment;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $current = SemesterEnrollment::where('student_id', $student->id)->latest()->first();

        return view('dashboard.student', [
            'student' => $student,
            'semester' => $current,
        ]);
    }
}
