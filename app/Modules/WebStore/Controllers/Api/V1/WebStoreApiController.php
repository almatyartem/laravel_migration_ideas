<?php

namespace App\Modules\WebStore\Controllers\Api\V1;

use App\Contracts\Storage\Services\DataProviders\ProductsDataProviderContract;
use App\Http\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\DTO\ExchangeRateDTO;
use App\Modules\MultiCurrencies\Services\MultiCurrenciesApi;
use Illuminate\Http\JsonResponse;

class WebStoreApiController extends Controller
{
    /**
     * @param ProductsDataProviderContract $productsDataProvider
     * @param MultiCurrenciesApi $multiCurrenciesApi
     * @return JsonResponse
     */
    public function getProducts(ProductsDataProviderContract $productsDataProvider, MultiCurrenciesApi $multiCurrenciesApi) : JsonResponse
    {
        $result = [];
        $products = $productsDataProvider->search()->find();
        $exchangeRates = $multiCurrenciesApi->getCurrentExchangeRates();

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
