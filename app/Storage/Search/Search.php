<?php

namespace App\Storage\Search;

use App\Common\Contracts\Storage\BuilderBridgeContract;
use App\Common\Contracts\Storage\RepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Spatie\DataTransferObject\DataTransferObject;

class Search implements BuilderBridgeContract
{
    /**
     * @var Builder
     */
    protected Builder $builder;
    /**
     * @var RepositoryContract
     */
    protected $repository;

    /**
     * @param RepositoryContract $repository
     * @param Builder $builder
     * @return $this
     */
    function init(RepositoryContract $repository, Builder $builder) : BuilderBridgeContract
    {
        $this->repository = $repository;
        $this->builder = $builder;

        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function byId(int $id) : BuilderBridgeContract
    {
        $this->builder = $this->builder->where('id', $id);

        return $this;
    }

    /**
     * @param $relations
     * @return $this
     */
    public function with($relations) : BuilderBridgeContract
    {
        $this->builder = $this->builder->with($relations);

        return $this;
    }

    /**
     * @return DataTransferObject|null
     */
    public function first() : ?DataTransferObject
    {
        return $this->repository->first($this->builder);
    }

    /**
     * @param Builder $builder
     * @return DataTransferObject[]|null
     */
    function find(Builder $builder): ?array
    {
        return $this->repository->find($this->builder);
    }
}
