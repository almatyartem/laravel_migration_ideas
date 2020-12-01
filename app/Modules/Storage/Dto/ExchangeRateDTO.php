<?php

namespace App\Modules\Storage\Dto;

use App\Contracts\ModelDTOContract;
use Spatie\DataTransferObject\DataTransferObject;

class ExchangeRateDTO extends DataTransferObject implements ModelDTOContract
{
    public int $id;
    public int $currencyId;
    public float $rateToUsd;
    public string $date;
    public ?string $createdAt;
    public ?string $updatedAt;
    public ?CurrencyDTO $currency;
}
