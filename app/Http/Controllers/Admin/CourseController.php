<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.courses.index', [
            'courses' => Course::with('department')->get(),
            'departments' => Department::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:courses',
            'name' => 'required',
            'sks' => 'required|integer',
            'department_id' => 'required|exists:departments,id'
        ]);

        Course::create($request->only('code', 'name', 'sks', 'semester', 'description', 'department_id'));

        return back()->with('success', 'Course added.');
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'code' => 'required|unique:courses,code,' . $course->id,
            'name' => 'required',
            'sks' => 'required|integer|min:1',
            'department_id' => 'required|exists:departments,id'
        ]);

        $course->update($request->only('code','name','sks','department_id'));

        return back()->with('success', 'Course updated.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('success', 'Course deleted.');
    }
}
