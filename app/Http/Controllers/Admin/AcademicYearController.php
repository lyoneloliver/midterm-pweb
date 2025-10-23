<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::all();
        return view('admin.academic_years.index', compact('academicYears'));
    }

    public function store(Request $request)
    {
        $request->validate(['year' => 'required']);
        AcademicYear::create([
            'year' => $request->year,
            'is_active' => $request->has('is_active')
        ]);
        return back()->with('success', 'Academic year added.');
    }

    public function activate(AcademicYear $academicYear)
    {
        AcademicYear::query()->update(['is_active' => false]);
        $academicYear->update(['is_active' => true]);
        return back()->with('success', 'Academic year activated.');
    }
}
