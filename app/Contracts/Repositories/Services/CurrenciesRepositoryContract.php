<?php

namespace App\Contracts\Repositories\Services;

use App\Exceptions\ValidationException;
use App\Models\DTO\Extendable\DTOModel;
use App\Models\DTO\CurrencyDTO;

interface CurrenciesRepositoryContract
{
    /**
     * @param string $code
     * @param string|null $sign
     * @return CurrencyDTO|null
     * @throws ValidationException
     */
    public function create(string $code, string $sign = null) : ?CurrencyDTO;

    /**
     * @param int $id
     * @return DTOModel|null
     */
    public function read(int $id) : ?DTOModel;

    /**
     * @return DTOModel[]|null
     */
    public function all() : ?array;

    /**
     * @param int $id
     * @param string $sign
     * @return bool
     * @throws ValidationException
     */
    public function setSign(int $id, string $sign) : bool;
}
