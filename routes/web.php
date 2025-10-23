<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\LecturerDashboardController;
use App\Http\Controllers\Dashboard\StudentDashboardController;

// Route::get('/', function () {
//     return view('login'); // optional: halaman landing
// });

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// ==== AUTH ROUTES ====
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

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

use App\Http\Controllers\Lecturer\ClassSectionController;
use App\Http\Controllers\Lecturer\AttendanceController;
use App\Http\Controllers\Lecturer\GradingScaleController;
use App\Http\Controllers\Lecturer\GradeController;

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


use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\SystemSettingController;


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

    // Settings
    Route::get('/settings', [SystemSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SystemSettingController::class, 'update'])->name('settings.update');

    // Shared Features
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});

// Rute untuk Academic Year Activation
//Route::post('/admin/academic-years/{academicYear}/activate', [AcademicYearController::class, 'activate'])->name('admin.academic-years.activate');


