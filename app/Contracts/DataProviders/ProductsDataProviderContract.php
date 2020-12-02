<?php

namespace App\Contracts\DataProviders;

use App\Contracts\SearchContexts\BaseSearchContextContract;
use App\Contracts\SearchContexts\ProductsSearchContextContract;
use App\Models\DTO\ProductDTO;

interface ProductsDataProviderContract
{
    /**
     * @return ProductsSearchContextContract|BaseSearchContextContract
     */
    function search() : ProductsSearchContextContract;

    /**
     * @param int $id
     * @return ProductDTO|null
     */
    public function read(int $id) : ?ProductDTO;
}
