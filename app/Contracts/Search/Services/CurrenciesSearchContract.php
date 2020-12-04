<?php

namespace App\Contracts\Search\Services;

use App\Models\DTO\CurrencyDTO;

interface CurrenciesSearchContract extends BaseSearchContract
{
    /**
     * @return CurrenciesSearchContract
     */
    public function withProducts() : CurrenciesSearchContract;

    /**
     * @param string $code
     * @return CurrenciesSearchContract
     */
    public function byCode(string $code) : CurrenciesSearchContract;

    /**
     * @return CurrencyDTO|null
     */
    public function first() : ?CurrencyDTO;

    /**
     * @return CurrencyDTO[]|null
     */
    public function find(): ?array;
}
