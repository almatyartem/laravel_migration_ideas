<?php

namespace App\Modules\Storage\SearchContexts;

use App\Contracts\SearchContexts\PricesSearchContextContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\Eloquent\Models\Price;
use App\Models\DTO\PriceDTO;
use App\Modules\Storage\SearchContexts\Extendable\BaseSearchContext;

class PricesSearchContext extends BaseSearchContext implements PricesSearchContextContract
{
    /**
     * PricesSearchContext constructor.
     * @param Price $model
     */
    function __construct(Price $model)
    {
        parent::__construct($model);
    }

    /**
     * @return PriceDTO|DTOModel|null
     */
    public function first() : ?PriceDTO
    {
        return parent::first();
    }

    /**
     * @return PriceDTO[]|null
     */
    public function find(): ?array
    {
        return parent::find();
    }
}
