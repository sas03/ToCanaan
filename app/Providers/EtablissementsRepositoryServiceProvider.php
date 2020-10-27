<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\EtablissementsRepository;

class EtablissementsRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('EtablissementsRepository', function ($app) {
            return new EtablissementsRepository;
        });
    }
}
