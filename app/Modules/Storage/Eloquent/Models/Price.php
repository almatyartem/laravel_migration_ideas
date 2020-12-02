<?php

namespace App\Modules\Storage\Eloquent\Models;

use App\Modules\Storage\Eloquent\Models\Extendable\BaseEloquentModel;
use App\Models\DTO\PriceDTO;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends BaseEloquentModel
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
    protected array $rules = [
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
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * @return BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}