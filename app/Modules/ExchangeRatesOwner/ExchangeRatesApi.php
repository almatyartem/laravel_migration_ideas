<?php

namespace App\Modules\ExchangeRatesOwner;

use App\Contracts\ExchangeRatesApiContract;
use App\Contracts\ExchangeRatesEntityContract;
use App\Modules\ExchangeRatesOwner\Models\ExchangeRatesEntity;

class ExchangeRatesApi implements ExchangeRatesApiContract
{
    /**
     * @param float $euroToDollarRate
     * @param float $poundToDollarRate
     * @param string $date
     * @return ExchangeRatesEntityContract
     */
    public function createNewRecord(float $euroToDollarRate, float $poundToDollarRate, string $date) : ExchangeRatesEntityContract
    {
        return ExchangeRatesEntity::create([
            'euro_to_dollar_rate' => $euroToDollarRate,
            'pound_to_dollar_rate' => $poundToDollarRate,
            'date' => $date
        ]);
    }

    /**
     * @param string $date
     * @return ExchangeRatesEntityContract|null
     */
    public function getExchangeRatesForTheDate(string $date) : ?ExchangeRatesEntityContract
    {
        return ExchangeRatesEntity::where('date', date('Y-m-d'))->first();
    }
}
