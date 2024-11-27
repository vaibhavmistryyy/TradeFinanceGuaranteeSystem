<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind the GuaranteeRepositoryInterface to GuaranteeRepository
        $this->app->bind(
            \App\Repositories\GuaranteeRepositoryInterface::class,
            \App\Repositories\GuaranteeRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
