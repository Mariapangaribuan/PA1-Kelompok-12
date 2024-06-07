<?php

namespace App\Http\Requests\Contributor;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'confirmed', 'min:8'],
            'image' => ['nullable','image', 'mimes:png,jpg,jpeg,gif'],
            'age' => ['nullable','numeric'],
            'phone' => ['nullable','string', 'min:10'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }

    public function messages()
    {
        return [
            'email.required' => 'Kolom nama harus diisi.',
            'password.required' => 'Kolom deskripsi wajib diisi!'
        ];
    }
}
