<?php

namespace Minulhasanrokan\CustomerSocialFinder;

use Illuminate\Support\ServiceProvider;

class CustomerSocialFinderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'customer-social-finder');
    }

    public function register()
    {
        // Register SocialFinder class as singleton
        $this->app->singleton(SocialFinder::class, function () {
            return new SocialFinder();
        });
    }
}
