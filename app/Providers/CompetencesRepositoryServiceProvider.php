<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\CompetencesRepository;

class CompetencesRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('CompetencesRepository', function ($app) {
          return new CompetencesRepository;
      });
    }
}
