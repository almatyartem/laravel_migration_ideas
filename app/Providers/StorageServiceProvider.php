<?php

namespace App\Providers;

use App\Contracts\ExchangeRatesApiContract;
use App\Contracts\ExchangeRatesEntityContract;
use App\Contracts\Storage\ModelToDTOConverterContract;
use App\Contracts\Storage\MultiCurrencies\Currencies\CurrenciesRepositoryContract;
use App\Contracts\Storage\MultiCurrencies\Currencies\CurrenciesSearchBuilderContract;
use App\Modules\ExchangeRatesOwner\ExchangeRatesApi;
use App\Modules\ExchangeRatesOwner\Models\ExchangeRatesEntity;
use App\Storage\ModelToDTOConverter;
use App\Storage\MultiCurrencies\Currencies\CurrenciesRepository;
use App\Storage\MultiCurrencies\Currencies\CurrenciesSearchBuilder;
use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        CurrenciesRepositoryContract::class => CurrenciesRepository::class,
        CurrenciesSearchBuilderContract::class => CurrenciesSearchBuilder::class,
        ModelToDTOConverterContract::class => ModelToDTOConverter::class
    ];
}
