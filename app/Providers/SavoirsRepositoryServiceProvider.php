<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\SavoirsRepository;

class SavoirsRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('SavoirsRepository', function ($app) {
            return new SavoirsRepository;
        });
    }
}
