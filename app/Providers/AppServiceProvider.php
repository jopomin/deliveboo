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
        $charts->register([
            \App\Charts\SalesChart::class,
            \App\Charts\OrdersChart::class
        ]);

        $this->app->singleton(Gateway::class, function($app) {
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'c46sbrr2wh9ht562',
                'publicKey' => 'q6p36xj5g2wfkdg8',
                'privateKey' => '496ffa014c1e58bec127dfdc6f31b5ae'
            ]);
        });
    }
}
