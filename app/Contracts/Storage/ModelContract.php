<?php

namespace App\Contracts\Storage;

interface ModelContract
{
    /**
     * @return string
     */
    public function getDTOClassName() : string;
}
