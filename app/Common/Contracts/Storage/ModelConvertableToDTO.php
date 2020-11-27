<?php

namespace App\Common\Contracts\Storage;

interface ModelConvertableToDTO
{
    public function getDTOClassName() : string;
}
