<?php

namespace App\Contracts\Storage\MultiCurrencies\Currencies;

use App\Storage\MultiCurrencies\Currencies\CurrenciesDTO;
use Illuminate\Database\Eloquent\Builder;

interface CurrenciesRepositoryContract
{
    /**
     * @return CurrenciesSearchBuilderContract
     */
    function search() : CurrenciesSearchBuilderContract;

    /**
     * @param Builder $builder
     * @return CurrenciesDTO[]|null
     */
    function find(Builder $builder) : ?array;

    /**
     * @param Builder $builder
     * @return CurrenciesDTO|null
     */
    function first(Builder $builder) : ?CurrenciesDTO;

    /**
     * @param CurrenciesDTO $record
     * @return CurrenciesDTO|null
     */
    function update(CurrenciesDTO $record) : ?CurrenciesDTO;

    /**
     * @param CurrenciesDTO $record
     * @return CurrenciesDTO|null
     */
    function create(CurrenciesDTO $record) : ?CurrenciesDTO;

    /**
     * @param int $id
     * @return bool
     */
    function delete(int $id) : bool;
}
