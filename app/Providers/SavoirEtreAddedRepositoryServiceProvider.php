<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\SavoirEtreAddedRepository;

class SavoirEtreAddedRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('SavoirEtreAddedRepository', function ($app) {
          return new SavoirEtreAddedRepository;
      });
    }
}
