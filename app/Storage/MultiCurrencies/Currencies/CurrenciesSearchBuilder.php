<?php

namespace App\Storage\MultiCurrencies\Currencies;

use App\Contracts\Storage\DTOContract;
use App\Contracts\Storage\MultiCurrencies\Currencies\CurrenciesRepositoryContract;
use App\Contracts\Storage\MultiCurrencies\Currencies\CurrenciesSearchBuilderContract;
use Illuminate\Database\Eloquent\Builder;

class CurrenciesSearchBuilder implements CurrenciesSearchBuilderContract
{
    /**
     * @var Builder
     */
    protected Builder $builder;
    /**
     * @var CurrenciesRepositoryContract
     */
    protected CurrenciesRepositoryContract $repository;

    /**
     * @param CurrenciesRepositoryContract $repository
     * @param Builder $builder
     * @return $this
     */
    public function init(CurrenciesRepositoryContract $repository, Builder $builder) : CurrenciesSearchBuilder
    {
        $this->repository = $repository;
        $this->builder = $builder;

        return $this;
    }

    /**
     * @return CurrenciesSearchBuilderContract
     */
    public function withProducts() : CurrenciesSearchBuilderContract
    {
        $this->builder = $this->builder->with('products');

        return $this;
    }

    /**
     * @param int $id
     * @return CurrenciesSearchBuilderContract
     */
    public function byId(int $id) : CurrenciesSearchBuilderContract
    {
        $this->builder = $this->builder->where('id', $id);

        return $this;
    }

    /**
     * @param $relations
     * @return $this
     */
    public function with($relations) : CurrenciesSearchBuilder
    {
        $this->builder = $this->builder->with($relations);

        return $this;
    }

    /**
     * @return CurrenciesDTO|DTOContract|null
     */
    public function first() : ?CurrenciesDTO
    {
        return $this->repository->first($this->builder);
    }

    /**
     * @param Builder $builder
     * @return CurrenciesDTO[]|null
     */
    public function find(Builder $builder): ?array
    {
        return $this->repository->find($this->builder);
    }
}
