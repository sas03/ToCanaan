<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\MotivationsRepository;

class MotivationsRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('MotivationsRepository', function ($app) {
            return new MotivationsRepository;
        });
    }
}
