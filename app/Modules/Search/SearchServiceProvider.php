<?php

namespace App\Modules\Search;

use App\Contracts\DbDataProviders\DbDataProviderContract;
use App\Contracts\DbDataProviders\DbDataProvidersFactoryContract;
use App\Contracts\Search\Services\CurrenciesSearchContract;
use App\Contracts\Search\Services\ExchangeRatesSearchContract;
use App\Contracts\Search\Services\ProductsSearchContract;
use App\Modules\Search\Services\CurrenciesSearch;
use App\Modules\Search\Services\ExchangeRatesSearch;
use App\Modules\Search\Services\ProductsSearch;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        CurrenciesSearchContract::class => CurrenciesSearch::class,
        ExchangeRatesSearchContract::class => ExchangeRatesSearch::class,
        ProductsSearchContract::class => ProductsSearch::class,
    ];

    public function boot()
    {
        $factory = app(DbDataProvidersFactoryContract::class);

        $this->app->when(CurrenciesSearch::class)
            ->needs(DbDataProviderContract::class)
            ->give(function () use ($factory) {
                return $factory->currenciesProvider();
            });

        $this->app->when(ExchangeRatesSearch::class)
            ->needs(DbDataProviderContract::class)
            ->give(function () use ($factory) {
                return $factory->exchangeRatesProvider();
            });

        $this->app->when(ProductsSearch::class)
            ->needs(DbDataProviderContract::class)
            ->give(function () use ($factory) {
                return $factory->productsProvider();
            });
    }
}
