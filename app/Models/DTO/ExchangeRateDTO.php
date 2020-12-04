<?php

namespace App\Models\DTO;

use App\Models\DTO\Extendable\DTOModel;

class ExchangeRateDTO extends DTOModel
{
    public int $id;
    public int $currencyId;
    public float $rateToUsd;
    public string $date;
    public ?string $createdAt;
    public ?string $updatedAt;
    public ?CurrencyDTO $currency;
}
