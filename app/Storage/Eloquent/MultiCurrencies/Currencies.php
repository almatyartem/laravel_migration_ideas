<?php

namespace App\Storage\Eloquent\MultiCurrencies;

use App\Common\Contracts\Storage\ModelConvertableToDTO;
use App\Common\DTO\Models\MultiCurrencies\CurrencyDTO;
use App\Storage\Eloquent\Store\Prices;
use App\Storage\Eloquent\Store\Products;
use App\Storage\Eloquent\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currencies extends BaseModel implements ModelConvertableToDTO
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
        return CurrencyDTO::class;
    }

    /**
     * @return HasMany
     */
    public function exchange_rates()
    {
        return $this->hasMany(ExchangeRates::class, 'currency_id');
    }

    /**
     * @return HasMany
     */
    public function prices()
    {
        return $this->hasMany(Prices::class, 'currency_id');
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Products::class, 'supplier_currency_id');
    }
}
