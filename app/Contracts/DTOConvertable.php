<?php

namespace App\Contracts;

interface DTOConvertable
{
    /**
     * @return string
     */
    public function getDTOClassName() : string;

    /**
     * @return array
     */
    public function attributesToArray();

    /**
     * @return array
     */
    public function getRelations();
}
