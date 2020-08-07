<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ExternalPostInterface;
use App\Services\API\SquarePost;

class ExternalApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(ExternalPostInterface::class, SquarePost::class);
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
