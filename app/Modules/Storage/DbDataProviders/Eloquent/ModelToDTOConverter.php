<?php

namespace App\Modules\Storage\DbDataProviders\Eloquent;

use App\Contracts\DTOConvertable;
use App\Contracts\ModelDTOContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ModelToDTOConverter
{
    /**
     * @param $data
     * @return ModelDTOContract|ModelDTOContract[]|null
     */
    public static function fromModelOrCollection($data)
    {
        if($data instanceof DTOConvertable){
            return self::fromEloquent($data);
        } elseif($data instanceof Collection) {
            return self::fromCollection($data);
        }

        return null;
    }

    /**
     * @param Model $record
     * @return ModelDTOContract
     */
    public static function fromEloquent(DTOConvertable $record): ModelDTOContract
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
     * @return ModelDTOContract[]
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
     * @param DTOConvertable $record
     * @return array
     */
    protected static function getRelations(DTOConvertable $record) : array
    {
        $relations = $record->getRelations();
        $result = [];

        foreach($relations as $k => $v){
            $result[$k] = self::fromModelOrCollection($v);
        }

        return $result;
    }
}
