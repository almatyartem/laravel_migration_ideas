<?php

namespace App\Modules\Storage\SearchContexts;

use App\Contracts\Storage\Services\SearchContexts\CurrenciesSearchContextContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\Eloquent\Models\Currency;
use App\Models\DTO\CurrencyDTO;
use App\Modules\Storage\SearchContexts\Extendable\BaseSearchContext;

class CurrenciesSearchContext extends BaseSearchContext implements CurrenciesSearchContextContract
{
    /**
     * CurrenciesSearchContext constructor.
     * @param Currency $model
     */
    function __construct(Currency $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string $code
     * @return $this|CurrenciesSearchContextContract
     */
    public function byCode(string $code) : CurrenciesSearchContextContract
    {
        $this->builder = $this->builder->where('code', $code);

        return $this;
    }

    /**
     * @return CurrenciesSearchContextContract
     */
    public function withProducts() : CurrenciesSearchContextContract
    {
        $this->builder = $this->builder->with('products');

        return $this;
    }

    /**
     * @return CurrencyDTO|DTOModel|null
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
