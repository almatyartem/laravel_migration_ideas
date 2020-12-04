<?php

namespace App\Modules\MultiCurrencies\Services;

use App\Contracts\Storage\Services\DataProviders\CurrenciesDataProviderContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\CurrencyDTO;

class CurrenciesApi
{
    /**
     * @var CurrenciesDataProviderContract
     */
    protected CurrenciesDataProviderContract $currenciesDP;

    /**
     * CurrenciesApi constructor.
     * @param CurrenciesDataProviderContract $currenciesDP
     */
    function __construct(CurrenciesDataProviderContract $currenciesDP)
    {
        $this->currenciesDP = $currenciesDP;
    }

    /**
     * @return CurrencyDTO[]|null
     */
    public function getAllCurrencies() : ?array
    {
        return $this->currenciesDP->search()->find();
    }

    /**
     * @param int $currencyId
     * @param string $sign
     * @return bool
     * @throws ValidationException
     */
    public function setCurrencySign(int $currencyId, string $sign) : bool
    {
        return $this->currenciesDP->setSign($currencyId, $sign);
    }
}
