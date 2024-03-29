<?php

namespace Modules\Pages\Http\Requests\Page;

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
            'heading' => 'required',
            'title' => 'required',
            'description' => 'required',
            'attachment' => 'image | max:1024',
            ];
    }

}