<?php

namespace App\Contracts\Services;

use App\Exceptions\ValidationException;

interface MultiCurrenciesServiceContract
{
    /**
     * @param string $currencyCode
     * @param float $usdAmount
     * @return string|null
     */
    public function getFormattedValueInCurrency(string $currencyCode, float $usdAmount) : ?string;

    /**
     * @param int $currencyId
     * @param string $sign
     * @return bool
     * @throws ValidationException
     */
    public function setCurrencySign(int $currencyId, string $sign) : bool;
}
