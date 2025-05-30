<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\Facades\URL;
=======
>>>>>>> 58f0530 (Se agrega Panel)
use Illuminate\Support\ServiceProvider;

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
<<<<<<< HEAD
    public function boot()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
=======
    public function boot(): void
    {
        //
    }
}
>>>>>>> 58f0530 (Se agrega Panel)
