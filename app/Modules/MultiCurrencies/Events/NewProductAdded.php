<?php

namespace App\Modules\MultiCurrencies\Events;

use App\Contracts\MultiCurrencies\Events\NewProductAddedEventContract;
use App\Models\DTO\ProductDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewProductAdded implements NewProductAddedEventContract
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var ProductDTO
     */
    public ProductDTO $productDTO;

    /**
     * NewProductAdded constructor.
     * @param ProductDTO $productDTO
     */
    public function __construct(ProductDTO $productDTO)
    {
        $this->productDTO = $productDTO;
    }

    /**
     * @return ProductDTO
     */
    public function getProductDTO() : ProductDTO
    {
        return $this->productDTO;
    }
}
