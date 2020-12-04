<?php

namespace App\Modules\MultiCurrencies\Services;

use App\Contracts\MultiCurrencies\Services\ExchangeRatesProviderContract;
use App\Contracts\Repositories\Services\CurrenciesRepositoryContract;
use App\Contracts\Repositories\Services\ExchangeRatesRepositoryContract;
use App\Contracts\Search\Services\ExchangeRatesSearchContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\CurrencyDTO;
use App\Models\DTO\ExchangeRateDTO;

class ExchangeRatesApi implements ExchangeRatesProviderContract
{
    /**
     * @var ExchangeRatesSearchContract
     */
    protected ExchangeRatesSearchContract $exchangeRatesSearch;

    /**
     * ExchangeRatesApi constructor.
     * @param ExchangeRatesSearchContract $exchangeRatesSearch
     */
    function __construct(ExchangeRatesSearchContract $exchangeRatesSearch)
    {
        $this->exchangeRatesSearch = $exchangeRatesSearch;
    }

    /**
     * @return ExchangeRateDTO[]|null
     */
    public function getCurrentExchangeRates() : ?array
    {
        $date = date('Y-m-d');

        $rates = $this->exchangeRatesSearch->byDate($date)->withCurrencies()->find();

        return $rates;
    }
}
