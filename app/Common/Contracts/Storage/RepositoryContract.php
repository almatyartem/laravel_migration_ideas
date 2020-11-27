<?php

namespace App\Common\Contracts\Storage;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\DataTransferObject;

interface RepositoryContract
{
    /**
     * @return BuilderBridgeContract
     */
    function search() : BuilderBridgeContract;

    /**
     * @param Builder $builder
     * @return DataTransferObject[]|null
     */
    function find(Builder $builder) : ?array;

    /**
     * @param Builder $builder
     * @return DataTransferObject|null
     */
    function first(Builder $builder) : ?DataTransferObject;

    /**
     * @param DataTransferObject $record
     * @return DataTransferObject|null
     */
    function update(DataTransferObject $record) : ?DataTransferObject;

    /**
     * @param DataTransferObject $record
     * @return DataTransferObject|null
     */
    function create(DataTransferObject $record) : ?DataTransferObject;

    /**
     * @param int $id
     * @return bool
     */
    function delete(int $id) : bool;
}
