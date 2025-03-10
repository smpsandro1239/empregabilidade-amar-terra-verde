<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot()
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        Route::middleware('auth')
            ->group(function () {
                Route::get('/dashboard', function () {
                    switch (auth()->user()->role) {
                        case 'student':
                            return redirect()->route('students.dashboard');
                        case 'company':
                            return redirect()->route('companies.dashboard');
                        case 'admin':
                            return redirect()->route('admin.dashboard');
                        default:
                            return redirect('/login');
                    }
                })->name('dashboard');
            });
    }
}
