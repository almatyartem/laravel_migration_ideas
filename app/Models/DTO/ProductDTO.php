<?php

namespace App\Models\DTO;

use App\Models\DTO\Extendable\DTOModel;

class ProductDTO extends DTOModel
{
    public int $id;
    public string $title;
    public string $code;
    public float $supplierPrice;
    public int $supplierCurrencyId;
    public ?string $createdAt;
    public ?string $updatedAt;
}
