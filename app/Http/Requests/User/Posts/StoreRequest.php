<?php

namespace App\Http\Requests\User\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'body' =>  ['required', 'min:1','max:250'],
                'title' => ['required', 'min:1', 'max:50']
        ];
    }
}