<?php

namespace App\Storage\Store\Prices;

use App\Contracts\Storage\DTOContract;
use Spatie\DataTransferObject\DataTransferObject;

class PricesDTO extends DataTransferObject implements DTOContract
{
    public int $id;
    public int $productId;
    public int $currencyId;
    public float $value;
    public ?string $createdAt;
    public ?string $updatedAt;
}
