<?php

namespace App\Providers;

use Braintree\Gateway;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $this->app->singleton(Gateway::class, function($app) {
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'q6t77dd79yy7xz4w',
                'publicKey' => 'fvk53kcngtfbdn25',
                'privateKey' => '8f488e8a534f960a54701a62651c6539'
            ]);
        });
        $charts->register([
            \App\Charts\SalesChart::class,
            \App\Charts\OrdersChart::class
        ]);
    }
}
