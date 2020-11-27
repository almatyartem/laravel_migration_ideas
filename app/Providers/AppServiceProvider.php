<?php

namespace App\Providers;

use App\Contracts\ExchangeRatesApiContract;
use App\Contracts\ExchangeRatesEntityContract;
use App\Modules\ExchangeRatesOwner\ExchangeRatesApi;
use App\Modules\ExchangeRatesOwner\Models\ExchangeRatesEntity;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ExchangeRatesEntityContract::class => ExchangeRatesEntity::class,
    ];

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        ExchangeRatesApiContract::class => ExchangeRatesApi::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
