<?php

namespace App\Modules\Storage\Eloquent\Models;

use App\Models\DTO\CurrencyDTO;
use App\Modules\Storage\Eloquent\Models\Extendable\BaseEloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends BaseEloquentModel
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
        'code',
        'sign'
    ];

    /**
     * @var array
     */
    protected array $rules = [
        'code' => ['required', 'unique:currencies'],
        'sign' => ['nullable', 'unique:currencies']
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
        return $this->hasMany(ExchangeRate::class, 'currency_id');
    }

    /**
     * @return HasMany
     */
    public function prices()
    {
        return $this->hasMany(Price::class, 'currency_id');
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_currency_id');
    }
}
