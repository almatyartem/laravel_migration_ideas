<?php

namespace App\Contracts\WebStore\Events;

use App\Models\DTO\ProductDTO;

interface NewProductAddedEventContract
{
    /**
     * @return ProductDTO
     */
    public function getProductDTO() : ProductDTO;
}
