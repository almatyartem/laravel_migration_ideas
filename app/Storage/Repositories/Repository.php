<?php

namespace App\Storage\Repositories;

use App\Common\Contracts\Storage\BuilderBridgeContract;
use App\Common\Contracts\Storage\RepositoryContract;
use App\Storage\EloquentToDTOConverter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\DataTransferObject\DataTransferObject;

abstract class Repository implements RepositoryContract
{
    /**
     * @var Model
     */
    protected Model $eloquentModel;

    /**
     * @var BuilderBridgeContract
     */
    protected BuilderBridgeContract $search;

    /**
     * BaseRepository constructor.
     * @param Model $model
     * @param BuilderBridgeContract $search
     */
    function __construct(Model $model, BuilderBridgeContract $search)
    {
        $this->eloquentModel = $model;
        $this->search = $search;
    }

    /**
     * @return BuilderBridgeContract
     */
    function search(): BuilderBridgeContract
    {
        return $this->search->init($this, $this->eloquentModel->newQuery());
    }

    /**
     * @param Builder $builder
     * @return DataTransferObject[]|null
     */
    function find(Builder $builder): ?array
    {
        $result = $builder->get();

        return $result ? EloquentToDTOConverter::fromCollection($result) : null;
    }

    /**
     * @param Builder $builder
     * @return DataTransferObject|null
     */
    function first(Builder $builder): ?DataTransferObject
    {
        $result = $builder->first();

        return $result ? EloquentToDTOConverter::fromEloquent($result) : null;
    }

    function update(DataTransferObject $record): ?DataTransferObject
    {
        // TODO: Implement update() method.
    }

    function create(DataTransferObject $record): ?DataTransferObject
    {
        // TODO: Implement create() method.
    }

    function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}
