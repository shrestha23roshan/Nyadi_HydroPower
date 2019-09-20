<?php

namespace Modules\AboutUs\Http\Requests\BOD;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
 /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'post' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'post.required' => 'Post field is required.',
        ];
    }
}