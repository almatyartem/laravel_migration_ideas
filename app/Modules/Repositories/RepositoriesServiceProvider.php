<?php

namespace App\Modules\Repositories;

use App\Contracts\DbDataProviders\DbDataProviderContract;
use App\Contracts\DbDataProviders\DbDataProvidersFactoryContract;
use App\Contracts\Repositories\Services\CurrenciesRepositoryContract;
use App\Contracts\Repositories\Services\ExchangeRatesRepositoryContract;
use App\Contracts\Repositories\Services\ProductsRepositoryContract;

use App\Modules\Repositories\Services\CurrenciesRepository;
use App\Modules\Repositories\Services\ExchangeRatesRepository;
use App\Modules\Repositories\Services\ProductsRepository;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        CurrenciesRepositoryContract::class => CurrenciesRepository::class,
        ExchangeRatesRepositoryContract::class => ExchangeRatesRepository::class,
        ProductsRepositoryContract::class => ProductsRepository::class,
    ];

    public function boot()
    {
        $factory = app(DbDataProvidersFactoryContract::class);

        $this->app->when(CurrenciesRepository::class)
            ->needs(DbDataProviderContract::class)
            ->give(function () use ($factory) {
                return $factory->currenciesProvider();
            });

        $this->app->when(ExchangeRatesRepository::class)
            ->needs(DbDataProviderContract::class)
            ->give(function () use ($factory) {
                return $factory->exchangeRatesProvider();
            });

        $this->app->when(ProductsRepository::class)
            ->needs(DbDataProviderContract::class)
            ->give(function () use ($factory) {
                return $factory->productsProvider();
            });
    }
}
