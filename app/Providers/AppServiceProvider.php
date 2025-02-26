<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Services\SecondLargestService::class);  // added for algorithm challenge
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
