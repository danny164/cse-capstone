<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use auth;



class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role_id === 1;
        });

        Blade::if('mentor', function () {
            return auth()->check() && auth()->user()->role_id === 2;
        });

        Blade::if('user', function () {
            return auth()->check() && auth()->user()->role_id === 3;
        });

        Blade::if('admin_mentor', function () {
            return auth()->check() && (auth()->user()->role_id === 1 || auth()->user()->role_id === 2) ;
        });
    }
}
