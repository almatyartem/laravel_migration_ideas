<?php

namespace App\Modules\Storage\Eloquent\DbDataProviders;

use App\Contracts\SearchContexts\PricesSearchContextContract;
use App\Modules\Storage\Contracts\CrudWithSearchDbDataProviderContract;
use App\Modules\Storage\Eloquent\DbDataProviders\Extendable\CrudWithSearch;
use App\Modules\Storage\Eloquent\Models\Price;
use App\Modules\Storage\Eloquent\ModelToDTOConverter;

class PricesDbDataProvider extends CrudWithSearch implements CrudWithSearchDbDataProviderContract
{
    /**
     * @var Price
     */
    protected $eloquentModel;

    /**
     * @var PricesSearchContextContract
     */
    protected $searchContext;

    /**
     * PricesDbDataProvider constructor.
     * @param PricesSearchContextContract $searchContext
     * @param Price $eloquentModel
     * @param ModelToDTOConverter $converter
     */
    function __construct(Price $eloquentModel, PricesSearchContextContract $searchContext, ModelToDTOConverter $converter)
    {
        parent::__construct($eloquentModel, $searchContext, $converter);
    }
}
