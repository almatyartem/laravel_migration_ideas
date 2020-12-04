<?php

namespace App\Modules\WebStore;

use App\Modules\WebStore\Controllers\Api\V1\WebStoreApiController;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class WebStoreRoutesServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
        $this->map();

        parent::boot();
    }

    public function map()
    {
        Route::prefix('api/Store/v1')
            ->group(function(Router $router){
                $router->get('products',[WebStoreApiController::class, 'getProducts']);
            });
    }
}
