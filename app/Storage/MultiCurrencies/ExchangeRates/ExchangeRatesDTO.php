<?php

namespace App\Storage\MultiCurrencies\ExchangeRates;

use App\Contracts\Storage\DTOContract;
use App\Storage\MultiCurrencies\Currencies\CurrenciesDTO;
use Spatie\DataTransferObject\DataTransferObject;

class ExchangeRatesDTO extends DataTransferObject implements DTOContract
{
    public int $id;
    public int $currencyId;
    public float $rateToUsd;
    public string $date;
    public ?string $createdAt;
    public ?string $updatedAt;
    public ?CurrenciesDTO $currency;
}
