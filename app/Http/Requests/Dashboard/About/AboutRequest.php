<?php

namespace App\Http\Requests\Dashboard\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'sort' => ['required', 'numeric'],
            'title_ar' => ['required', 'max:255'],
            'title_en' => ['required', 'max:255'],
            'second_title_ar' => ['nullable', 'max:255'],
            'second_title_en' => ['nullable', 'max:255'],
            'desc_en' => ['required', 'string'],
            'desc_ar' => ['required', 'string'],
            'image' => [$this->method == 'POST' ? 'required' : 'nullable', 'image'],
            'has_members' => ['nullable', 'in:on,'],
            'structure_tree' => ['nullable', 'in:on,'],
        ];
    }
}
