<?php

namespace App\Contracts\Search\Services;

interface BaseSearchContract
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
     * @param $groups
     * @return BaseSearchContract
     */
    public function groupBy($groups) : BaseSearchContract;

    /**
     * @param $columns
     * @param string $direction
     * @return BaseSearchContract
     */
    public function orderBy($columns, $direction = 'asc') : BaseSearchContract;

    /**
     * @param string $field
     * @param $value
     * @return BaseSearchContract
     */
    public function whereEqual(string $field, $value) : BaseSearchContract;

    /**
     * @param int $value
     * @return BaseSearchContract
     */
    public function limit(int $value) : BaseSearchContract;

    /**
     * @param $relations
     * @return BaseSearchContract
     */
    public function with($relations) : BaseSearchContract;
}
