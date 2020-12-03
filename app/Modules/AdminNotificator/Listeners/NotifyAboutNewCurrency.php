<?php

namespace App\Modules\AdminNotificator\Listeners;

use App\Contracts\MultiCurrencies\Events\NewCurrencyAddedEventContract;

class NotifyAboutNewCurrency
{
    /**
     * @param NewCurrencyAddedEventContract $event
     */
    public function handle(NewCurrencyAddedEventContract $event)
    {
        //send email to admin
    }
}
