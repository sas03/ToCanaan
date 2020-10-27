<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\KeywordsRepository;

class KeywordsRepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('KeywordsRepository', function ($app) {
            return new KeywordsRepository;
        });
    }
}
