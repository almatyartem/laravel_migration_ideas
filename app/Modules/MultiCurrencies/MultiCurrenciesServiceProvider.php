<?php

namespace App\Modules\MultiCurrencies;

use App\Contracts\MultiCurrencies\Events\NewCurrencyAddedEventContract;
use App\Contracts\MultiCurrencies\Services\CurrenciesConverterContract;
use App\Modules\MultiCurrencies\Events\NewCurrencyAdded;
use App\Modules\MultiCurrencies\Services\MultiCurrenciesApi;
use Illuminate\Support\ServiceProvider;

class MultiCurrenciesServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        CurrenciesConverterContract::class => MultiCurrenciesApi::class,
        NewCurrencyAddedEventContract::class => NewCurrencyAdded::class,
    ];

    public function boot()
    {
        $this->app->register(MultiCurrenciesRoutesServiceProvider::class);
    }
}
