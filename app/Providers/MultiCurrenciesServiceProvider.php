<?php

namespace App\Providers;

use App\Contracts\Services\MultiCurrenciesServiceContract;
use App\Modules\MultiCurrencies\MultiCurrenciesService;

use Illuminate\Support\ServiceProvider;

class MultiCurrenciesServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        MultiCurrenciesServiceContract::class => MultiCurrenciesService::class,
    ];
}
