<?php

namespace App\Http\Requests\Dashboard\TreeStructure;

use Illuminate\Foundation\Http\FormRequest;

class TreeStructureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'about_id' => [$this->method=='post'?'required' : 'nullable'] ,
            'image' => ['required', 'image']
        ];
    }
}
