<?php

namespace App\Contracts;

interface ExchangeRatesEntityContract
{
    /**
     * @return float
     */
    public function getPoundToDollarRate() : float;

    /**
     * @return float
     */
    public function getEuroToDollarRate() : float;
}
