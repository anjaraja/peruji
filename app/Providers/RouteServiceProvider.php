<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(): void
    {
        // This loads the `api.php` routes file manually
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
        
        // You can also register other route files here
        // Example for web.php
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }

    /**
     * Register the application's route middleware.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}
