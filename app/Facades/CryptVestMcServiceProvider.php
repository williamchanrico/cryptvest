<?php

namespace App\Facades;

use Illuminate\Support\ServiceProvider;

class CryptVestMcServiceProvider extends ServiceProvider
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
        $this->app->bind('CryptVestMc', function () {
            return new CryptVestMcContainer();
        });
    }
}
