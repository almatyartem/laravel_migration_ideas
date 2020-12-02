<?php

namespace App\Modules\Storage\SearchContexts\Extendable;

use App\Contracts\SearchContexts\BaseSearchContextContract;
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
     * @param $result
     * @return mixed|null
     */
    public function finish($result)
    {
        return $this->resultHandler ? call_user_func($this->resultHandler, $result) : $result;
    }
}
