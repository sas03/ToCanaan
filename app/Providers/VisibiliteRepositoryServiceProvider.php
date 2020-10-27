<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\VisibiliteRepository;

class VisibiliteRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('VisibiliteRepository', function ($app) {
          return new VisibiliteRepository;
      });
    }
}
