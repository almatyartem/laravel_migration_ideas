<?php

namespace App\Modules\Storage\Eloquent;

use App\Models\DTO\Extendable\DTOModel;
use App\Modules\Storage\Eloquent\Models\Extendable\BaseEloquentModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ModelToDTOConverter
{
    /**
     * @param $data
     * @return DTOModel|DTOModel[]|null
     */
    public static function fromModelOrCollection($data)
    {
        if($data instanceof BaseEloquentModel){
            return self::fromEloquent($data);
        } elseif($data instanceof Collection) {
            return self::fromCollection($data);
        }

        return null;
    }

    /**
     * @param Model $record
     * @return DTOModel
     */
    public static function fromEloquent(BaseEloquentModel $record): DTOModel
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
     * @return DTOModel[]
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
     * @param BaseEloquentModel $record
     * @return array
     */
    protected static function getRelations(BaseEloquentModel $record) : array
    {
        $relations = $record->getRelations();
        $result = [];

        foreach($relations as $k => $v){
            $result[$k] = self::fromModelOrCollection($v);
        }

        return $result;
    }
}
