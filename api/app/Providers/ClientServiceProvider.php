<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ClientService;

class ClientServiceProvider extends ServiceProvider
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
        $this->app->singleton(ClientService::class, function ($app) {
            return new ClientService();
        });
    }
}
