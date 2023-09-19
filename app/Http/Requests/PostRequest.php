<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'image' => 'nullable | max:1024|mimes:jpg,jpeg,png,gif',
            'image' => 'required | file | image',
            'theme' => 'required | max: 255',
            'area' => 'required',
            'address' => 'required | max: 255',
            'comment' => 'required | max: 512',
        ];
    }
}
