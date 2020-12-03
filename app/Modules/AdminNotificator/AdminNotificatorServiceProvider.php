<?php

namespace App\Modules\AdminNotificator;

use Illuminate\Support\ServiceProvider;

class AdminNotificatorServiceProvider extends ServiceProvider
{
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(AdminNotificatorEventsServiceProvider::class);
    }
}
