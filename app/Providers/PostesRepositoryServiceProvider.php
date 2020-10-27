<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\PostesRepository;

class PostesRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('PostesRepository', function ($app) {
          return new PostesRepository;
      });
    }
}
