<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\SavoirFaireRepository;

class SavoirFaireRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('SavoirFaireRepository', function ($app) {
            return new SavoirFaireRepository;
        });
    }
}
