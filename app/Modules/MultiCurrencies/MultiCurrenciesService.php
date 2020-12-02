<?php

namespace App\Modules\MultiCurrencies;

use App\Contracts\DataProviders\CurrenciesDataProviderContract;
use App\Contracts\DataProviders\ExchangeRatesDataProviderContract;
use App\Exceptions\ValidationException;

class MultiCurrenciesService
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
     * @param string $currencyCode
     * @param float $usdAmount
     * @return string|null
     */
    public function getFormattedValueInCurrency(string $currencyCode, float $usdAmount) : ?string
    {
        $date = date('Y-m-d');
        $currency = $this->currenciesDP->search()->byCode($currencyCode)->first();
        if($currency) {
            $rate = $this->exchangeRatesDP->search()->byDate($date)->byCurrencyId($currency->id)->first();
            if($rate){
                $value = $rate->rateToUsd * $usdAmount;

                return $currency->sign ? $currency->sign.$value : $value .' ('.$currency->code.')';
            }
        }

        return null;
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
