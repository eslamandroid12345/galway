<?php

namespace App\Http\Requests\Dashboard\Member;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name_ar' => ['required', 'max:255'],
            'name_en' => ['required', 'max:255'],
            'job_title_ar' => ['nullable', 'max:255'],
            'job_title_en' => ['nullable', 'max:255'],
            'desc_en' => ['required', 'string'],
            'desc_ar' => ['required', 'string'],
            'image' => [$this->method == 'POST' ? 'required' : 'nullable', 'image'],
        ];
    }
}
