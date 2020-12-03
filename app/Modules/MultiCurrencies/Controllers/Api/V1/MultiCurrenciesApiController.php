<?php

namespace App\Modules\MultiCurrencies\Controllers\Api\V1;

use App\Exceptions\ValidationException;
use App\Http\ApiResponse;
use App\Http\Controllers\Controller;
use App\Modules\MultiCurrencies\FormRequests\CurrencySignFormRequest;
use App\Modules\MultiCurrencies\Services\MultiCurrenciesApi;
use Illuminate\Http\JsonResponse;

class MultiCurrenciesApiController extends Controller
{
    /**
     * @var MultiCurrenciesApi
     */
    protected MultiCurrenciesApi $service;

    /**
     * MultiCurrenciesApiController constructor.
     * @param MultiCurrenciesApi $service
     */
    function __construct(MultiCurrenciesApi $service)
    {
        $this->service = $service;
    }

    /**
     * @param CurrencySignFormRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function setCurrencySign(CurrencySignFormRequest $request) : JsonResponse
    {
        $success = $this->service->setCurrencySign($request->id, $request->sign);

        return ApiResponse::response(null, $success);
    }
}
