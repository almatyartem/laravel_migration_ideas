<?php

namespace App\Modules\Storage\Eloquent\DbDataProviders;

use App\Contracts\SearchContexts\ProductsSearchContextContract;
use App\Modules\Storage\Contracts\CrudWithSearchDbDataProviderContract;
use App\Modules\Storage\Eloquent\DbDataProviders\Extendable\CrudWithSearch;
use App\Modules\Storage\Eloquent\Models\Product;
use App\Modules\Storage\Eloquent\ModelToDTOConverter;

class ProductsDbDataProvider extends CrudWithSearch implements CrudWithSearchDbDataProviderContract
{
    /**
     * @var Product
     */
    protected $eloquentModel;

    /**
     * @var ProductsSearchContextContract
     */
    protected $searchContext;

    /**
     * ProductsDbDataProvider constructor.
     * @param ProductsSearchContextContract $searchContext
     * @param Product $eloquentModel
     * @param ModelToDTOConverter $converter
     */
    function __construct(Product $eloquentModel, ProductsSearchContextContract $searchContext, ModelToDTOConverter $converter)
    {
        parent::__construct($eloquentModel, $searchContext, $converter);
    }
}
