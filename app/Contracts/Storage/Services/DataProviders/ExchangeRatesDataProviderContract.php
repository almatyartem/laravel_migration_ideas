<?php

namespace App\Contracts\Storage\Services\DataProviders;

use App\Contracts\Storage\Services\SearchContexts\ExchangeRatesSearchContextContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\ExchangeRateDTO;

interface ExchangeRatesDataProviderContract
{
    /**
     * @return ExchangeRatesSearchContextContract
     */
    function search() : ExchangeRatesSearchContextContract;

    /**
     * @param int $id
     * @return ExchangeRateDTO|null
     */
    public function read(int $id) : ?ExchangeRateDTO;

    /**
     * @param int $currencyId
     * @param float $rateToUsd
     * @param string $date
     * @return mixed
     * @throws ValidationException
     */
    public function add(int $currencyId, float $rateToUsd, string $date) : ?ExchangeRateDTO;
}
