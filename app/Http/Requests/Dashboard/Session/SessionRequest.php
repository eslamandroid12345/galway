<?php

namespace App\Http\Requests\Dashboard\Session;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'second_title_en' => ['required', 'max:255'],
            'second_title_ar' => ['required', 'max:255'],
            'url' => ['nullable', 'url'],
            'papers' => ['nullable', 'array'],
            'papers.*.second_title_ar' => ['required', 'max:255'],
            'papers.*.second_title_en' => ['required', 'max:255'],
            'papers.*.job_title_ar' => ['required', 'max:255'],
            'papers.*.job_title_en' => ['required', 'max:255'],
            'papers.*.writer_name' => ['required', 'max:255'],
            'papers.*.url' => [$this->method == 'post' ? 'required' : 'nullable',  'mimes:pdf,ppt,pptx,pps,ppsx,doc,docx'],
            'papers.*.existing_url' => ['nullable','string'],
        ];
    }
}
