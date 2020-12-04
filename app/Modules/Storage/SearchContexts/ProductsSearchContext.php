<?php

namespace App\Modules\Storage\SearchContexts;

use App\Contracts\Storage\Services\SearchContexts\ProductsSearchContextContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\Eloquent\Models\Product;
use App\Models\DTO\ProductDTO;
use App\Modules\Storage\SearchContexts\Extendable\BaseSearchContext;

class ProductsSearchContext extends BaseSearchContext implements ProductsSearchContextContract
{
    /**
     * ProductsSearchContext constructor.
     * @param Product $model
     */
    function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @return ProductDTO|DTOModel|null
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
     * @return ProductsSearchContext
     */
    public function byCode(string $code) : ProductsSearchContext
    {
        return $this->whereEqual('code', $code);
    }
}
