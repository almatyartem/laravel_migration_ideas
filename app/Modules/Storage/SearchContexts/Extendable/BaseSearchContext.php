<?php

namespace App\Modules\Storage\SearchContexts\Extendable;

use App\Contracts\Storage\Services\SearchContexts\BaseSearchContextContract;
use App\Modules\Storage\Eloquent\Models\Extendable\BaseEloquentModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseSearchContext implements BaseSearchContextContract
{
    /**
     * @var Builder
     */
    protected Builder $builder;

    /**
     * @var callable
     */
    protected $resultHandler;

    protected $model;

    /**
     * BaseSearchContext constructor.
     * @param BaseEloquentModel $model
     */
    function __construct(BaseEloquentModel $model)
    {
        $this->model = $model;
        $this->builder = $this->model->newQuery();
    }

    function __clone()
    {
        $this->builder = $this->model->newQuery();
    }

    /**
     * @param callable $resultHandler
     */
    public function setResultHandler(callable $resultHandler)
    {
        $this->resultHandler = $resultHandler;
    }

    /**
     * @return mixed|null
     */
    public function first()
    {
        $result = $this->builder->first();

        return $this->finish($result);
    }

    /**
     * @return mixed|null
     */
    public function find()
    {
        $result = $this->builder->get();

        return $this->finish($result);
    }

    /**
     * @param $groups
     * @return $this|BaseSearchContextContract
     */
    public function groupBy($groups) : BaseSearchContextContract
    {
        $this->builder = $this->builder->groupBy($groups);

        return $this;
    }

    /**
     * @param $columns
     * @param string $direction
     * @return $this|BaseSearchContextContract
     */
    public function orderBy($columns, $direction = 'asc') : BaseSearchContextContract
    {
        $this->builder = $this->builder->orderBy($columns, $direction);

        return $this;
    }

    /**
     * @param string $sql
     * @return $this|BaseSearchContextContract
     */
    public function havingRaw(string $sql) : BaseSearchContextContract
    {
        $this->builder = $this->builder->havingRaw($sql);

        return $this;
    }

    /**
     * @param string $field
     * @param $value
     * @return $this|BaseSearchContextContract
     */
    public function whereEqual(string $field, $value) : BaseSearchContextContract
    {
        $this->builder->where($field, $value);

        return $this;
    }

    /**
     * @param int $value
     * @return $this|BaseSearchContextContract
     */
    public function limit(int $value) : BaseSearchContextContract
    {
        $this->builder->limit($value);

        return $this;
    }

    /**
     * @param $relations
     * @return $this|BaseSearchContextContract
     */
    public function with($relations) : BaseSearchContextContract
    {
        $this->builder->with($relations);

        return $this;
    }

    /**
     * @param $result
     * @return mixed|null
     */
    protected function finish($result)
    {
        return $this->resultHandler ? call_user_func($this->resultHandler, $result) : $result;
    }
}
