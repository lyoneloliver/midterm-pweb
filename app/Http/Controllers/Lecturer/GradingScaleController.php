<?php

namespace App\Http\Controllers\Lecturer;
use App\Http\Controllers\Controller;

use App\Models\GradingScale;
use Illuminate\Http\Request;

class GradingScaleController extends Controller
{
    public function index()
    {
        $grades = GradingScale::all();
        return view('lecturer.grades.index', compact('grades'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grade' => 'required',
            'min_score' => 'required|integer',
            'max_score' => 'required|integer',
            'grade_point' => 'required|numeric'
        ]);
        GradingScale::create($validated);
        return back()->with('success', 'Grade scale added.');
    }
}
