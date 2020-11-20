<?php

namespace App\Modules\Widgets;

use App\Modules\ExchangeRatesOwner\Models\ExchangeRatesEntity;

class ExchangeRatesWidget
{
    public function getCurrentEuroRate(ExchangeRatesEntity $exchangeRatesModel) : ?float
    {
        $currentRates = $exchangeRatesModel->where('date', date('Y-m-d'))->first();

        if($currentRates){
            return $currentRates->euro_to_dollar_rate;
        }

        return null;
    }
}
