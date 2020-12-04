<?php

namespace App\Modules\DbDataProviders\Eloquent\Services;

use App\Contracts\DbDataProviders\Eloquent\ExchangeRatesEDBContract;
use App\Modules\DbDataProviders\Eloquent\Services\Extendable\EloquentDbDataProvider;
use App\Modules\DbDataProviders\Eloquent\Models\ExchangeRate;
use App\Modules\DbDataProviders\Eloquent\ModelToDTOConverter;

class ExchangeRatesDbDataProvider extends EloquentDbDataProvider implements ExchangeRatesEDBContract
{
    /**
     * @var ExchangeRate
     */
    protected $eloquentModel;

    /**
     * ExchangeRatesDbDataProvider constructor.
     * @param ExchangeRate $eloquentModel
     * @param ModelToDTOConverter $converter
     */
    function __construct(ExchangeRate $eloquentModel, ModelToDTOConverter $converter)
    {
        parent::__construct($eloquentModel, $converter);
    }
}
