<?php

namespace App\Common\DTO\Models\MultiCurrencies;

use Spatie\DataTransferObject\DataTransferObject;

class CurrencyDTO extends DataTransferObject
{
    public int $id;
    public string $code;
    public ?string $createdAt;
    public ?string $updatedAt;
    public ?array $products;
}
