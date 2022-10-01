<?php

namespace App\Http\Requests\Shopkeeper\Order;

use App\Http\Requests\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'productIds' => 'required|array',
            'productIds.*' => 'required|integer|exists:products,id',
        ];
    }
}
