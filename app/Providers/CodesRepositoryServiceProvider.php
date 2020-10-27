<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\CodesRepository;

class CodesRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('CodesRepository', function ($app) {
          return new CodesRepository;
      });
    }
}
