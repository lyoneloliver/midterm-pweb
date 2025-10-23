<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() { return view('admin.departments.index', ['departments' => Department::all()]); }

    public function destroy(Department $department)
    {
        $department->delete();
        return back()->with('success', 'Department deleted.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:departments,code'
        ]);

        Department::create($request->only('name', 'code'));
        return back()->with('success', 'Department created.');
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:departments,code,' . $department->id
        ]);

        $department->update($request->only('name','code'));
        return back()->with('success', 'Department updated.');
    }
}
