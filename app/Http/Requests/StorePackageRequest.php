<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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
            'package_category_id' => 'required|string|uuid|exists:package_categories,uuid',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'percentage_save' => 'required|string',
            'number_of_listing' => 'required|string',
            'limit_purchase' => 'required|string',
            'month' => 'required|string',
            'description' => 'required|string',
            'is_default' => 'sometimes|required|string',
        ];
    }
}
