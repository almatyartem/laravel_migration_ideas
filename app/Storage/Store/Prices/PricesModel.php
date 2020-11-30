<?php

namespace App\Storage\Store\Prices;

use App\Contracts\Storage\ModelContract;
use App\Storage\MultiCurrencies\Currencies\CurrenciesModel;
use App\Storage\Store\Products\ProductsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PricesModel extends Model implements ModelContract
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
        return PricesDTO::class;
    }

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(ProductsModel::class, 'product_id');
    }

    /**
     * @return BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(CurrenciesModel::class, 'currency_id');
    }
}
