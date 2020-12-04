<?php

namespace App\Modules\DbDataProviders\Eloquent\Services\Extendable;

use App\Contracts\QueryBuilderContract;
use App\Contracts\Search\Services\BaseSearchContract;
use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Contracts\DbDataProviders\DbDataProviderContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\DbDataProviders\Eloquent\Models\Extendable\BaseEloquentModel;
use App\Modules\DbDataProviders\Eloquent\ModelToDTOConverter;
use Illuminate\Database\Eloquent\Builder;

abstract class EloquentDbDataProvider implements DbDataProviderContract
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
     * BaseDbDataProvider constructor.
     * @param BaseEloquentModel $eloquentModel
     * @param ModelToDTOConverter $converter
     */
    function __construct(BaseEloquentModel $eloquentModel, ModelToDTOConverter $converter)
    {
        $this->eloquentModel = $eloquentModel;
        $this->converter = $converter;
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
     * @return DTOModel[]|null
     */
    public function all(): ?array
    {
        return $this->toDto($this->eloquentModel->all());
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws NotFoundException
     * @throws ValidationException
     */
    public function update(int $id, array $data): bool
    {
        $this->eloquentModel->validate($data, false);
        $record = $this->eloquentModel->find($id);

        if(!$record){
            throw new NotFoundException();
        }

        return $record->update($data);
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
     * @return QueryBuilderContract|Builder
     */
    public function getBuilder()
    {
        return $this->eloquentModel->newQuery();
    }

    /**
     * @param QueryBuilderContract $builder
     * @return DTOModel[]|null
     */
    public function get($builder) : ?array
    {
        return $this->toDto($builder->get());
    }

    /**
     * @param QueryBuilderContract $builder
     * @return DTOModel|null
     */
    public function first($builder) : ?DTOModel
    {
        return $this->toDto($builder->first());
    }

    /**
     * @param $result
     * @return DTOModel|DTOModel[]|null
     */
    protected function toDto($result)
    {
        return $this->converter->fromModelOrCollection($result);
    }
}
