<?php

namespace App\Http\Requests\UserAddress;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class StoreUserAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    { 
        return [
            "street" => "required|string|max:255",
            "neighborhood" => "required|string|max:255",
            "zip_code" => "required|string|max:8",
            "user_id" => "integer|max:255",
            "address_types_id" => "required|numeric|exists:address_types,id",
            "state_id" => "integer|exists:states,id",
            "city_id" => "integer|exists:cities,id"
        ];
    
    }
        protected function failedValidation(Validator $validator)
        {
            throw new HttpResponseException(
                response()->json([
                    'message' => __('validation.invalid_input'),
                    'errors' => $validator->errors(),
                ], Response::HTTP_BAD_REQUEST)
            );
        }
    
}
