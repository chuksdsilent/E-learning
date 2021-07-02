<?php

namespace App\Providers;

use App\GetRandomID;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class GenerateRandomId extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GetRandomID::class, function($app){
            return new GetRandomID(Str::random(50));
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
