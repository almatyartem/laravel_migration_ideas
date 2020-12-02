<?php

namespace App\Providers;

use App\Modules\MultiCurrencies\MultiCurrenciesService;
use App\Modules\MultiCurrencies\Models\ExchangeRatesEntity;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [

    ];

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [

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
