<?php

namespace App\Common\DTO\Models\MultiCurrencies;

use Spatie\DataTransferObject\DataTransferObject;

class ExchangeRateDTO extends DataTransferObject
{
    public int $id;
    public int $currencyId;
    public float $rateToUsd;
    public string $date;
    public ?string $createdAt;
    public ?string $updatedAt;
}
