<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
           'nit' => 'required',
           'dane' => 'required',
           'url' => 'sometimes|max:2000|mimes:jpeg,png,bmp,jpg',
        ];
    }
}
