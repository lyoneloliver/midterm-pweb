<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassSection;
use App\Models\Enrollment;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * List all class sections for the lecturer
     */
    public function index()
    {
        $lecturer = Auth::user()->lecturer;

        $classSections = ClassSection::with('course', 'academicYear')
            ->where('lecturer_id', $lecturer->id)
            ->get();

        return view('lecturer.attendance.index', compact('classSections'));
    }

    /**
     * Show attendance form for a specific class section
     */
    public function show(ClassSection $classSection)
    {
        $lecturer = Auth::user()->lecturer;

        // Pastikan lecturer memiliki akses ke class section ini
        // if ($classSection->lecturer_id != $lecturer->id) {
        //     abort(403, 'Unauthorized');
        // }

        // Ambil semua mahasiswa yang terdaftar di class section ini
        $enrollments = Enrollment::with('student.user')
            ->where('class_section_id', $classSection->id)
            ->get();

        // Ambil data attendance untuk tanggal hari ini
        $today = now()->toDateString();

        $enrollmentIds = $enrollments->pluck('id');
        $attendances = Attendance::whereIn('enrollment_id', $enrollmentIds)
            ->whereDate('date', $today)
            ->pluck('status', 'enrollment_id'); // [enrollment_id => status]

        return view('lecturer.attendance.show', compact('classSection', 'enrollments', 'attendances', 'today'));
    }

    /**
     * Store or update attendance for a class section
     */
    public function store(Request $request, ClassSection $classSection)
    {
        $lecturer = Auth::user()->lecturer;

        if ($classSection->lecturer_id != $lecturer->id) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'attendance' => 'required|array',
            'attendance.*' => 'in:present,absent,late',
        ]);

        $today = now()->toDateString();

        foreach ($validated['attendance'] as $enrollmentId => $status) {
            Attendance::updateOrCreate(
                [
                    'enrollment_id' => $enrollmentId,
                    'date' => $today
                ],
                [
                    'status' => $status
                ]
            );
        }

        return back()->with('success', 'Attendance has been updated.');
    }
}
