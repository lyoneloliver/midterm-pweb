<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\SystemSettingController;
use App\Http\Controllers\Shared\NotificationController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Management Routes
    Route::resource('/users', UserController::class);
    Route::resource('/departments', DepartmentController::class);
    Route::resource('/courses', CourseController::class);
    Route::resource('/lecturers', LecturerController::class);
    Route::resource('/students', StudentController::class);
    Route::resource('/academic-years', AcademicYearController::class);
    Route::resource('/settings', SystemSettingController::class)->only(['index', 'update']);
    Route::patch('/academic-years/{academicYear}/activate', [AcademicYearController::class, 'activate'])
    ->name('academic-years.activate');


    // Shared Features
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});
