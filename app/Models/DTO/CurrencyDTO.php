<?php

namespace App\Models\DTO;

use App\Models\DTO\Extendable\DTOModel;

class CurrencyDTO extends DTOModel
{
    public int $id;
    public string $code;
    public ?string $sign;
    public ?string $createdAt;
    public ?string $updatedAt;
    public ?array $products;
}
