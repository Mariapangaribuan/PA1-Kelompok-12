<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
                        'title' => 'required',
                        'excerpt' => 'required',
                        'is_share' => 'required',
                        'description' => 'required',
                        'blog_category_id' => 'required',
                        'kabupaten_id' => 'required',
                        // 'contributor_id' => 'nullable',
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    return [
                        'title' => 'required',
                        'excerpt' => 'required',
                        'is_share' => 'required',
                        'description' => 'required',
                        'blog_category_id' => 'required',
                        'kabupaten_id' => 'required',
                        // 'contributor_id' => 'nullable',
                    ];
                }
        }
    }
}
