<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // condition 1
        /* if (env('APP_ENV') === 'production') {
            URL::forceSchema('https');
        }

        // condition 2
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('http');
        }

        // condition 3
        if (env('APP_FORCE_HTTPS', false)) {
            URL::forceScheme('https');
        } */
            }
}
