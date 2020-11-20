<?php

namespace App\Modules\Widgets;

use App\Contracts\ExchangeRatesApiContract;

class ExchangeRatesWidget
{
    /**
     * @var ExchangeRatesApiContract
     */
    protected $api;

    /**
     * ExchangeRatesWidget constructor.
     * @param ExchangeRatesApiContract $api
     */
    function __construct(ExchangeRatesApiContract $api)
    {
        $this->api = $api;
    }

    /**
     * @return float|null
     */
    public function getCurrentEuroRate() : ?float
    {
        $currentRates = $this->api->getExchangeRatesForTheDate(date('Y-m-d'));

        if($currentRates){
            return $currentRates->getEuroToDollarRate();
        }

        return null;
    }
}
