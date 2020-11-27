<?php

namespace App\Storage;

use App\Common\Contracts\Storage\ModelConvertableToDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\DataTransferObject;

class EloquentToDTOConverter
{
    /**
    * @param ModelConvertableToDTO|Model $record
    * @return DataTransferObject
    */
    public static function fromEloquent(ModelConvertableToDTO $record): DataTransferObject
    {
        $dtoClassName = $record->getDTOClassName();

        $attributes = $record->attributesToArray();
        $relations = self::getRelations($record);
        $data = array_merge($attributes, $relations);
        $data = self::convertKeysToCamelCase($data);

        return new $dtoClassName($data);
    }

    /**
     * @param Collection $collection
     * @return DataTransferObject[]
     */
    public static function fromCollection(Collection $collection): array
    {
        $result = [];
        foreach($collection as $model){
            $result[] = self::fromEloquent($model);
        }

        return $result;
    }

    /**
     * @param array $array
     * @return array
     */
    protected static function convertKeysToCamelCase(array $array)
    {
        $keys = array_map(function ($i) {
            $parts = explode('_', $i);
            return array_shift($parts). implode('', array_map('ucfirst', $parts));
        }, array_keys($array));

        return array_combine($keys, $array);
    }

    /**
     * @param Model $record
     * @return array
     */
    protected static function getRelations(Model $record) : array
    {
        $relations = $record->getRelations();
        $result = [];

        foreach($relations as $k => $v){
            $test = 1;
            if($v instanceof ModelConvertableToDTO){
                $result[$k] = self::fromEloquent($v);
            } elseif($v instanceof Collection) {
                $result[$k] = self::fromCollection($v);
            }
        }

        return $result;
    }
}
