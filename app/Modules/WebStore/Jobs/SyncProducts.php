<?php

namespace App\Modules\WebStore\Jobs;

use App\Contracts\Repositories\Services\ProductsRepositoryContract;
use App\Contracts\Search\Services\ProductsSearchContract;
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
     * @param ProductsRepositoryContract $productsRepository
     * @param ProductsSearchContract $productsSearch
     */
    public function handle(ProductsRepositoryContract $productsRepository, ProductsSearchContract $productsSearch)
    {
        Log::info('SyncProducts');
        $products = $this->getProductsFromSupplierApi();

        foreach($products as $code => $productData){
            $product = $productsSearch->byCode($code)->first();
            if(!$product) {
                $product = $productsRepository->create($code, $productData['title'], $productData['price']);
                event(new NewProductAdded($product));
            } elseif($product->usdPrice != $productData['price']) {
                $productsRepository->updatePrice($product->id, $productData['price']);
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
