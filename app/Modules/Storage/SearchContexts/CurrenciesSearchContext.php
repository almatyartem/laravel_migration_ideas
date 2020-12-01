<?php

namespace App\Modules\Storage\SearchContexts;

use App\Contracts\ModelDTOContract;
use App\Contracts\SearchContextContract;
use App\Modules\Storage\DbDataProviders\Eloquent\Models\Currency;
use App\Modules\Storage\DbDataProviders\Eloquent\ModelToDTOConverter;
use App\Modules\Storage\Dto\CurrencyDTO;
use App\Modules\Storage\Repositories\CurrenciesRepository;

class CurrenciesSearchContext extends BaseSearchContext implements SearchContextContract
{
    /**
     * @var CurrenciesRepository
     */
    protected CurrenciesRepository $repository;

    /**
     * CurrenciesSearchContext constructor.
     * @param Currency $model
     * @param ModelToDTOConverter $converter
     */
    function __construct(Currency $model, ModelToDTOConverter $converter)
    {
        parent::__construct($model, $converter);
    }

    /**
     * @return CurrenciesSearchContext
     */
    public function withProducts() : CurrenciesSearchContext
    {
        $this->builder = $this->builder->with('products');

        return $this;
    }

    /**
     * @return CurrencyDTO|ModelDTOContract|null
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
}
