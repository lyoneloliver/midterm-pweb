<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
        ]);

        // 🔹 Generate NRP otomatis berdasarkan pola
        // misal: 2025 + random 5 digit
        $year = now()->format('Y');
        $random = str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $nrp = $year . $random;

        // 🔹 Simpan ke tabel students
        Student::create([
            'user_id' => $user->id,
            'NRP' => $nrp,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

}
