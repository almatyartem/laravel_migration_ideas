<?php

namespace App\Storage\MultiCurrencies\Currencies;

use App\Contracts\Storage\ModelContract;
use App\Storage\MultiCurrencies\ExchangeRates\ExchangeRatesModel;
use App\Storage\Store\Prices\PricesModel;
use App\Storage\Store\Products\ProductsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CurrenciesModel extends Model implements ModelContract
{
    /**
     * @var string
     */
    protected $table = 'currencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code'
    ];

    /**
     * @var array
     */
    public array $rules = [
        'code' => ['required', 'unique']
    ];

    /**
     * @return string
     */
    public function getDTOClassName(): string
    {
        return CurrenciesDTO::class;
    }

    /**
     * @return HasMany
     */
    public function exchange_rates()
    {
        return $this->hasMany(ExchangeRatesModel::class, 'currency_id');
    }

    /**
     * @return HasMany
     */
    public function prices()
    {
        return $this->hasMany(PricesModel::class, 'currency_id');
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(ProductsModel::class, 'supplier_currency_id');
    }
}
