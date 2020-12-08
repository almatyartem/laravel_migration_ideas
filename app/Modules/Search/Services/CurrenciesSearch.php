<?php

namespace App\Modules\Search\Services;

use App\Contracts\DbDataProviders\DbDataProviderContract;
use App\Contracts\Search\Services\CurrenciesSearchContract;
use App\Models\DTO\CurrencyDTO;
use App\Modules\Search\Services\Extendable\BaseSearch;

class CurrenciesSearch extends BaseSearch implements CurrenciesSearchContract
{
    /**
     * CurrenciesSearchContext constructor.
     * @param DbDataProviderContract $dbDataProvider
     */
    function __construct(DbDataProviderContract $dbDataProvider)
    {
        parent::__construct($dbDataProvider);
    }

    /**
     * @return CurrencyDTO|null
     */
    public function first() : ?CurrencyDTO
    {
        return parent::first();
    }

    /**
     * @return CurrencyDTO[]|null
     */
    public function find(): ?array
    {
        return parent::find();
    }

    /**
     * @param string $code
     * @return $this|CurrenciesSearchContract
     */
    public function byCode(string $code) : CurrenciesSearchContract
    {
        $this->builder = $this->builder->where('code', $code);

        return $this;
    }

    /**
     * @return CurrenciesSearchContract
     */
    public function withProducts() : CurrenciesSearchContract
    {
        $this->builder = $this->builder->with('products');

        return $this;
    }
}
