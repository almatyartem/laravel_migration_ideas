<?php

namespace App\Contracts\Search\Services;

use App\Models\DTO\ProductDTO;

interface ProductsSearchContract extends BaseSearchContract
{
    /**
     * @return ProductDTO|null
     */
    public function first() : ?ProductDTO;

    /**
     * @return ProductDTO[]|null
     */
    public function find(): ?array;

    /**
     * @param string $code
     * @return ProductsSearchContract
     */
    public function byCode(string $code) : ProductsSearchContract;
}
