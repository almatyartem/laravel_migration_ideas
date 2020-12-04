<?php

namespace App\Contracts\MultiCurrencies\Services;

interface ExchangeRatesProviderContract
{
    /**
     * @return array|null
     */
    public function getCurrentExchangeRates() : ?array;
}
