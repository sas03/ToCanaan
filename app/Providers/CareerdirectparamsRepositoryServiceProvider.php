<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\CareerdirectparamsRepository;

class CareerdirectparamsRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('CareerdirectparamsRepository', function ($app) {
          return new CareerdirectparamsRepository;
      });
    }
}
