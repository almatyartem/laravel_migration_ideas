<?php

namespace App\Contracts\Repositories\Services;

use App\Models\DTO\ProductDTO;

interface ProductsRepositoryContract
{
    /**
     * @param int $id
     * @return ProductDTO|null
     */
    public function read(int $id) : ?ProductDTO;

    /**
     * @return ProductDTO[]|null
     */
    public function all() : ?array;
}
