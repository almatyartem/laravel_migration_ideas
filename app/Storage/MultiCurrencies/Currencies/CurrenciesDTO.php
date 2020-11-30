<?php

namespace App\Storage\MultiCurrencies\Currencies;

use App\Contracts\Storage\DTOContract;
use Spatie\DataTransferObject\DataTransferObject;

class CurrenciesDTO extends DataTransferObject implements DTOContract
{
    public int $id;
    public string $code;
    public ?string $createdAt;
    public ?string $updatedAt;
    public ?array $products;
}
