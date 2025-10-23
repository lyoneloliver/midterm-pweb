<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClassSection;
use Illuminate\Support\Facades\Auth;

class LecturerDashboardController extends Controller
{
    public function index()
    {
        $lecturer = Auth::user()->lecturer;
        return view('dashboard.lecturer', [
            'class_count' => ClassSection::where('lecturer_id', $lecturer->id)->count(),
        ]);
    }
}
