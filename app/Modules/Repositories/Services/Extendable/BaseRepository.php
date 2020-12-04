<?php

namespace App\Modules\Repositories\Services\Extendable;

use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Contracts\DbDataProviders\DbDataProviderContract;
use App\Models\DTO\Extendable\DTOModel;

abstract class BaseRepository
{
    /**
     * @var DbDataProviderContract
     */
    protected $dbProvider;

    /**
     * BaseCRUDProvider constructor.
     * @param DbDataProviderContract $dbProvider
     */
    function __construct(DbDataProviderContract $dbProvider)
    {
        $this->dbProvider = $dbProvider;
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
     * @return DTOModel[]|null
     */
    public function all() : ?array
    {
        return $this->dbProvider->all();
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
     * @throws ValidationException|NotFoundException
     */
    protected function updateByArray(int $id, array $data) : bool
    {
        return $this->dbProvider->update($id, $data);
    }
}
