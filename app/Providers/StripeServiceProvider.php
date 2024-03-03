<?php

namespace App\Providers;

use Stripe\StripeClient;
use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        app()->bind('stripe', function () {
            return new StripeClient(config('stripe.secret'));
    });
    }
}
