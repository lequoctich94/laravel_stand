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
        $this->app->bind(
            'App\Contracts\Repositories\CsvRepositoryInterface',
            'App\Repositories\CsvRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\UserRepositoryInterface',
            'App\Repositories\UserReponsitory'
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
