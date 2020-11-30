<?php

namespace App\Contracts\Storage;

interface DTOContract
{
    /**
     * @return array
     */
    public function all(): array;
}
