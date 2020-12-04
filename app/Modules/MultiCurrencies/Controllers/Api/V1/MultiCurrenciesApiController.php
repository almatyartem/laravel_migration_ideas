<?php

namespace App\Modules\MultiCurrencies\Controllers\Api\V1;

use App\Exceptions\ValidationException;
use App\Http\ApiResponse;
use App\Http\Controllers\Controller;
use App\Modules\MultiCurrencies\FormRequests\CurrencySignFormRequest;
use App\Modules\MultiCurrencies\Services\CurrenciesApi;
use Illuminate\Http\JsonResponse;

class MultiCurrenciesApiController extends Controller
{
    /**
     * @param CurrenciesApi $currenciesApi
     * @return JsonResponse
     */
    public function getAllCurrencies(CurrenciesApi $currenciesApi) : JsonResponse
    {
        $currencies = $currenciesApi->getAllCurrencies();

        return ApiResponse::response($currencies);
    }

    /**
     * @param CurrencySignFormRequest $request
     * @param CurrenciesApi $currenciesApi
     * @return JsonResponse
     * @throws ValidationException
     */
    public function setCurrencySign(CurrencySignFormRequest $request, CurrenciesApi $currenciesApi) : JsonResponse
    {
        $success = $currenciesApi->setCurrencySign($request->id, $request->sign);

        return ApiResponse::response(null, $success);
    }
}
