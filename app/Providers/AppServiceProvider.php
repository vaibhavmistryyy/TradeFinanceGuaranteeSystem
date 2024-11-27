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
        // Binding the GuaranteeRepositoryInterface to the GuaranteeRepository implementation
        $this->app->bind(
            \App\Repositories\GuaranteeRepositoryInterface::class,
            \App\Repositories\GuaranteeRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
