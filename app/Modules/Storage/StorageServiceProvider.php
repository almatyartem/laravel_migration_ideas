<?php

namespace App\Modules\Storage;

use App\Contracts\Storage\Services\DataProviders\CurrenciesDataProviderContract;
use App\Contracts\Storage\Services\DataProviders\ExchangeRatesDataProviderContract;
use App\Contracts\Storage\Services\DataProviders\ProductsDataProviderContract;

use App\Modules\Storage\DataProviders\CurrenciesDataProvider;
use App\Modules\Storage\DataProviders\ExchangeRatesDataProvider;
use App\Modules\Storage\DataProviders\ProductsDataProvider;

use App\Contracts\Storage\Services\SearchContexts\CurrenciesSearchContextContract;
use App\Contracts\Storage\Services\SearchContexts\ExchangeRatesSearchContextContract;
use App\Contracts\Storage\Services\SearchContexts\ProductsSearchContextContract;

use App\Modules\Storage\SearchContexts\CurrenciesSearchContext;
use App\Modules\Storage\SearchContexts\ExchangeRatesSearchContext;
use App\Modules\Storage\SearchContexts\ProductsSearchContext;

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

        CurrenciesSearchContextContract::class => CurrenciesSearchContext::class,
        ExchangeRatesSearchContextContract::class => ExchangeRatesSearchContext::class,
        ProductsSearchContextContract::class => ProductsSearchContext::class,
    ];

    public $singletions = [

    ];
}
