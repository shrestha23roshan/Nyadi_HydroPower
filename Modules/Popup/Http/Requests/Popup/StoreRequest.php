<?php

namespace Modules\Popup\Http\Requests\Popup;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required',
            'date' => 'required',
            'attachment' => 'mimes:jpg,jpeg,gif,png',
            ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field is required.',
            'date.required' => 'Date field is required.',
            'attachment.required' => 'Attachment field is required.'
        ];
    }
}