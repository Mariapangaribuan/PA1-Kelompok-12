<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DestinationCategoryRequest extends FormRequest
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
        switch($this->method()) {
            case 'POST' : {
                return [
                    'name' => ['required', 'string', 'min:5'],
                    'description' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => ['required', 'string', 'min:5'],
                    'description' => 'required',
                ];
            }
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama harus diisi.',
            'description.required' => 'Kolom deskripsi wajib diisi!'
        ];
    }

}