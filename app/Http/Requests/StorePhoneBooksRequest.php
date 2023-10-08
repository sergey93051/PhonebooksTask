<?php

namespace App\Http\Requests;

use App\Models\PhoneBooks;
use App\Rules\PhoneRules;
use App\Rules\TimezoneNameRules;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class StorePhoneBooksRequest extends FormRequest
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
            "firstName" => ["required","min:2",'unique:'.PhoneBooks::class],
            "countryCodePhone" => ["required","numeric",new PhoneRules],
            "timezoneName" => ["required","min:2",new TimezoneNameRules]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'   => 'Validation errors',
            'errors'      => $validator->errors()
        ],400));
    }

}
