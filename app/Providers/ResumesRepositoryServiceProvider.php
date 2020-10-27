<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\ResumesRepository;

class ResumesRepositoryServiceProvider extends ServiceProvider
{
  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind('ResumesRepository', function ($app) {
        return new ResumesRepository;
    });
  }
}
