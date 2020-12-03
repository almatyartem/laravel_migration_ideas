<?php

namespace App\Contracts\Storage\Services\SearchContexts;

use App\Models\DTO\ProductDTO;

interface ProductsSearchContextContract extends BaseSearchContextContract
{
    /**
     * @return ProductDTO|null
     */
    public function first() : ?ProductDTO;

    /**
     * @return ProductDTO[]|null
     */
    public function find(): ?array;
}
