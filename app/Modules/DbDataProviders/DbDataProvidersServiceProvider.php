<?php

namespace App\Modules\DbDataProviders;

use App\Contracts\DbDataProviders\DbDataProvidersFactoryContract;
use App\Modules\DbDataProviders\Eloquent\Services\EloquentDbDataProvidersFactory;
use Illuminate\Support\ServiceProvider;

class DbDataProvidersServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        DbDataProvidersFactoryContract::class => EloquentDbDataProvidersFactory::class
    ];
}
