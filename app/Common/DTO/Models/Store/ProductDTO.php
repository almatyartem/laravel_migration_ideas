<?php

namespace App\Common\DTO\Models\Store;

use Spatie\DataTransferObject\DataTransferObject;

class ProductDTO extends DataTransferObject
{
    public int $id;
    public string $title;
    public string $code;
    public float $supplierPrice;
    public int $supplierCurrencyId;
    public ?string $createdAt;
    public ?string $updatedAt;
}
