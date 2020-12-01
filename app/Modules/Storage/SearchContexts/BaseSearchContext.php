<?php

namespace App\Modules\Storage\SearchContexts;

use App\Contracts\DbDataProviderContract;
use App\Contracts\ModelDTOContract;
use App\Contracts\SearchContextContract;
use App\Modules\Storage\DbDataProviders\Eloquent\ModelToDTOConverter;
use App\Modules\Storage\Repositories\CurrenciesRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseSearchContext implements SearchContextContract
{
    /**
     * @var Builder
     */
    protected Builder $builder;

    /**
     * @var ModelToDTOConverter
     */
    protected ModelToDTOConverter $converter;

    /**
     * BaseSearchContext constructor.
     * @param Model $model
     * @param ModelToDTOConverter $converter
     */
    function __construct(Model $model, ModelToDTOConverter $converter)
    {
        $this->builder = $model->newQuery();
        $this->converter = $converter;
    }

    /**
     * @param int $id
     * @return SearchContextContract
     */
    public function byId(int $id) : SearchContextContract
    {
        $this->builder = $this->builder->where('id', $id);

        return $this;
    }

    /**
     * @return ModelDTOContract|null
     */
    public function first() : ?ModelDTOContract
    {
        $result = $this->builder->first();

        return $this->convert($result);
    }

    /**
     * @return ModelDTOContract[]|null
     */
    public function find(): ?array
    {
        $result = $this->builder->get();

        return $this->convert($result);
    }

    /**
     * @param $result
     * @return mixed|null
     */
    public function convert($result)
    {
        return $this->converter->fromModelOrCollection($result);
    }
}
