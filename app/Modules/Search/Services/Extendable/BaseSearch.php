<?php

namespace App\Modules\Search\Services\Extendable;

use App\Contracts\DbDataProviders\QueryBuilderContract;
use App\Contracts\Search\Services\BaseSearchContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Contracts\DbDataProviders\DbDataProviderContract;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseSearch implements BaseSearchContract
{
    /**
     * @var QueryBuilderContract|Builder
     */
    protected $builder;

    /**
     * @var DbDataProviderContract
     */
    protected $dbDataProvider;

    /**
     * BaseSearchContext constructor.
     * @param DbDataProviderContract $dbDataProvider
     */
    function __construct(DbDataProviderContract $dbDataProvider)
    {
        $this->dbDataProvider = $dbDataProvider;
        $this->refresh();
    }

    /**
     * @return $this
     */
    public function refresh()
    {
        $this->builder = $this->dbDataProvider->getBuilder();

        return $this;
    }

    /**
     * @return DTOModel|null
     */
    public function first()
    {
        return $this->dbDataProvider->first($this->builder);
    }

    /**
     * @return DTOModel[]|null
     */
    public function find()
    {
        return $this->dbDataProvider->get($this->builder);
    }

    /**
     * @param $groups
     * @return $this|BaseSearchContract
     */
    public function groupBy($groups) : BaseSearchContract
    {
        $this->builder = $this->builder->groupBy($groups);

        return $this;
    }

    /**
     * @param $columns
     * @param string $direction
     * @return $this|BaseSearchContract
     */
    public function orderBy($columns, $direction = 'asc') : BaseSearchContract
    {
        $this->builder = $this->builder->orderBy($columns, $direction);

        return $this;
    }

    /**
     * @param string $field
     * @param $value
     * @return $this|BaseSearchContract
     */
    public function whereEqual(string $field, $value) : BaseSearchContract
    {
        $this->builder->where($field, $value);

        return $this;
    }

    /**
     * @param int $value
     * @return $this|BaseSearchContract
     */
    public function limit(int $value) : BaseSearchContract
    {
        $this->builder->limit($value);

        return $this;
    }

    /**
     * @param $relations
     * @return $this|BaseSearchContract
     */
    public function with($relations) : BaseSearchContract
    {
        $this->builder->with($relations);

        return $this;
    }
}
