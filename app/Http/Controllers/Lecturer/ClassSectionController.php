<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\ClassSection;
use App\Models\Course;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSectionController extends Controller
{
    public function index()
    {
        $lecturer = Auth::user()->lecturer;
        $classSections = ClassSection::with('course', 'academicYear')
            ->where('lecturer_id', $lecturer->id)
            ->get();

        return view('lecturer.class_sections.index', compact('classSections'));
    }

    public function create()
    {
        return view('lecturer.class_sections.create', [
            'courses' => Course::all(),
            'academicYears' => AcademicYear::all()
        ]);
    }

    public function store(Request $request)
    {
        $lecturer = Auth::user()->lecturer;

        $validated = $request->validate([
            'academic_year_id' => 'required|exists:academic_years,id',
            'course_id' => 'required|exists:courses,id',
            'section_code' => 'required',
            'capacity' => 'required|integer|min:1'
        ]);

        $validated['lecturer_id'] = $lecturer->id;

        ClassSection::create($validated);
        return redirect()->route('lecturer.class-sections.index')->with('success', 'Class section created.');
    }

    public function show(ClassSection $classSection)
    {
        return view('lecturer.class_sections.show', compact('classSection'));
    }
}