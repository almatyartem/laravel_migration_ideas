<?php

namespace App\Contracts\Repositories\Services;

use App\Contracts\Search\Services\ExchangeRatesSearchContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\ExchangeRateDTO;

interface ExchangeRatesRepositoryContract
{
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
