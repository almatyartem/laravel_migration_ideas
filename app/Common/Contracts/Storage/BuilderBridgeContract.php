<?php

namespace App\Common\Contracts\Storage;

use Illuminate\Database\Eloquent\Builder;
use Spatie\DataTransferObject\DataTransferObject;

interface BuilderBridgeContract
{
    /**
     * @param RepositoryContract $repository
     * @param Builder $builder
     * @return BuilderBridgeContract
     */
    function init(RepositoryContract $repository, Builder $builder) : BuilderBridgeContract;

    /**
     * @return DataTransferObject|null
     */
    function first() : ?DataTransferObject;

    /**
     * @param Builder $builder
     * @return DataTransferObject[]|null
     */
    function find(Builder $builder) : ?array;

    /**
     * @param int $id
     * @return BuilderBridgeContract
     */
    public function byId(int $id) : BuilderBridgeContract;

    /**
     * @param $relations
     * @return BuilderBridgeContract
     */
    public function with($relations) : BuilderBridgeContract;
}
