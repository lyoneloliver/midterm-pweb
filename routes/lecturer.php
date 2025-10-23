<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\LecturerDashboardController;
use App\Http\Controllers\Lecturer\ClassSectionController;
use App\Http\Controllers\Lecturer\AttendanceController;
use App\Http\Controllers\Lecturer\GradingScaleController;
use App\Http\Controllers\Shared\NotificationController;

Route::middleware(['auth', 'role:lecturer'])->prefix('lecturer')->name('lecturer.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [LecturerDashboardController::class, 'index'])->name('dashboard');

    // Class Management
    Route::resource('/class-sections', ClassSectionController::class);
    Route::resource('/attendance', AttendanceController::class);
    Route::resource('/grades', GradingScaleController::class);

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});
