<?php

namespace App\Modules\DbDataProviders\Eloquent\Services;

use App\Contracts\DbDataProviders\Entities\ProductsDBContract;
use App\Modules\DbDataProviders\Eloquent\Services\Extendable\EloquentDbDataProvider;
use App\Modules\DbDataProviders\Eloquent\Models\Product;
use App\Modules\DbDataProviders\Eloquent\ModelToDTOConverter;

class ProductsDbDataProvider extends EloquentDbDataProvider implements ProductsDBContract
{
    /**
     * @var Product
     */
    protected $eloquentModel;

    /**
     * ProductsDbDataProvider constructor.
     * @param Product $eloquentModel
     * @param ModelToDTOConverter $converter
     */
    function __construct(Product $eloquentModel, ModelToDTOConverter $converter)
    {
        parent::__construct($eloquentModel, $converter);
    }
}
