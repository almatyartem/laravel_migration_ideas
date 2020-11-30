<?php

namespace App\Contracts\Storage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ModelToDTOConverterContract
{
    /**
    * @param ModelContract|Model $record
    * @return DTOContract
    */
    public static function fromEloquent(ModelContract $record): DTOContract;

    /**
     * @param Collection $collection
     * @return DTOContract[]
     */
    public static function fromCollection(Collection $collection): array;
}
