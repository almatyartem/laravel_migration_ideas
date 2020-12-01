<?php

namespace App\Contracts;

interface RepositoryContract
{
    /**
     * @return SearchContextContract
     */
    public function search() : SearchContextContract;

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
}
