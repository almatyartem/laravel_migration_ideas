<?php

namespace App\Modules\Search;

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
}
