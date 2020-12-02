<?php

namespace App\Modules\Storage\Eloquent\DbDataProviders;

use App\Contracts\SearchContexts\ExchangeRatesSearchContextContract;
use App\Modules\Storage\Contracts\CrudWithSearchDbDataProviderContract;
use App\Modules\Storage\Eloquent\DbDataProviders\Extendable\CrudWithSearch;
use App\Modules\Storage\Eloquent\Models\ExchangeRate;
use App\Modules\Storage\Eloquent\ModelToDTOConverter;

class ExchangeRatesDbDataProvider extends CrudWithSearch implements CrudWithSearchDbDataProviderContract
{
    /**
     * @var ExchangeRate
     */
    protected $eloquentModel;

    /**
     * @var ExchangeRatesSearchContextContract
     */
    protected $searchContext;

    /**
     * ExchangeRatesDbDataProvider constructor.
     * @param ExchangeRatesSearchContextContract $searchContext
     * @param ExchangeRate $eloquentModel
     * @param ModelToDTOConverter $converter
     */
    function __construct(ExchangeRate $eloquentModel, ExchangeRatesSearchContextContract $searchContext, ModelToDTOConverter $converter)
    {
        parent::__construct($eloquentModel, $searchContext, $converter);
    }
}
