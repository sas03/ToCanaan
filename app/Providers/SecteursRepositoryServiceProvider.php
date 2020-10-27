<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\SecteursRepository;

class SecteursRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SecteursRepository', function ($app) {
            return new SecteursRepository;
        });
    }
}
