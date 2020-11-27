<?php

namespace App\Storage\Eloquent\MultiCurrencies;

use App\Common\Contracts\Storage\ModelConvertableToDTO;
use App\Common\DTO\Models\MultiCurrencies\ExchangeRateDTO;
use App\Storage\Eloquent\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExchangeRates extends BaseModel implements ModelConvertableToDTO
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
        return ExchangeRateDTO::class;
    }

    /**
     * @return BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currencies::class, 'currency_id');
    }
}
