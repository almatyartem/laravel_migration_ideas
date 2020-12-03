<?php

namespace App\Modules\AdminNotificator;

use App\Contracts\MultiCurrencies\Events\NewCurrencyAddedEventContract;
use App\Modules\AdminNotificator\Listeners\NotifyAboutNewCurrency;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class AdminNotificatorEventsServiceProvider extends EventServiceProvider
{
    /**
     * @var \string[][]
     */
    protected $listen = [
        NewCurrencyAddedEventContract::class => [
            NotifyAboutNewCurrency::class
        ],
    ];
}
