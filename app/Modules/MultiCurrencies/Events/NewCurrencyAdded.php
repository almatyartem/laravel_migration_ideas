<?php

namespace App\Modules\MultiCurrencies\Events;

use App\Contracts\MultiCurrencies\Events\NewCurrencyAddedEventContract;
use App\Models\DTO\CurrencyDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewCurrencyAdded implements NewCurrencyAddedEventContract
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public CurrencyDTO $currencyDTO;

    /**
     * NewCurrencyAdded constructor.
     * @param CurrencyDTO $currencyDTO
     */
    public function __construct(CurrencyDTO $currencyDTO)
    {
        $this->currencyDTO = $currencyDTO;
    }

    /**
     * @return CurrencyDTO
     */
    public function getCurrencyDTO() : CurrencyDTO
    {
        return $this->currencyDTO;
    }
}
