<?php

namespace App\Modules\MultiCurrencies\Services;

use App\Contracts\MultiCurrencies\Services\CurrenciesConverterContract;
use App\Contracts\Storage\Services\DataProviders\CurrenciesDataProviderContract;
use App\Contracts\Storage\Services\DataProviders\ExchangeRatesDataProviderContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\ExchangeRateDTO;

class MultiCurrenciesApi implements CurrenciesConverterContract
{
    /**
     * @var ExchangeRatesDataProviderContract
     */
    protected ExchangeRatesDataProviderContract $exchangeRatesDP;

    /**
     * @var CurrenciesDataProviderContract
     */
    protected CurrenciesDataProviderContract $currenciesDP;

    /**
     * MultiCurrenciesApi constructor.
     * @param ExchangeRatesDataProviderContract $exchangeRatesDP
     * @param CurrenciesDataProviderContract $currenciesDP
     */
    function __construct(ExchangeRatesDataProviderContract $exchangeRatesDP, CurrenciesDataProviderContract $currenciesDP)
    {
        $this->exchangeRatesDP = $exchangeRatesDP;
        $this->currenciesDP = $currenciesDP;
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

    /**
     * @param int $currencyId
     * @param string $sign
     * @return bool
     * @throws ValidationException
     */
    public function setCurrencySign(int $currencyId, string $sign) : bool
    {
        return $this->currenciesDP->setSign($currencyId, $sign);
    }
}
