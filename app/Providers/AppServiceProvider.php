<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


 public function boot(): void
    {
        URL::forceScheme('https');
    }


    /*
    public function boot()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }*/
}

   


