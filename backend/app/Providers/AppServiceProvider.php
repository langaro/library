<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        Password::defaults(function ()
        {

            if (!$this->app->isProduction())
            {
                return Password::min(3);
            }

            return Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols();
        });
    }
}
