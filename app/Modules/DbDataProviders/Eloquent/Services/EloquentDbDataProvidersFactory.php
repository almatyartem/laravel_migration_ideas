<?php

namespace App\Modules\DbDataProviders\Eloquent\Services;

use App\Contracts\DbDataProviders\DbDataProviderContract;
use App\Contracts\DbDataProviders\DbDataProvidersFactoryContract;
use App\Modules\DbDataProviders\Eloquent\Models\Currency;
use App\Modules\DbDataProviders\Eloquent\Models\ExchangeRate;
use App\Modules\DbDataProviders\Eloquent\Models\Product;
use App\Modules\DbDataProviders\Eloquent\ModelToDTOConverter;

class EloquentDbDataProvidersFactory implements DbDataProvidersFactoryContract
{
    /**
     * @var ModelToDTOConverter
     */
    protected ModelToDTOConverter $converter;

    /**
     * DbDataProvidersFactory constructor.
     * @param ModelToDTOConverter $converter
     */
    function __construct(ModelToDTOConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * @return DbDataProviderContract
     */
    public function currenciesProvider() : DbDataProviderContract
    {
        return new EloquentDbDataProvider(new Currency(), $this->converter);
    }

    /**
     * @return DbDataProviderContract
     */
    public function exchangeRatesProvider() : DbDataProviderContract
    {
        return new EloquentDbDataProvider(new ExchangeRate(), $this->converter);
    }

    /**
     * @return DbDataProviderContract
     */
    public function productsProvider() : DbDataProviderContract
    {
        return new EloquentDbDataProvider(new Product(), $this->converter);
    }
}
