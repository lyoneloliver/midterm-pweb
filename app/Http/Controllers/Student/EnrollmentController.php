<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\ClassSection;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;
        $academicYear = AcademicYear::where('is_active', true)->first();

        $enrollments = Enrollment::with('classSection.course')
            ->where('student_id', $student->id)
            ->where('academic_year_id', $academicYear->id)
            ->get();

        $availableClasses = ClassSection::with('course')
            ->where('academic_year_id', $academicYear->id)
            ->get();

        return view('student.enrollments.index', compact('enrollments', 'availableClasses', 'academicYear'));
    }

    public function store(Request $request)
    {
        $student = Auth::user()->student;
        $academicYear = AcademicYear::where('is_active', true)->first();

        if (!$academicYear) {
            return back()->with('error', 'No active academic year.');
        }

        $validated = $request->validate([
            'class_section_id' => 'required|exists:class_sections,id',
        ]);

        Enrollment::create([
            'student_id' => $student->id,
            'class_section_id' => $validated['class_section_id'],
            'academic_year_id' => $academicYear->id,
        ]);

        return back()->with('success', 'Class successfully enrolled.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $this->authorize('delete', $enrollment);
        $enrollment->delete();
        return back()->with('success', 'Enrollment removed.');
    }

    
}
