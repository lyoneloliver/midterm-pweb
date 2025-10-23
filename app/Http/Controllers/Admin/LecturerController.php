<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function index() { return view('admin.lecturers.index', ['lecturers'=>Lecturer::with('user')->get()]); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'nip' => 'required|unique:lecturers,nip'
        ]);

        // Buat user
        $user = User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'role'=>'lecturer'
        ]);

        // Buat lecturer
        Lecturer::create([
            'user_id'=>$user->id,
            'nip'=>$validated['nip']
        ]);

        return back()->with('success','Lecturer added.');
    }


    public function destroy(Lecturer $lecturer)
    {
        $lecturer->user->delete();
        return back()->with('success','Lecturer deleted.');
    }
}
