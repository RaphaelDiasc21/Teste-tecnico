<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PlanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Services\PlanService::class,function($app){
            return new \App\Services\PlanService();
        });
    }
}
