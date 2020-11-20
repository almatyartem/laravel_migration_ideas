<?php

namespace App\Modules\ExchangeRatesOwner\Models;

use App\Contracts\ExchangeRatesEntityContract;
use Illuminate\Database\Eloquent\Model;

class ExchangeRatesEntity extends Model implements ExchangeRatesEntityContract
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

    /**
     * @return float
     */
    public function getPoundToDollarRate() : float
    {
        return $this->euro_to_dollar_rate;
    }

    /**
     * @return float
     */
    public function getEuroToDollarRate() : float
    {
        return $this->pound_to_dollar_rate;
    }
}
