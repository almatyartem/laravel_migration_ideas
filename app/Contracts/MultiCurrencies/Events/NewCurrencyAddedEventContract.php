<?php

namespace App\Contracts\MultiCurrencies\Events;

use App\Models\DTO\CurrencyDTO;

interface NewCurrencyAddedEventContract
{
    /**
     * @return CurrencyDTO
     */
    public function getCurrencyDTO() : CurrencyDTO;
}
