<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\FormationsRepository;

class FormationsRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('FormationsRepository', function ($app) {
            return new FormationsRepository;
        });
    }
}
