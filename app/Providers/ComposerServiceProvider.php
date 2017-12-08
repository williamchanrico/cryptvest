<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {

        View::composer([
                '*'
            ],
            'App\Http\ViewComposers\ThemeComposer'
        );

        View::composer([
                '*'
            ],
            'App\Http\ViewComposers\UsersComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}