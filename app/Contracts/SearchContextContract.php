<?php

namespace App\Contracts;

interface SearchContextContract
{
    /**
     * @param int $id
     * @return SearchContextContract
     */
    public function byId(int $id) : SearchContextContract;

    /**
     * @return ModelDTOContract[]|null
     */
    function find() : ?array;

    /**
     * @return ModelDTOContract[]|null
     */
    function first() : ?ModelDTOContract;

    /**
     * @param $result
     * @return ModelDTOContract[]|ModelDTOContract|null
     */
    public function convert($result);
}
