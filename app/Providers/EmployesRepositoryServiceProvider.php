<?php

namespace App\Providers;

use App\Http\Repositories\EmployesRepository;
use Illuminate\Support\ServiceProvider;

class EmployesRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('EmployesRepository', function ($app) {
          return new EmployesRepository;
      });
    }
}
