<?php

namespace App\Modules\Repositories\Services;

use App\Contracts\DbDataProviders\DbDataProviderContract;
use App\Contracts\Repositories\Services\CurrenciesRepositoryContract;
use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Repositories\Services\Extendable\BaseRepository;
use App\Models\DTO\CurrencyDTO;

class CurrenciesRepository extends BaseRepository implements CurrenciesRepositoryContract
{
    /**
     * @var DbDataProviderContract
     */
    protected $dbProvider;

    /**
     * CurrenciesRepository constructor.
     * @param DbDataProviderContract $dbProvider
     */
    function __construct(DbDataProviderContract $dbProvider)
    {
        parent::__construct($dbProvider);
    }

    /**
     * @param string $code
     * @param string|null $sign
     * @return CurrencyDTO|DTOModel|null
     * @throws ValidationException
     */
    public function create(string $code, string $sign = null) : ?CurrencyDTO
    {
        return $this->createFromArray([
            'code' => $code,
            'sign' => $sign
        ]);
    }

    /**
     * @param int $id
     * @return CurrencyDTO|DTOModel|null
     */
    public function read(int $id) : ?CurrencyDTO
    {
        return parent::read($id);
    }

    /**
     * @return CurrencyDTO[]|null
     */
    public function all() : ?array
    {
        return parent::all();
    }

    /**
     * @param int $id
     * @param string $sign
     * @return bool
     * @throws ValidationException|NotFoundException
     */
    public function setSign(int $id, string $sign) : bool
    {
        return $this->updateByArray($id, [
            'sign' => $sign
        ]);
    }
}
