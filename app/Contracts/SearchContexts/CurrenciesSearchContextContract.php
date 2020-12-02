<?php

namespace App\Contracts\SearchContexts;

use App\Models\DTO\CurrencyDTO;

interface CurrenciesSearchContextContract extends BaseSearchContextContract
{
    /**
     * @return CurrenciesSearchContextContract
     */
    public function withProducts() : CurrenciesSearchContextContract;

    /**
     * @param string $code
     * @return CurrenciesSearchContextContract
     */
    public function byCode(string $code) : CurrenciesSearchContextContract;

    /**
     * @return CurrencyDTO|null
     */
    public function first() : ?CurrencyDTO;

    /**
     * @return CurrencyDTO[]|null
     */
    public function find(): ?array;
}
