<?php

namespace App\Modules\MultiCurrencies\Services;

use App\Contracts\MultiCurrencies\Services\ExchangeRatesProviderContract;
use App\Contracts\Storage\Services\DataProviders\CurrenciesDataProviderContract;
use App\Contracts\Storage\Services\DataProviders\ExchangeRatesDataProviderContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\CurrencyDTO;
use App\Models\DTO\ExchangeRateDTO;

class ExchangeRatesApi implements ExchangeRatesProviderContract
{
    /**
     * @var ExchangeRatesDataProviderContract
     */
    protected ExchangeRatesDataProviderContract $exchangeRatesDP;

    /**
     * ExchangeRatesApi constructor.
     * @param ExchangeRatesDataProviderContract $exchangeRatesDP
     */
    function __construct(ExchangeRatesDataProviderContract $exchangeRatesDP)
    {
        $this->exchangeRatesDP = $exchangeRatesDP;
    }

    /**
     * @return ExchangeRateDTO[]|null
     */
    public function getCurrentExchangeRates() : ?array
    {
        $date = date('Y-m-d');

        $rates = $this->exchangeRatesDP->search()
            ->byDate($date)
            ->withCurrencies()
            ->find();

        return $rates;
    }
}
