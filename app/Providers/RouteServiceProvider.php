<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Path default setelah login
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        parent::boot();

        $this->routes(function () {
            // Web umum
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // API
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Admin
            Route::middleware(['web', 'auth', 'role:admin'])
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

            // Lecturer
            Route::middleware(['web', 'auth', 'role:lecturer'])
                ->prefix('lecturer')
                ->group(base_path('routes/lecturer.php'));

            // Student
            Route::middleware(['web', 'auth', 'role:student'])
                ->prefix('student')
                ->group(base_path('routes/student.php'));
        });
    }
}
