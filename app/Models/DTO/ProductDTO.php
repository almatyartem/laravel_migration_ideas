<?php

namespace App\Models\DTO;

use App\Models\DTO\Extendable\DTOModel;

class ProductDTO extends DTOModel
{
    public int $id;
    public string $title;
    public string $code;
    public float $usdPrice;
    public ?string $createdAt;
    public ?string $updatedAt;
}
