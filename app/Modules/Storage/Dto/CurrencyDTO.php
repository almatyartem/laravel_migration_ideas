<?php

namespace App\Modules\Storage\Dto;

use App\Contracts\ModelDTOContract;
use Spatie\DataTransferObject\DataTransferObject;

class CurrencyDTO extends DataTransferObject implements ModelDTOContract
{
    public int $id;
    public string $code;
    public ?string $createdAt;
    public ?string $updatedAt;
    public ?array $products;
}
