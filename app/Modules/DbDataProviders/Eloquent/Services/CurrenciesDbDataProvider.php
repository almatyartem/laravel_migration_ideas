<?php

namespace App\Modules\DbDataProviders\Eloquent\Services;

use App\Contracts\DbDataProviders\Eloquent\CurrenciesEDBContract;
use App\Modules\DbDataProviders\Eloquent\Services\Extendable\EloquentDbDataProvider;
use App\Modules\DbDataProviders\Eloquent\Models\Currency;
use App\Modules\DbDataProviders\Eloquent\ModelToDTOConverter;

class CurrenciesDbDataProvider extends EloquentDbDataProvider implements CurrenciesEDBContract
{
    /**
     * @var Currency
     */
    protected $eloquentModel;

    /**
     * CurrenciesDbDataProvider constructor.
     * @param Currency $eloquentModel
     * @param ModelToDTOConverter $converter
     */
    function __construct(Currency $eloquentModel, ModelToDTOConverter $converter)
    {
        parent::__construct($eloquentModel, $converter);
    }
}
