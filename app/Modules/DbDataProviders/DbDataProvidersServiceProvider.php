<?php

namespace App\Modules\DbDataProviders;

use App\Contracts\DbDataProviders\Entities\CurrenciesDBContract;
use App\Contracts\DbDataProviders\Entities\ExchangeRatesDBContract;
use App\Contracts\DbDataProviders\Entities\ProductsDBContract;

use App\Modules\DbDataProviders\Eloquent\Services\CurrenciesDbDataProvider;
use App\Modules\DbDataProviders\Eloquent\Services\ExchangeRatesDbDataProvider;
use App\Modules\DbDataProviders\Eloquent\Services\ProductsDbDataProvider;

use Illuminate\Support\ServiceProvider;

class DbDataProvidersServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        CurrenciesDBContract::class  => CurrenciesDbDataProvider::class,
        ExchangeRatesDBContract::class  => ExchangeRatesDbDataProvider::class,
        ProductsDBContract::class  => ProductsDbDataProvider::class,
    ];
}
