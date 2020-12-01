<?php

namespace App\Modules\Storage\DbDataProviders\Eloquent\Models;

use App\Modules\Storage\Dto\ProductDTO;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends BaseEloquentModel
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'code',
        'supplier_price',
        'supplier_currency_id'
    ];

    /**
     * @var array
     */
    public $rules = [
        'title' => ['required'],
        'code' => ['required'],
        'supplier_price' => ['required'],
        'supplier_currency_id' => ['required','integer','exists:currencies,id']
    ];

    /**
     * @return string
     */
    public function getDTOClassName(): string
    {
        return ProductDTO::class;
    }

    /**
     * @return BelongsTo
     */
    public function supplier_currency()
    {
        return $this->belongsTo(Currency::class, 'supplier_currency_id');
    }

    /**
     * @return HasMany
     */
    public function prices()
    {
        return $this->hasMany(Price::class, 'currency_id');
    }
}
