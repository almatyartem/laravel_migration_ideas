<?php

namespace App\Modules\WebStore;

use Illuminate\Support\ServiceProvider;

class WebStoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(WebStoreRoutesServiceProvider::class);
    }
}
