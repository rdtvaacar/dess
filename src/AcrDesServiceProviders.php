<?php

namespace Acr\Des;

use Acr\Des\Controllers\AcrDesController;
use Illuminate\Support\ServiceProvider;

class AcrDesServiceProviders extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/Views', 'acr_des_v');
    }

    public function register()
    {
        $this->app->bind('acr-dess', function () {
            return new AcrDesController();
        });
    }
}