<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\ServicesRepository;

class ServicesRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ServicesRepository', function ($app) {
            return new ServicesRepository;
        });
    }
}
