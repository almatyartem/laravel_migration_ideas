<?php

namespace App\Modules\Storage\DataProviders;

use App\Contracts\Storage\Services\DataProviders\ProductsDataProviderContract;
use App\Contracts\Storage\Services\SearchContexts\BaseSearchContextContract;
use App\Exceptions\ValidationException;
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

    /**
     * @param string $code
     * @param string $title
     * @param float $usdPrice
     * @return ProductDTO|DTOModel|null
     * @throws ValidationException
     */
    public function create(string $code, string $title, float $usdPrice) : ?ProductDTO
    {
        return parent::createFromArray([
            'code' => $code,
            'title' => $title,
            'usd_price' => $usdPrice
        ]);
    }

    /**
     * @param int $id
     * @param float $usdPrice
     * @return bool
     * @throws ValidationException
     */
    public function updatePrice(int $id, float $usdPrice)
    {
        return $this->updateByArray($id, [
            'usd_price' => $usdPrice
        ]);
    }
}
