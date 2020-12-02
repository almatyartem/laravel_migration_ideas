<?php

namespace App\Modules\MultiCurrencies\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencySignFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => ['required','integer'],
            'sign' => ['required','max:255'],
        ];
    }
}
