<?php

namespace App\Modules\Search\Services;

use App\Contracts\DbDataProviders\DbDataProviderContract;
use App\Contracts\DbDataProviders\Entities\ExchangeRatesDBContract;
use App\Contracts\Search\Services\ExchangeRatesSearchContract;
use App\Models\DTO\Extendable\DTOModel;
use App\Models\DTO\ExchangeRateDTO;
use App\Modules\Search\Services\Extendable\BaseSearch;

class ExchangeRatesSearch extends BaseSearch implements ExchangeRatesSearchContract
{
    /**
     * ExchangeRatesSearchContext constructor.
     * @param DbDataProviderContract $dbDataProvider
     */
    function __construct(DbDataProviderContract $dbDataProvider)
    {
        parent::__construct($dbDataProvider);
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
    public function byDate(string $date) : ExchangeRatesSearch
    {
        return $this->whereEqual('date', $date);
    }

    /**
     * @param int $currencyId
     * @return $this
     */
    public function byCurrencyId(int $currencyId) : ExchangeRatesSearch
    {
        return $this->whereEqual('currency_id', $currencyId);
    }

    /**
     * @return ExchangeRatesSearch
     */
    public function withCurrencies() : ExchangeRatesSearch
    {
        return $this->with('currency');
    }
}
