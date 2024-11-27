<?php

namespace App\Http\Requests\Dashboard\CenterNews;

use Illuminate\Foundation\Http\FormRequest;

class CenterNewsRequest extends FormRequest
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
            'type' => [$this->method=='post'?'required':'nullable'],
            'writer_name' => ['required','max:255'],
            'title_ar' => ['required','max:255'],
            'title_en' => ['required','max:255'],
            'desc_en' => ['required','string'],
            'desc_ar' => ['required','string'],
            'images.*' => [$this->method=='POST'?'required':'nullable','image'],
        ];
    }
}
