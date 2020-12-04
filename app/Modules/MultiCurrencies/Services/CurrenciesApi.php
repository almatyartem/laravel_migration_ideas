<?php

namespace App\Modules\MultiCurrencies\Services;

use App\Contracts\Repositories\Services\CurrenciesRepositoryContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\CurrencyDTO;

class CurrenciesApi
{
    /**
     * @var CurrenciesRepositoryContract
     */
    protected CurrenciesRepositoryContract $currenciesRepository;

    /**
     * CurrenciesApi constructor.
     * @param CurrenciesRepositoryContract $currenciesRepository
     */
    function __construct(CurrenciesRepositoryContract $currenciesRepository)
    {
        $this->currenciesRepository = $currenciesRepository;
    }

    /**
     * @return CurrencyDTO[]|null
     */
    public function getAllCurrencies() : ?array
    {
        return $this->currenciesRepository->all();
    }

    /**
     * @param int $currencyId
     * @param string $sign
     * @return bool
     * @throws ValidationException
     */
    public function setCurrencySign(int $currencyId, string $sign) : bool
    {
        return $this->currenciesRepository->setSign($currencyId, $sign);
    }
}
