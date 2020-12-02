<?php

namespace App\Modules\Storage\DataProviders;

use App\Contracts\DataProviders\ProductsDataProviderContract;
use App\Contracts\SearchContexts\BaseSearchContextContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\DataProviders\Extendable\BaseCrudDataProvider;
use App\Modules\Storage\Eloquent\DbDataProviders\ProductsDbDataProvider;
use App\Models\DTO\ProductDTO;
use App\Modules\Storage\SearchContexts\ProductsSearchContext;

class ProductsDataProvider extends BaseCrudDataProvider implements ProductsDataProviderContract
{
    /**
     * @var ProductsDbDataProvider
     */
    protected $dbProvider;

    /**
     * ProductsRepository constructor.
     * @param ProductsDbDataProvider $dbProvider
     */
    function __construct(ProductsDbDataProvider $dbProvider)
    {
        parent::__construct($dbProvider);
    }

    /**
     * @return ProductsSearchContext|BaseSearchContextContract
     */
    function search() : ProductsSearchContext
    {
        return parent::search();
    }

    /**
     * @param int $id
     * @return ProductDTO|DTOModel|null
     */
    public function read(int $id) : ?ProductDTO
    {
        return parent::read($id);
    }
}
