<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fixing the String Length Issue
        Schema::defaultStringLength(191);

        // Generating a APi Token for Each User
        \App\User::creating(function($user) {
            $user->api_token = bin2hex(openssl_random_pseudo_bytes(30));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
