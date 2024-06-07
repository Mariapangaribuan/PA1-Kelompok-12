<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class KabupatenRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name' => 'required',
                        'logo' => ['required', 'image', 'mimes:png,jpg,jpeg'],
                        'description' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name' => 'required',
                        'logo' => ['image', 'mimes:png,jpg,jpeg'],
                        'description' => 'required',
                    ];
                }
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'Kolom nama kabupaten harus diisi!',
            'logo.required' => 'logo kabupaten harus diisi!',
            'description.required' => 'Kolom deskripsi harus diisi!'
        ];
    }
}
