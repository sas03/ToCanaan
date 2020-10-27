<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\SavoirFaireAddedRepository;

class SavoirFaireAddedRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('SavoirFaireAddedRepository', function ($app) {
          return new SavoirFaireAddedRepository;
      });
    }
}
