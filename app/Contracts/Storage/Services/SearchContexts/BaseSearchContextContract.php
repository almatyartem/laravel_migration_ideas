<?php

namespace App\Contracts\Storage\Services\SearchContexts;

use App\Modules\Storage\SearchContexts\Extendable\BaseSearchContext;

interface BaseSearchContextContract
{
    /**
     * @return mixed|null
     */
    public function find();

    /**
     * @return mixed|null
     */
    public function first();

    /**
     * @param callable $resultHandler
     * @return mixed
     */
    public function setResultHandler(callable $resultHandler);

    /**
     * @param $groups
     * @return BaseSearchContextContract
     */
    public function groupBy($groups) : BaseSearchContextContract;

    /**
     * @param $columns
     * @param string $direction
     * @return BaseSearchContextContract
     */
    public function orderBy($columns, $direction = 'asc') : BaseSearchContextContract;

    /**
     * @param string $sql
     * @return BaseSearchContextContract
     */
    public function havingRaw(string $sql) : BaseSearchContextContract;

    /**
     * @param string $field
     * @param $value
     * @return BaseSearchContextContract
     */
    public function whereEqual(string $field, $value) : BaseSearchContextContract;

    /**
     * @param int $value
     * @return BaseSearchContextContract
     */
    public function limit(int $value) : BaseSearchContextContract;

    /**
     * @param $relations
     * @return BaseSearchContextContract
     */
    public function with($relations) : BaseSearchContextContract;
}
