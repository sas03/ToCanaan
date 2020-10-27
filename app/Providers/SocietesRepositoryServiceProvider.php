<?php

namespace App\Providers;

use App\Http\Repositories\SocietesRepository;
use Illuminate\Support\ServiceProvider;

class SocietesRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('SocietesRepository', function ($app) {
          return new SocietesRepository;
      });
    }
}
