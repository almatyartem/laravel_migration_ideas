<?php

namespace App\Providers;

use App\Contracts\DataProviders\CurrenciesDataProviderContract;
use App\Contracts\DataProviders\ExchangeRatesDataProviderContract;
use App\Contracts\DataProviders\ProductsDataProviderContract;
use App\Contracts\DataProviders\PricesDataProviderContract;

use App\Modules\Storage\DataProviders\CurrenciesDataProvider;
use App\Modules\Storage\DataProviders\ExchangeRatesDataProvider;
use App\Modules\Storage\DataProviders\ProductsDataProvider;
use App\Modules\Storage\DataProviders\PricesDataProvider;

use App\Contracts\SearchContexts\CurrenciesSearchContextContract;
use App\Contracts\SearchContexts\ExchangeRatesSearchContextContract;
use App\Contracts\SearchContexts\ProductsSearchContextContract;
use App\Contracts\SearchContexts\PricesSearchContextContract;

use App\Modules\Storage\SearchContexts\CurrenciesSearchContext;
use App\Modules\Storage\SearchContexts\ExchangeRatesSearchContext;
use App\Modules\Storage\SearchContexts\ProductsSearchContext;
use App\Modules\Storage\SearchContexts\PricesSearchContext;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        CurrenciesDataProviderContract::class => CurrenciesDataProvider::class,
        ExchangeRatesDataProviderContract::class => ExchangeRatesDataProvider::class,
        ProductsDataProviderContract::class => ProductsDataProvider::class,
        PricesDataProviderContract::class => PricesDataProvider::class,

        CurrenciesSearchContextContract::class => CurrenciesSearchContext::class,
        ExchangeRatesSearchContextContract::class => ExchangeRatesSearchContext::class,
        ProductsSearchContextContract::class => ProductsSearchContext::class,
        PricesSearchContextContract::class => PricesSearchContext::class,
    ];

    public $singletions = [

    ];
}
