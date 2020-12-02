<?php

namespace App\Modules\Storage\Eloquent\DbDataProviders\Extendable;

use App\Contracts\SearchContexts\BaseSearchContextContract;
use App\Exceptions\ValidationException;
use App\Modules\Storage\Contracts\CrudWithSearchDbDataProviderContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\Eloquent\Models\Extendable\BaseEloquentModel;
use App\Modules\Storage\Eloquent\ModelToDTOConverter;

abstract class CrudWithSearch implements CrudWithSearchDbDataProviderContract
{
    /**
     * @var BaseEloquentModel
     */
    protected $eloquentModel;

    /**
     * @var ModelToDTOConverter
     */
    protected ModelToDTOConverter $converter;

    /**
     * @var BaseSearchContextContract
     */
    protected $searchContext;

    /**
     * BaseDbDataProvider constructor.
     * @param BaseEloquentModel $eloquentModel
     * @param BaseSearchContextContract $searchContext
     * @param ModelToDTOConverter $converter
     */
    function __construct(BaseEloquentModel $eloquentModel, BaseSearchContextContract $searchContext, ModelToDTOConverter $converter)
    {
        $this->eloquentModel = $eloquentModel;
        $this->converter = $converter;
        $this->searchContext = $searchContext;
        $this->searchContext->setResultHandler(function($result) {
            return $this->toDto($result);
        });
    }

    /**
     * @param int $id
     * @return DTOModel|null
     */
    public function read(int $id): ?DTOModel
    {
        return $this->toDto($this->eloquentModel->find($id));
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws ValidationException
     */
    public function update(int $id, array $data): bool
    {
        $this->eloquentModel->validate($data, false);

        return $this->eloquentModel->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return DTOModel|null
     * @throws ValidationException
     */
    public function create(array $data): ?DTOModel
    {
        $this->eloquentModel->validate($data, true);

        return $this->toDto($this->eloquentModel->create($data));
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->eloquentModel->destroy($id);
    }

    /**
     * @param $result
     * @return DTOModel|DTOModel[]|null
     */
    public function toDto($result)
    {
        return $this->converter->fromModelOrCollection($result);
    }

    /**
     * @return BaseSearchContextContract
     */
    public function getSearchContext() : BaseSearchContextContract
    {
        return clone $this->searchContext;
    }
}
