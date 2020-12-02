<?php

namespace App\Models\DTO;

use App\Models\DTO\Extendable\DTOModel;

class PriceDTO extends DTOModel
{
    public int $id;
    public int $productId;
    public int $currencyId;
    public float $value;
    public ?string $createdAt;
    public ?string $updatedAt;
}
