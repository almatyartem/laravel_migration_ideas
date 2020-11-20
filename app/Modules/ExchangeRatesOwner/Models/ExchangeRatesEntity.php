<?php

namespace App\Modules\ExchangeRatesOwner\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRatesEntity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exchange_rates';

    /**
     * @var string[]
     */
    protected $fillable = ['euro_to_dollar_rate', 'pound_to_dollar_rate', 'date'];
}
