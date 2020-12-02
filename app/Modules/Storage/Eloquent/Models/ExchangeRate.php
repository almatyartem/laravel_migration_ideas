<?php

namespace App\Modules\Storage\Eloquent\Models;

use App\Modules\Storage\Eloquent\Models\Extendable\BaseEloquentModel;
use App\Models\DTO\ExchangeRateDTO;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExchangeRate extends BaseEloquentModel
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
    protected array $rules = [
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
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
