<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\AppellationsRepository;

class AppellationsRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('AppellationsRepository', function ($app) {
          return new AppellationsRepository;
      });
    }
}
