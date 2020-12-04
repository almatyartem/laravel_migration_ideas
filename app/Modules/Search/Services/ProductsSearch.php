<?php

namespace App\Modules\Search\Services;

use App\Contracts\Search\Services\ProductsSearchContract;
use App\Modules\DbDataProviders\Eloquent\Services\ProductsDbDataProvider;
use App\Models\DTO\ProductDTO;
use App\Modules\Search\Services\Extendable\BaseSearch;

class ProductsSearch extends BaseSearch implements ProductsSearchContract
{
    /**
     * ProductsSearchContext constructor.
     * @param ProductsDbDataProvider $dbDataProvider
     */
    function __construct(ProductsDbDataProvider $dbDataProvider)
    {
        parent::__construct($dbDataProvider);
    }

    /**
     * @return ProductDTO|null
     */
    public function first() : ?ProductDTO
    {
        return parent::first();
    }

    /**
     * @return ProductDTO[]|null
     */
    public function find(): ?array
    {
        return parent::find();
    }

    /**
     * @param string $code
     * @return ProductsSearch
     */
    public function byCode(string $code) : ProductsSearch
    {
        return $this->whereEqual('code', $code);
    }
}
