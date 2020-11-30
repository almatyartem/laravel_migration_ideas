<?php

namespace App\Storage\Store\Products;

use App\Contracts\Storage\DTOContract;
use Spatie\DataTransferObject\DataTransferObject;

class ProductsDTO extends DataTransferObject implements DTOContract
{
    public int $id;
    public string $title;
    public string $code;
    public float $supplierPrice;
    public int $supplierCurrencyId;
    public ?string $createdAt;
    public ?string $updatedAt;
}
