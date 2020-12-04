<?php

namespace App\Modules\DbDataProviders;

use App\Contracts\DbDataProviders\Eloquent\CurrenciesEDBContract;
use App\Contracts\DbDataProviders\Eloquent\ExchangeRatesEDBContract;
use App\Contracts\DbDataProviders\Eloquent\ProductsEDBContract;

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
        CurrenciesEDBContract::class  => CurrenciesDbDataProvider::class,
        ExchangeRatesEDBContract::class  => ExchangeRatesDbDataProvider::class,
        ProductsEDBContract::class  => ProductsDbDataProvider::class,
    ];
}
