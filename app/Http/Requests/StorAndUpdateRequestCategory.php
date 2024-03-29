<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorAndUpdateRequestCategory extends FormRequest
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
            'parentid' => ['nullable', 'int'],
            'title' => ['required', 'max:255'],
            'image' => ['image'],
            'image_public_id' => ['nullable', 'int'],
        ];
    }
}
