<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'title' => 'required|string',
            'user_id' => 'required|string|uuid|exists:users,uuid',
            'property_type_id' => 'required|string|uuid|exists:property_types,uuid',
            'property_category_id' => 'required|string|uuid|exists:property_categories,uuid',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'sometimes|required|string',
            'landmark' => 'sometimes|required|string',
            'number_of_bedrooms' => 'sometimes|required|numeric',
            'number_of_bathrooms' => 'sometimes|required|numeric',
            'number_of_floors' => 'sometimes|required|numeric',
            'price' => 'required|numeric',
            'langitude' => 'sometimes|required|numeric',
            'latitude' => 'sometimes|required|numeric',
            'is_featured' => 'sometimes|required|numeric',
            'square_metre' => 'sometimes|required|string',
            'images' => 'sometimes|required',
            'images.*' => 'file|image',
            'videoUrl' => 'sometimes|required|string',
        ];
    }
}
