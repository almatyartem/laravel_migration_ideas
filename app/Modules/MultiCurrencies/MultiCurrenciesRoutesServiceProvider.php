<?php

namespace App\Modules\MultiCurrencies;

use App\Modules\MultiCurrencies\Controllers\Api\V1\MultiCurrenciesApiController;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class MultiCurrenciesRoutesServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
        $this->map();

        parent::boot();
    }

    public function map()
    {
        Route::prefix('api/MultiCurrencies/v1')
            ->group(function(Router $router){
                $router->get('set_currency_sign',[MultiCurrenciesApiController::class, 'setCurrencySign']);
            });
    }
}
