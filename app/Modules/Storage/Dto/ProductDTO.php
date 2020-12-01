<?php

namespace App\Modules\Storage\Dto;

use App\Contracts\ModelDTOContract;
use Spatie\DataTransferObject\DataTransferObject;

class ProductDTO extends DataTransferObject implements ModelDTOContract
{
    public int $id;
    public string $title;
    public string $code;
    public float $supplierPrice;
    public int $supplierCurrencyId;
    public ?string $createdAt;
    public ?string $updatedAt;
}
