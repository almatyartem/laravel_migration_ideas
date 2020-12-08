<?php

namespace App\Contracts\DbDataProviders;

interface DbDataProvidersFactoryContract
{
    /**
     * @return DbDataProviderContract
     */
    public function currenciesProvider() : DbDataProviderContract;

    /**
     * @return DbDataProviderContract
     */
    public function exchangeRatesProvider() : DbDataProviderContract;

    /**
     * @return DbDataProviderContract
     */
    public function productsProvider() : DbDataProviderContract;
}
