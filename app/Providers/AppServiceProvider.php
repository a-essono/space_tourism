<?php

namespace App\Providers;

use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;
use App\Support\AppHelpers;

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
        // Chargement du Helper d'Url dans le App/Helpers
        require_once app_path('Helpers/UrlHelper.php');

        // Boot de ton mini-package interne du App/Support
        AppHelpers::boot();
    }
}
