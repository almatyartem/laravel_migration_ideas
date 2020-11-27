<?php

namespace App\Storage\Eloquent\Store;

use App\Common\Contracts\Storage\ModelConvertableToDTO;
use App\Common\DTO\Models\Store\PriceDTO;
use App\Storage\Eloquent\MultiCurrencies\Currencies;
use App\Storage\Eloquent\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prices extends BaseModel implements ModelConvertableToDTO
{
    /**
     * @var string
     */
    protected $table = 'rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'currency_id',
        'value'
    ];

    /**
     * @var array
     */
    public $rules = [
        'product_id' => ['required','integer','exists:products,id'],
        'currency_id' => ['required','integer','exists:currencies,id'],
        'value' => ['required']
    ];

    /**
     * @return string
     */
    public function getDTOClassName(): string
    {
        return PriceDTO::class;
    }

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    /**
     * @return BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currencies::class, 'currency_id');
    }
}
