<?php

namespace App\Modules\Storage\DataProviders\Extendable;

use App\Exceptions\ValidationException;
use App\Modules\Storage\Contracts\CrudWithSearchDbDataProviderContract;
use App\Contracts\SearchContexts\BaseSearchContextContract;
use App\Models\DTO\Extendable\DTOModel;

abstract class BaseCrudDataProvider
{
    /**
     * @var CrudWithSearchDbDataProviderContract
     */
    protected $dbProvider;

    /**
     * BaseCRUDProvider constructor.
     * @param CrudWithSearchDbDataProviderContract $dbProvider
     */
    function __construct(CrudWithSearchDbDataProviderContract $dbProvider)
    {
        $this->dbProvider = $dbProvider;
    }

    /**
     * @return BaseSearchContextContract
     */
    function search() : BaseSearchContextContract
    {
        return $this->dbProvider->getSearchContext();
    }

    /**
     * @param int $id
     * @return DTOModel|null
     */
    public function read(int $id) : ?DTOModel
    {
        return $this->dbProvider->read($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool
    {
        return $this->dbProvider->delete($id);
    }

    /**
     * @param array $data
     * @return DTOModel|null
     * @throws ValidationException
     */
    protected function createFromArray(array $data) : ?DTOModel
    {
        return $this->dbProvider->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws ValidationException
     */
    protected function updateByArray(int $id, array $data) : bool
    {
        return $this->dbProvider->update($id, $data);
    }
}
