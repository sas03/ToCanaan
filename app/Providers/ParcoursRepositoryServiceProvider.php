<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\ParcoursRepository;

class ParcoursRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('ParcoursRepository', function ($app) {
          return new ParcoursRepository;
      });
    }
}
