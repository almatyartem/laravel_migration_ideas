<?php

namespace App\Modules\MultiCurrencies;

use App\Contracts\MultiCurrencies\Events\NewCurrencyAddedEventContract;
use App\Contracts\MultiCurrencies\Services\ExchangeRatesProviderContract;
use App\Modules\MultiCurrencies\Events\NewCurrencyAdded;
use App\Modules\MultiCurrencies\Jobs\SyncExchangeRates;
use App\Modules\MultiCurrencies\Services\CurrenciesApi;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class MultiCurrenciesServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ExchangeRatesProviderContract::class => CurrenciesApi::class,
        NewCurrencyAddedEventContract::class => NewCurrencyAdded::class,
    ];

    public function boot()
    {
        $this->app->register(MultiCurrenciesRoutesServiceProvider::class);
        $this->app->booted(function () {
            $schedule = app(Schedule::class);
            $schedule->job(new SyncExchangeRates)->everyMinute();
        });
    }
}
