<?php

namespace App\Storage\MultiCurrencies\Currencies;

use App\Contracts\Storage\DTOContract;
use App\Contracts\Storage\ModelToDTOConverterContract;
use App\Contracts\Storage\MultiCurrencies\Currencies\CurrenciesRepositoryContract;
use App\Contracts\Storage\MultiCurrencies\Currencies\CurrenciesSearchBuilderContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\DataTransferObject\DataTransferObject;

class CurrenciesRepository implements CurrenciesRepositoryContract
{
    /**
     * @var Model
     */
    protected Model $eloquentModel;

    /**
     * @var CurrenciesSearchBuilderContract
     */
    protected CurrenciesSearchBuilderContract $searchBuilder;

    /**
     * @var ModelToDTOConverterContract
     */
    protected ModelToDTOConverterContract $converter;

    /**
     * CurrenciesRepository constructor.
     * @param CurrenciesModel $model
     * @param CurrenciesSearchBuilderContract $searchBuilder
     * @param ModelToDTOConverterContract $converter
     */
    function __construct(CurrenciesModel $model, CurrenciesSearchBuilderContract $searchBuilder, ModelToDTOConverterContract $converter)
    {
        $this->eloquentModel = $model;
        $this->searchBuilder = $searchBuilder;
        $this->converter = $converter;
    }

    /**
     * @return CurrenciesSearchBuilderContract
     */
    function search() : CurrenciesSearchBuilderContract
    {
        $builder = clone $this->searchBuilder;

        return $builder->init($this, $this->eloquentModel->newQuery());
    }

    /**
     * @param Builder $builder
     * @return DataTransferObject[]|null
     */
    function find(Builder $builder): ?array
    {
        $result = $builder->get();

        return $result ? $this->converter->fromCollection($result) : null;
    }

    /**
     * @param Builder $builder
     * @return CurrenciesDTO|DTOContract|null
     */
    function first(Builder $builder): ?CurrenciesDTO
    {
        $result = $builder->first();

        return $result ? $this->converter->fromEloquent($result) : null;
    }

    function update(DataTransferObject $record): ?CurrenciesDTO
    {
        // TODO: Implement update() method.
    }

    function create(DataTransferObject $record): ?CurrenciesDTO
    {
        // TODO: Implement create() method.
    }

    function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}
