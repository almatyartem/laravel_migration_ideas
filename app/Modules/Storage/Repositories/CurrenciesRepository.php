<?php

namespace App\Modules\Storage\Repositories;

use App\Contracts\ModelDTOContract;
use App\Contracts\RepositoryContract;
use App\Contracts\SearchContextContract;
use App\Modules\Storage\DbDataProviders\Eloquent\DataProviders\CurrenciesDbDataProvider;
use App\Modules\Storage\Dto\CurrencyDTO;
use App\Modules\Storage\SearchContexts\CurrenciesSearchContext;

class CurrenciesRepository implements RepositoryContract
{
    /**
     * @var CurrenciesDbDataProvider
     */
    protected CurrenciesDbDataProvider $dbProvider;

    /**
     * CurrenciesRepository constructor.
     * @param CurrenciesDbDataProvider $dbProvider
     */
    function __construct(CurrenciesDbDataProvider $dbProvider)
    {
        $this->dbProvider = $dbProvider;
    }

    /**
     * @return CurrenciesSearchContext|SearchContextContract
     */
    function search() : CurrenciesSearchContext
    {
        return $this->dbProvider->getSearchContext();
    }

    /**
     * @param int $id
     * @param array $data
     * @return CurrencyDTO|ModelDTOContract|null
     */
    public function update(int $id, array $data) : ?CurrencyDTO
    {
        return $this->dbProvider->update($id, $data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return CurrencyDTO|ModelDTOContract|null
     */
    public function create(int $id, array $data) : ?CurrencyDTO
    {
        return $this->dbProvider->create($id, $data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool
    {
        return $this->dbProvider->delete($id);
    }
}
