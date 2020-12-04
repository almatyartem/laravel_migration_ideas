<?php

namespace App\Modules\WebStore\Jobs;

use App\Contracts\Storage\Services\DataProviders\ProductsDataProviderContract;
use App\Modules\MultiCurrencies\Events\NewProductAdded;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SyncProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param ProductsDataProviderContract $productsDP
     */
    public function handle(ProductsDataProviderContract $productsDP)
    {
        Log::info('SyncProducts');
        $products = $this->getProductsFromSupplierApi();

        foreach($products as $code => $productData){
            $product = $productsDP->search()->byCode($code)->first();
            if(!$product) {
                $product = $productsDP->create($code, $productData['title'], $productData['price']);
                event(new NewProductAdded($product));
            } elseif($product->usdPrice != $productData['price']) {
                $productsDP->updatePrice($product->id, $productData['price']);
            }
        }
    }

    /**
     * @return array
     */
    protected function getProductsFromSupplierApi() : array
    {
        return [
            'testCode' => [
                'title' => 'testTitle',
                'price' => 100
            ],
        ];
    }
}
