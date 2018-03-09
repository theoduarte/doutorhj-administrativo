<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PermissaoComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    	view()->composer('layouts.master', 'App\Http\ViewComposer\PermissaoComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
