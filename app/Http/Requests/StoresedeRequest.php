<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresedeRequest extends FormRequest
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
        //dd($this->all());
        return [
            'name' => 'required',
            'address' => 'required',
            'department' => 'required',
            'municipality' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'cell' => 'required',
            'url' => 'sometimes|max:2000|mimes:jpeg,png,bmp,jpg',
        ];
    }
}
