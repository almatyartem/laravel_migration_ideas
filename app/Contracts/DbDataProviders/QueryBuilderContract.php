<?php

namespace App\Contracts\DbDataProviders;

interface QueryBuilderContract
{
    public function orderBy($column, $direction = 'asc');

    public function groupBy(...$groups);

    public function where($column, $operator = null, $value = null, $boolean = 'and');

    public function limit($value);

    public function with($relations, $callback = null);

    public function select($columns = ['*']);
}
