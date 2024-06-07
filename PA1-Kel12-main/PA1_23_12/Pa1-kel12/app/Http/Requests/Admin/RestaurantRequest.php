<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
                        'kabupaten_id' => 'required',
                        'phone' => 'nullable',
                        'location' => 'required',
                        'is_share' => 'required',
                        'description' => 'required',
                        'contributor_id' => 'nullable',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'name' => 'required',
                        'kabupaten_id' => 'required',
                        'phone' => 'nullable',
                        'location' => 'required',
                        'is_share' => 'required',
                        'description' => 'required',
                        'contributor_id' => 'nullable',
                    ];
                }
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'Kolom nama tempat makan harus diisi!',
            'kabupaten.required' => 'kabupaten harus diisi!',
            'description.required' => 'Kolom deskripsi harus diisi!',
            'location.required' => 'Kolom lokasi tempat makan harus diisi!',
        ];
    }
}
