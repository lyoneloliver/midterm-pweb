<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassSection;
use App\Models\Enrollment;
use App\Models\GradingScale;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    /**
     * Show list of students in a class section for grading.
     */
    public function show(ClassSection $classSection)
    {
        $lecturer = Auth::user()->lecturer;

        // Pastikan lecturer hanya bisa mengakses class section yang diaampu
        if ($classSection->lecturer_id !== $lecturer->id) {
            abort(403);
        }

        $enrollments = $classSection->enrollments()->with('student.user')->get();
        $gradingScales = GradingScale::all();

        return view('lecturer.grades.show', compact('classSection', 'enrollments', 'gradingScales'));
    }

    /**
     * Update grades for students.
     */
    public function update(Request $request, ClassSection $classSection)
    {
        $lecturer = Auth::user()->lecturer;

        if ($classSection->lecturer_id !== $lecturer->id) {
            abort(403);
        }

        $request->validate([
            'grades' => 'required|array'
        ]);

        foreach ($request->grades as $enrollmentId => $grade) {
            $enrollment = Enrollment::find($enrollmentId);
            if ($enrollment && $enrollment->class_section_id == $classSection->id) {
                $gradePoint = GradingScale::where('grade', $grade)->first()->grade_point ?? null;
                $enrollment->update([
                    'grade' => $grade,
                    'grade_point' => $gradePoint,
                ]);
            }
        }

        return back()->with('success', 'Grades updated successfully.');
    }
}
