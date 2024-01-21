<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UrlTransformer;

class UrlTransformerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UrlTransformer::class, function ($app) {
            return new UrlTransformer();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
