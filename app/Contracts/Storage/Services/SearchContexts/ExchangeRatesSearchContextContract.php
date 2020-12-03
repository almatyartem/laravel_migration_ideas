<?php

namespace App\Contracts\Storage\Services\SearchContexts;

use App\Models\DTO\ExchangeRateDTO;
use App\Modules\Storage\SearchContexts\ExchangeRatesSearchContext;

interface ExchangeRatesSearchContextContract extends BaseSearchContextContract
{
    /**
     * @return ExchangeRateDTO|null
     */
    public function first() : ?ExchangeRateDTO;

    /**
     * @return ExchangeRateDTO[]|null
     */
    public function find(): ?array;

    /**
     * @param string $date
     * @return ExchangeRatesSearchContextContract
     */
    public function byDate(string $date) : ExchangeRatesSearchContextContract;

    /**
     * @param int $currencyId
     * @return ExchangeRatesSearchContextContract
     */
    public function byCurrencyId(int $currencyId) : ExchangeRatesSearchContextContract;

    /**
     * @return ExchangeRatesSearchContext
     */
    public function withCurrencies() : ExchangeRatesSearchContext;
}
