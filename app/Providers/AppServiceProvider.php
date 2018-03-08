<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//      	$this->app->singleton(Permissao::class);
//     	$this->app->singleton('App\Http\Controllers\PermissaoController', function ($app) {
//     		return new App\Http\Controllers\PermissaoController($app->make('ObjPermissao'));
//     	});
    }
}
