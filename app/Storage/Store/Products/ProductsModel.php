<?php

namespace App\Storage\Store\Products;

use App\Contracts\Storage\ModelContract;
use App\Storage\MultiCurrencies\Currencies\CurrenciesModel;
use App\Storage\Store\Prices\PricesModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductsModel extends Model implements ModelContract
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
        return ProductsDTO::class;
    }

    /**
     * @return BelongsTo
     */
    public function supplier_currency()
    {
        return $this->belongsTo(CurrenciesModel::class, 'supplier_currency_id');
    }

    /**
     * @return HasMany
     */
    public function prices()
    {
        return $this->hasMany(PricesModel::class, 'currency_id');
    }
}
