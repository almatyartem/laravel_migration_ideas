<?php

namespace App\Modules\Storage\DataProviders;

use App\Contracts\DataProviders\PricesDataProviderContract;
use App\Contracts\SearchContexts\BaseSearchContextContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\DataProviders\Extendable\BaseCrudDataProvider;
use App\Modules\Storage\Eloquent\DbDataProviders\PricesDbDataProvider;
use App\Models\DTO\PriceDTO;
use App\Modules\Storage\SearchContexts\PricesSearchContext;

class PricesDataProvider extends BaseCrudDataProvider implements PricesDataProviderContract
{
    /**
     * @var PricesDbDataProvider
     */
    protected $dbProvider;

    /**
     * PricesRepository constructor.
     * @param PricesDbDataProvider $dbProvider
     */
    function __construct(PricesDbDataProvider $dbProvider)
    {
        parent::__construct($dbProvider);
    }

    /**
     * @return PricesSearchContext|BaseSearchContextContract
     */
    function search() : PricesSearchContext
    {
        return parent::search();
    }

    /**
     * @param int $id
     * @return PriceDTO|DTOModel|null
     */
    public function read(int $id) : ?PriceDTO
    {
        return parent::read($id);
    }
}
