<?php

namespace App\Contracts\Search\Services;

use App\Models\DTO\ExchangeRateDTO;
use App\Modules\Search\Services\ExchangeRatesSearch;

interface ExchangeRatesSearchContract extends BaseSearchContract
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
     * @return ExchangeRatesSearchContract
     */
    public function byDate(string $date) : ExchangeRatesSearchContract;

    /**
     * @param int $currencyId
     * @return ExchangeRatesSearchContract
     */
    public function byCurrencyId(int $currencyId) : ExchangeRatesSearchContract;

    /**
     * @return ExchangeRatesSearch
     */
    public function withCurrencies() : ExchangeRatesSearch;
}
