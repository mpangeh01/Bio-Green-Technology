<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingRequest extends FormRequest
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
            "from" => "required",
            "to" => "required",
            "duration" => "required",
            "date" => "required",
            "time" => "required",
            "vehicle" => "required|exists:cars,id",
            "seats"=>"required",
            "price" => "required",

        ];
    }
}
