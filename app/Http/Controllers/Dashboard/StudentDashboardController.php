<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\SemesterEnrollment;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $currentSemester = SemesterEnrollment::where('student_id', $student->id)->latest()->first();

        $enrollmentCount = $currentSemester
            ? Enrollment::where('student_id', $student->id)
                ->where('academic_year_id', $currentSemester->academic_year_id)
                ->count()
            : 0;

        return view('dashboard.student', [
            'student' => $student,
            'semester' => $currentSemester,
            'enrollment_count' => $enrollmentCount,
        ]);
    }
}
