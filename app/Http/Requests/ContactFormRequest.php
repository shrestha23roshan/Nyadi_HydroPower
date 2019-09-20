<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            // 'name' => 'required',
            // 'phone' => ['required', 'regex:/^(1\s?)?((\([0-9]{3}\))|[0-9]{3})[\s\-]?[\0-9]{3}[\s\-]?[0-9]{4}$/'],
            'email' => 'required|email',
            // 'address' => 'required',
            // 'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'phone.required' => 'The phone number field is required.', 
            // 'phone.regex' => 'The phone number format is invalid.'
        ];
    }
}
