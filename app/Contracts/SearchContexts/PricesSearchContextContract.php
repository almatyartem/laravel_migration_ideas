<?php

namespace App\Contracts\SearchContexts;

use App\Models\DTO\PriceDTO;

interface PricesSearchContextContract extends BaseSearchContextContract
{
    /**
     * @return PriceDTO|null
     */
    public function first() : ?PriceDTO;

    /**
     * @return PriceDTO[]|null
     */
    public function find(): ?array;
}
