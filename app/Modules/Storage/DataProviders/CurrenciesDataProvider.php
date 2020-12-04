<?php

namespace App\Modules\Storage\DataProviders;

use App\Contracts\Storage\Services\DataProviders\CurrenciesDataProviderContract;
use App\Contracts\Storage\Services\SearchContexts\BaseSearchContextContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\DataProviders\Extendable\BaseCrudDataProvider;
use App\Modules\Storage\Eloquent\DbDataProviders\CurrenciesDbDataProvider;
use App\Models\DTO\CurrencyDTO;
use App\Modules\Storage\SearchContexts\CurrenciesSearchContext;

class CurrenciesDataProvider extends BaseCrudDataProvider implements CurrenciesDataProviderContract
{
    /**
     * @var CurrenciesDbDataProvider
     */
    protected $dbProvider;

    /**
     * CurrenciesRepository constructor.
     * @param CurrenciesDbDataProvider $dbProvider
     */
    function __construct(CurrenciesDbDataProvider $dbProvider)
    {
        parent::__construct($dbProvider);
    }

    /**
     * @return CurrenciesSearchContext|BaseSearchContextContract
     */
    function search() : CurrenciesSearchContext
    {
        return parent::search();
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
     * @param int $id
     * @param string $sign
     * @return bool
     * @throws ValidationException
     */
    public function setSign(int $id, string $sign) : bool
    {
        return $this->updateByArray($id, [
            'sign' => $sign
        ]);
    }
}
