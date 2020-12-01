<?php

namespace App\Contracts;

interface DbDataProviderContract
{
    /**
     * @param int $id
     * @param array $data
     * @return ModelDTOContract|null
     */
    public function update(int $id, array $data) : ?ModelDTOContract;

    /**
     * @param int $id
     * @param array $data
     * @return ModelDTOContract|null
     */
    public function create(int $id, array $data) : ?ModelDTOContract;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool;

    /**
     * @param int $id
     * @return ModelDTOContract|null
     */
    public function get(int $id): ?ModelDTOContract;

    /**
     * @return SearchContextContract
     */
    public function getSearchContext() : SearchContextContract;
}
