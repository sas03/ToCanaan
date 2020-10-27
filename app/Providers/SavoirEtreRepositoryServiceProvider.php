<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\SavoirEtreRepository;

class SavoirEtreRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('SavoirEtreRepository', function ($app) {
            return new SavoirEtreRepository;
        });
    }
}
