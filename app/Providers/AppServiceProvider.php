<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Validator::extend('money', function($attribute, $value, $parameters) {
			return preg_match("/^(?:[1-9](?:[\d]{0,2}(?:\.[\d]{3})*|[\d]+)|0)(?:,[\d]{0,2})?$/", $value);
		});
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
