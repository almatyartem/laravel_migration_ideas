<?php

namespace App\Contracts\DataProviders;

use App\Contracts\SearchContexts\BaseSearchContextContract;
use App\Contracts\SearchContexts\PricesSearchContextContract;
use App\Models\DTO\PriceDTO;
use App\Models\DTO\Extendable\DTOModel;

interface PricesDataProviderContract
{
    /**
     * @return PricesSearchContextContract|BaseSearchContextContract
     */
    function search() : PricesSearchContextContract;

    /**
     * @param int $id
     * @return PriceDTO|null
     */
    public function read(int $id) : ?PriceDTO;
}
