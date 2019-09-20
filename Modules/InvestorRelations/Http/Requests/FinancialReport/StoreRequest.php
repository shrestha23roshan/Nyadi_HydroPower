<?php
namespace Modules\InvestorRelations\Http\Requests\FinancialReport;
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
            'attachment' => 'required|max:10240|mimes:jpg,jpeg,gif,png,doc,docx,xls,xlsx,pdf,txt,zip',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title field is required.',
            'attachment.required' => 'The selected file is greater than 10 MB.'
        ];
    }
}