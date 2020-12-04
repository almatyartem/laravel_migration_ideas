<?php

namespace App\Modules\DbDataProviders\Eloquent\Models\Extendable;

use App\Exceptions\ValidationException;
use App\Modules\DbDataProviders\Eloquent\ExtendedBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

abstract class BaseEloquentModel extends Model
{
    /**
     * @var array
     */
    protected array $rules = [];

    /**
     * @return string
     */
    abstract public function getDTOClassName() : string;

    /**
     * @param array $data
     * @param bool $isCreation
     * @return $this
     * @throws ValidationException
     */
    public function validate(array $data, bool $isCreation)
    {
        $rules = $this->rules;
        if(!$isCreation) {
            $rules = array_intersect_key($rules, $data);
        }
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $this;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return ExtendedBuilder
     */
    public function newEloquentBuilder($query) : ExtendedBuilder
    {
        return new ExtendedBuilder($query);
    }
}
