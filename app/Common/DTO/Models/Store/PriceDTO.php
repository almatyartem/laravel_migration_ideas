<?php

namespace App\Common\DTO\Models\Store;

use Spatie\DataTransferObject\DataTransferObject;

class PriceDTO extends DataTransferObject
{
    public int $id;
    public int $productId;
    public int $currencyId;
    public float $value;
    public ?string $createdAt;
    public ?string $updatedAt;
}
