<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\MetiersRepository;

class MetiersRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('MetiersRepository', function ($app) {
            return new MetiersRepository;
        });
    }
}
