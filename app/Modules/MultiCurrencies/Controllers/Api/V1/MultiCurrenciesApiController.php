<?php

namespace App\Modules\MultiCurrencies\Controllers\Api\V1;

use App\Exceptions\ValidationException;
use App\Http\Controllers\Controller;
use App\Modules\MultiCurrencies\FormRequests\CurrencySignFormRequest;
use App\Modules\MultiCurrencies\MultiCurrenciesService;
use Illuminate\Http\JsonResponse;

class MultiCurrenciesApiController extends Controller
{
    /**
     * @var MultiCurrenciesService
     */
    protected MultiCurrenciesService $service;

    /**
     * MultiCurrenciesApiController constructor.
     * @param MultiCurrenciesService $service
     */
    function __construct(MultiCurrenciesService $service)
    {
        $this->service = $service;
    }

    /**
     * @param CurrencySignFormRequest $request
     * @return JsonResponse
     */
    public function setCurrencySign(CurrencySignFormRequest $request) : JsonResponse
    {
        try {
            $success = $this->service->setCurrencySign($request->id, $request->sign);
        } catch (ValidationException $exception) {
            $errors = $exception->getErrors();
        }

        if($success ?? null) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'errors' => $errors ?? null]);
        }
    }
}
