<?php
namespace App\Modules\DbDataProviders\Eloquent;

use App\Contracts\QueryBuilderContract;
use Illuminate\Database\Eloquent\Builder;

class ExtendedBuilder extends Builder implements QueryBuilderContract
{
    /**
     * @param \Closure|\Illuminate\Database\Query\Builder|\Illuminate\Database\Query\Expression|string $column
     * @param string $direction
     * @return ExtendedBuilder
     */
    public function orderBy($column, $direction = 'asc')
    {
        return parent::orderBy($column, $direction);
    }

    /**
     * @param mixed ...$groups
     * @return ExtendedBuilder
     */
    public function groupBy(...$groups)
    {
        return parent::groupBy(...$groups);
    }

    /**
     * @param array|\Closure|\Illuminate\Database\Query\Expression|string $column
     * @param null $operator
     * @param null $value
     * @param string $boolean
     * @return ExtendedBuilder
     */
    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        return parent::where($column, $operator, $value, $boolean);
    }

    /**
     * @param int $value
     * @return ExtendedBuilder
     */
    public function limit($value)
    {
        return parent::limit($value);
    }

    /**
     * @param array|string $relations
     * @param null $callback
     * @return ExtendedBuilder
     */
    public function with($relations, $callback = null)
    {
        return parent::with($relations, $callback);
    }

    /**
     * @param string[] $columns
     * @return ExtendedBuilder
     */
    public function select($columns = ['*'])
    {
        return parent::select($columns);
    }
}
