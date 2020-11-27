<?php

namespace App\Storage\Repositories\MultiCurrencies;

use App\Common\Contracts\Storage\RepositoryContract;
use App\Storage\Eloquent\MultiCurrencies\Currencies;
use App\Storage\Repositories\Repository;
use App\Storage\Search\MultiCurrencies\CurrenciesSearch;

class CurrenciesRepository extends Repository implements RepositoryContract
{
    /**
     * CurrenciesRepository constructor.
     * @param Currencies $model
     * @param CurrenciesSearch $search
     */
    function __construct(Currencies $model, CurrenciesSearch $search)
    {
        parent::__construct($model, $search);
    }
}
