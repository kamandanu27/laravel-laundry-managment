<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class LaundryTypeRequest extends FormRequest
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
            'price' => 'required|numeric|between:1,3000',
            'type'     => 'required|max:255|unique:laundry_types,type,'.$this->route('laundrytype')
        ];
    }
}
