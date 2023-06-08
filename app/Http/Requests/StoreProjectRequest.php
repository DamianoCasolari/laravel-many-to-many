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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'unique:projects', 'max:150'],
            'logo' => ['nullable', 'max:255'],
            'link' => ['nullable'],
            'functionality' => ['nullable'],
            'languages_used' => ['nullable', 'max:255'],
            'type_id' => ['exists:categories,id']   //per evitare manipolazione hacker dell'id
        ];
    }
}
