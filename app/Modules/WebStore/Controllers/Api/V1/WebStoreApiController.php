<?php

namespace App\Modules\WebStore\Controllers\Api\V1;

use App\Contracts\Repositories\Services\ProductsRepositoryContract;
use App\Http\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\DTO\ExchangeRateDTO;
use App\Modules\MultiCurrencies\Services\ExchangeRatesApi;
use Illuminate\Http\JsonResponse;

class WebStoreApiController extends Controller
{
    /**
     * @param ProductsRepositoryContract $productsRepository
     * @param ExchangeRatesApi $exchangeRatesApi
     * @return JsonResponse
     */
    public function getProducts(ProductsRepositoryContract $productsRepository, ExchangeRatesApi $exchangeRatesApi) : JsonResponse
    {
        $result = [];
        $products = $productsRepository->all();
        $exchangeRates = $exchangeRatesApi->getCurrentExchangeRates();

        if($products){
            foreach($products as $product){
                $result[] = [
                    'code' => $product->title,
                    'title' => $product->title,
                    'usdPrice' => $product->usdPrice,
                    'otherPrices' => $exchangeRates ? $this->getOtherCurrenciesPrices($product->usdPrice, $exchangeRates) : null
                ];
            }
        }

        return ApiResponse::response($result);
    }

    /**
     * @param float $usdPrice
     * @param ExchangeRateDTO[] $exchangeRates
     * @return array
     */
    protected function getOtherCurrenciesPrices(float $usdPrice, array $exchangeRates)
    {
        $result = [];

        foreach($exchangeRates as $exchangeRate){
            $value = $exchangeRate->rateToUsd * $usdPrice;
            if($exchangeRate->currency->sign) {
                $value = $exchangeRate->currency->sign.$value;
            }
            $result[$exchangeRate->currency->code] = $value;
        }

        return $result;
    }
}
