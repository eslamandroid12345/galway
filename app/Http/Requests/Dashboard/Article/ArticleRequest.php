<?php

namespace App\Http\Requests\Dashboard\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
            'category_id' => ['required',Rule::exists('categories','id')],
            'title_ar' => ['required','max:255'],
            'title_en' => ['required','max:255'],
            'desc_en' => ['required','string'],
            'desc_ar' => ['required','string'],
            'images.*' => [$this->method=='POST'?'required':'nullable','image'],
        ];
    }
}
