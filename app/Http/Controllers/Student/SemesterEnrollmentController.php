<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\SemesterEnrollment;
use App\Models\AcademicYear;
use Illuminate\Support\Facades\Auth;

class SemesterEnrollmentController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $semesters = SemesterEnrollment::with('academicYear')
            ->where('student_id', $student->id)
            ->get();

        return view('student.semesters.index', compact('semesters'));
    }

    public function show(SemesterEnrollment $semesterEnrollment)
    {
        $this->authorize('view', $semesterEnrollment);

        return view('student.semesters.show', compact('semesterEnrollment'));
    }
}
