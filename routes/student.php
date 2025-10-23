<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\StudentDashboardController;
use App\Http\Controllers\Student\EnrollmentController;
use App\Http\Controllers\Student\SemesterEnrollmentController;
use App\Http\Controllers\Student\ScheduleController;
use App\Http\Controllers\Shared\NotificationController;

Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');

    // FRS / KRS Management
    Route::resource('/enrollments', EnrollmentController::class);
    Route::resource('/semester-enrollments', SemesterEnrollmentController::class);
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});
