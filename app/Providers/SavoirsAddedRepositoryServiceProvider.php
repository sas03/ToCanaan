<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\SavoirsAddedRepository;

class SavoirsAddedRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SavoirsAddedRepository', function ($app) {
            return new SavoirsAddedRepository;
        });
    }
}
