<?php

namespace App\Modules\Storage\DbDataProviders\Eloquent\DataProviders;

use App\Contracts\DbDataProviderContract;
use App\Modules\Storage\DbDataProviders\Eloquent\Models\Currency;
use App\Modules\Storage\SearchContexts\CurrenciesSearchContext;

class CurrenciesDbDataProvider extends BaseDbDataProvider implements DbDataProviderContract
{
    /**
     * @var Currency
     */
    protected $eloquentModel;

    /**
     * @var CurrenciesSearchContext
     */
    protected $searchContext;

    /**
     * CurrenciesDbProvider constructor.
     * @param CurrenciesSearchContext $searchContext
     * @param Currency $eloquentModel
     */
    function __construct(CurrenciesSearchContext $searchContext, Currency $eloquentModel)
    {
        parent::__construct($searchContext, $eloquentModel);
    }
}
