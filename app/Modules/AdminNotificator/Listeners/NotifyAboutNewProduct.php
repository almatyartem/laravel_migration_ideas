<?php

namespace App\Modules\AdminNotificator\Listeners;

use App\Contracts\WebStore\Events\NewProductAddedEventContract;

class NotifyAboutNewProduct
{
    /**
     * @param NewProductAddedEventContract $event
     */
    public function handle(NewProductAddedEventContract $event)
    {
        //send email to admin
    }
}
