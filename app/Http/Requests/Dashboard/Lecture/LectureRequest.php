<?php

namespace App\Http\Requests\Dashboard\Lecture;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
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
            'program_id' => [$this->method == 'put' ? 'required' : 'nullable'],
            'first_title_ar' => ['required', 'max:255'],
            'first_title_en' => ['required', 'max:255'],
            'second_title_ar' => ['required', 'max:255'],
            'second_title_en' => ['required', 'max:255'],
            'desc_en' => ['required', 'string'],
            'desc_ar' => ['required', 'string'],
            'url' => ['required', 'url'],
            'job_title_en' => ['required', 'max:255'],
            'job_title_ar' => ['required', 'max:255'],
            'writer_name' => ['required', 'max:255'],
        ];
    }
}
