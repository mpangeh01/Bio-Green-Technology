<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            //
            //driver credentials
            'licenceBack' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'licenceFront' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'licenceWithDriver' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            //car details

            'model'=> 'required',
            'plate'=> 'required',
            'color'=> 'required',
            'transmission'=> 'required',
            'year'=> 'required',

            //legal documents
            'insurance' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tax' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fitness' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'whitebook' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            //car Images
            'car_front' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'car_back' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'car_left' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'car_right' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'front_interior' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rear_interior' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'open_boot' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
