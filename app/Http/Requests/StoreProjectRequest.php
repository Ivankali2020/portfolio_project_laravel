<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required',
            'client_name' => 'required',
            'uploaded_at' => 'required',
            'photo' => 'required|image',
            'categories' => 'required',
            'photos.*' => 'required|image',
            'description' => 'required',
            'link' => 'required|url',

        ];
    }
}
