<?php

namespace App\Http\Requests\UserAddress;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class UserAddressRequest extends FormRequest
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
            "rua" => "required|string|max:255",
            "bairro" => "required|string|max:255",
            "CEP" => "required|string|max:12",
            "usuario_id" => "integer|max:255",
            "company_id" => "integer|max:255",
            "tipo_endereco_id" => "required|integer|max:255",
            "state_id" => "integer|max:26",
            "city_id" => "integer"
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
