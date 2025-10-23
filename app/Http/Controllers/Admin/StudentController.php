<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index() { return view('admin.students.index', ['students'=>Student::with('user')->get()]); }

    public function destroy(Student $student)
    {
        $student->user->delete();
        return back()->with('success','Student deleted.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nrp' => 'required|unique:students,nrp'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student'
        ]);

        Student::create([
            'user_id' => $user->id,
            'NRP' => $validated['nrp']
        ]);

        return back()->with('success','Student added.');
    }

}
