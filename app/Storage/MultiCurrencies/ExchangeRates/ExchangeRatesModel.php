<?php

namespace App\Storage\MultiCurrencies\ExchangeRates;

use App\Contracts\Storage\ModelContract;
use App\Storage\MultiCurrencies\Currencies\CurrenciesModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExchangeRatesModel extends Model implements ModelContract
{
    /**
     * @var string
     */
    protected $table = 'exchange_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency_id',
        'rate_to_usd',
        'date'
    ];

    /**
     * @var array
     */
    public $rules = [
        'currency_id' => ['required','integer','exists:currencies,id'],
        'rate_to_usd' => ['required'],
        'date' => ['required']
    ];

    /**
     * @return string
     */
    public function getDTOClassName(): string
    {
        return ExchangeRatesDTO::class;
    }

    /**
     * @return BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(CurrenciesModel::class, 'currency_id');
    }
}
