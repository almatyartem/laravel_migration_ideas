<?php

namespace App\Modules\Storage\Contracts;

use App\Contracts\SearchContexts\BaseSearchContextContract;
use App\Exceptions\ValidationException;
use App\Models\DTO\Extendable\DTOModel;

interface CrudWithSearchDbDataProviderContract
{
    /**
     * @param array $data
     * @return DTOModel|null
     * @throws ValidationException
     */
    public function create(array $data) : ?DTOModel;

    /**
     * @param int $id
     * @return DTOModel|null
     */
    public function read(int $id): ?DTOModel;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws ValidationException
     */
    public function update(int $id, array $data) : bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool;

    /**
     * @return BaseSearchContextContract
     */
    public function getSearchContext() : BaseSearchContextContract;
}
