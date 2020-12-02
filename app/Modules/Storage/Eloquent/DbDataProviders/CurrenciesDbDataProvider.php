<?php

namespace App\Modules\Storage\Eloquent\DbDataProviders;

use App\Contracts\SearchContexts\CurrenciesSearchContextContract;
use App\Modules\Storage\Contracts\CrudWithSearchDbDataProviderContract;
use App\Modules\Storage\Eloquent\DbDataProviders\Extendable\CrudWithSearch;
use App\Modules\Storage\Eloquent\Models\Currency;
use App\Modules\Storage\Eloquent\ModelToDTOConverter;

class CurrenciesDbDataProvider extends CrudWithSearch implements CrudWithSearchDbDataProviderContract
{
    /**
     * @var Currency
     */
    protected $eloquentModel;

    /**
     * @var CurrenciesSearchContextContract
     */
    protected $searchContext;

    /**
     * CurrenciesDbDataProvider constructor.
     * @param CurrenciesSearchContextContract $searchContext
     * @param Currency $eloquentModel
     * @param ModelToDTOConverter $converter
     */
    function __construct(Currency $eloquentModel, CurrenciesSearchContextContract $searchContext, ModelToDTOConverter $converter)
    {
        parent::__construct($eloquentModel, $searchContext, $converter);
    }
}
