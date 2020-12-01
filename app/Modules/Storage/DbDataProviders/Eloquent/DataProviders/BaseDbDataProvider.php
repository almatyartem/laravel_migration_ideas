<?php

namespace App\Modules\Storage\DbDataProviders\Eloquent\DataProviders;

use App\Contracts\DbDataProviderContract;
use App\Contracts\ModelDTOContract;
use App\Contracts\SearchContextContract;
use App\Modules\Storage\DbDataProviders\Eloquent\ModelToDTOConverter;
use Illuminate\Database\Eloquent\Model;

abstract class BaseDbDataProvider implements DbDataProviderContract
{
    /**
     * @var Model
     */
    protected $eloquentModel;

    /**
     * @var SearchContextContract
     */
    protected $searchContext;

    /**
     * BaseDbProvider constructor.
     * @param SearchContextContract $searchContext
     * @param Model $eloquentModel
     */
    function __construct(SearchContextContract $searchContext, Model $eloquentModel)
    {
        $this->eloquentModel = $eloquentModel;
        $this->searchContext = $searchContext;
    }

    public function get(int $id): ?ModelDTOContract
    {
        return $this->getSearchContext()->byId($id)->first();
    }

    function update(int $id, array $data): ?ModelDTOContract
    {
        // TODO: Implement create() method.
    }

    function create(int $id, array $data): ?ModelDTOContract
    {
        // TODO: Implement create() method.
    }

    function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return SearchContextContract
     */
    public function getSearchContext() : SearchContextContract
    {
        return clone $this->searchContext;
    }
}
