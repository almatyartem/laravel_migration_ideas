<?php

namespace App\Contracts;

interface ExchangeRatesApiContract
{
    /**
     * @param float $euroToDollarRate
     * @param float $poundToDollarRate
     * @param string $date
     * @return ExchangeRatesEntityContract
     */
    public function createNewRecord(float $euroToDollarRate, float $poundToDollarRate, string $date) : ExchangeRatesEntityContract;

    /**
     * @param string $date
     * @return ExchangeRatesEntityContract|null
     */
    public function getExchangeRatesForTheDate(string $date) : ?ExchangeRatesEntityContract;
}
