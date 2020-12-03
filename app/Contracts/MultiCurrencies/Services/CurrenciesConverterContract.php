<?php

namespace App\Contracts\MultiCurrencies\Services;

interface CurrenciesConverterContract
{
    /**
     * @return array|null
     */
    public function getCurrentExchangeRates() : ?array;
}
