<?php

namespace App\Modules\Storage\SearchContexts;

use App\Contracts\Storage\Services\SearchContexts\ExchangeRatesSearchContextContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\Eloquent\Models\ExchangeRate;
use App\Models\DTO\ExchangeRateDTO;
use App\Modules\Storage\SearchContexts\Extendable\BaseSearchContext;

class ExchangeRatesSearchContext extends BaseSearchContext implements ExchangeRatesSearchContextContract
{
    /**
     * ExchangeRatesSearchContext constructor.
     * @param ExchangeRate $model
     */
    function __construct(ExchangeRate $model)
    {
        parent::__construct($model);
    }

    /**
     * @return ExchangeRateDTO|DTOModel|null
     */
    public function first() : ?ExchangeRateDTO
    {
        return parent::first();
    }

    /**
     * @return ExchangeRateDTO[]|null
     */
    public function find(): ?array
    {
        return parent::find();
    }

    /**
     * @param string $date
     * @return $this
     */
    public function byDate(string $date) : ExchangeRatesSearchContext
    {
        return $this->whereEqual('date', $date);
    }

    /**
     * @param int $currencyId
     * @return $this
     */
    public function byCurrencyId(int $currencyId) : ExchangeRatesSearchContext
    {
        return $this->whereEqual('currency_id', $currencyId);
    }

    /**
     * @return ExchangeRatesSearchContext
     */
    public function withCurrencies() : ExchangeRatesSearchContext
    {
        return $this->with('currency');
    }
}
