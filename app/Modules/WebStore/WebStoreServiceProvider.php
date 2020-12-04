<?php

namespace App\Modules\WebStore;

use App\Modules\WebStore\Jobs\SyncProducts;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class WebStoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(WebStoreRoutesServiceProvider::class);
        $this->app->booted(function () {
            $schedule = app(Schedule::class);
            $schedule->job(new SyncProducts)->everyMinute();
        });
    }
}
