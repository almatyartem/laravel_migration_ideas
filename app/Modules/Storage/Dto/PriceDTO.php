<?php

namespace App\Modules\Storage\Dto;

use App\Contracts\ModelDTOContract;
use Spatie\DataTransferObject\DataTransferObject;

class PriceDTO extends DataTransferObject implements ModelDTOContract
{
    public int $id;
    public int $productId;
    public int $currencyId;
    public float $value;
    public ?string $createdAt;
    public ?string $updatedAt;
}
