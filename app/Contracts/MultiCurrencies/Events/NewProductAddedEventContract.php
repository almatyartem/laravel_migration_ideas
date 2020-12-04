<?php

namespace App\Contracts\MultiCurrencies\Events;

use App\Models\DTO\ProductDTO;

interface NewProductAddedEventContract
{
    /**
     * @return ProductDTO
     */
    public function getProductDTO() : ProductDTO;
}
