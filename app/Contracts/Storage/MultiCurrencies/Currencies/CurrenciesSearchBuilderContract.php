<?php

namespace App\Contracts\Storage\MultiCurrencies\Currencies;

use App\Storage\MultiCurrencies\Currencies\CurrenciesDTO;
use Illuminate\Database\Eloquent\Builder;

interface CurrenciesSearchBuilderContract
{
    /**
     * @param CurrenciesRepositoryContract $repository
     * @param Builder $builder
     * @return CurrenciesSearchBuilderContract
     */
    public function init(CurrenciesRepositoryContract $repository, Builder $builder) : CurrenciesSearchBuilderContract;

    /**
     * @return CurrenciesDTO|null
     */
    public function first() : ?CurrenciesDTO;

    /**
     * @param Builder $builder
     * @return CurrenciesDTO[]|null
     */
    public function find(Builder $builder) : ?array;

    /**
     * @param int $id
     * @return CurrenciesSearchBuilderContract
     */
    public function byId(int $id) : CurrenciesSearchBuilderContract;

    /**
     * @return CurrenciesSearchBuilderContract
     */
    public function withProducts() : CurrenciesSearchBuilderContract;
}
