<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AccommodationGalleryRequest extends FormRequest
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
                    'name' => 'required',
                    'images' => ['required','image', 'mimes:png,jpg,jpeg'],
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required',
                    'images' => ['image', 'mimes:png,jpg,jpeg'],
                ];
            }
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'Kolom nama harus diisi!',
            'images.required' => 'Gambar harus diisi!',
        ];
    }
}
