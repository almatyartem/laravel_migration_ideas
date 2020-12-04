<?php

namespace App\Contracts\Storage\Services\DataProviders;

use App\Contracts\Storage\Services\SearchContexts\ProductsSearchContextContract;
use App\Models\DTO\ProductDTO;

interface ProductsDataProviderContract
{
    /**
     * @return ProductsSearchContextContract
     */
    function search() : ProductsSearchContextContract;

    /**
     * @param int $id
     * @return ProductDTO|null
     */
    public function read(int $id) : ?ProductDTO;
}
