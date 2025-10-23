<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display student's schedule for the current semester.
     */
    public function index(Request $request)
    {
        $student = Auth::user()->student;

        // Filter semester aktif (opsional)
        $semester = $request->get('semester', now()->format('Y') . ' - Ganjil');

        // Ambil semua enrollment milik student saat semester aktif
        $enrollments = Enrollment::with(['classSection.course', 'classSection.lecturer'])
            ->where('student_id', $student->id)
            ->whereHas('classSection.course', function ($query) use ($semester) {
                $query->where('semester', $semester);
            })
            ->get();

        // Format data jadwal untuk ditampilkan
        $schedule = $enrollments->map(function ($enrollment) {
            $class = $enrollment->classSection;
            $course = $class->course;
            $lecturer = $class->lecturer;

            return [
                'course_code' => $course->code,
                'course_name' => $course->name,
                'class_name' => $class->name,
                'day' => $class->day,
                'start_time' => $class->start_time,
                'end_time' => $class->end_time,
                'lecturer' => $lecturer->name,
                'room' => $class->room,
            ];
        });

        return view('student.schedule.index', [
            'student' => $student,
            'semester' => $semester,
            'schedule' => $schedule,
        ]);
    }
}
