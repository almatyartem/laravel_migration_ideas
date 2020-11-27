<?php

namespace App\Storage\Eloquent\Store;

use App\Common\Contracts\Storage\ModelConvertableToDTO;
use App\Common\DTO\Models\Store\ProductDTO;
use App\Storage\Eloquent\MultiCurrencies\Currencies;
use App\Storage\Eloquent\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends BaseModel implements ModelConvertableToDTO
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
        return $this->belongsTo(Currencies::class, 'supplier_currency_id');
    }

    /**
     * @return HasMany
     */
    public function prices()
    {
        return $this->hasMany(Prices::class, 'currency_id');
    }
}
