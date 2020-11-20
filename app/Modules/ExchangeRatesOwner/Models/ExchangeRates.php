<?php

namespace App\Modules\ExchangeRatesOwner\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
    /**
     * @var float
     */
    protected $euro_to_dollar_rate;

    /**
     * @var float
     */
    protected $pound_to_dollar_rate;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exchange_rates';
}
