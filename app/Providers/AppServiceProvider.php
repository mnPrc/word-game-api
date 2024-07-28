<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PointsService;
use App\Services\WordService;
use App\Utilities\PalindromeHelpers;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PalindromeHelpers::class, function () {
            return new PalindromeHelpers();
        });

        $this->app->singleton(PointsService::class, function ($app) {
            return new PointsService($app->make(PalindromeHelpers::class));
        });

        $this->app->singleton(WordService::class, function ($app) {
            return new WordService($app->make(PointsService::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
