<?php

namespace App\Http\Requests\Dashboard\Symposium;

use Illuminate\Foundation\Http\FormRequest;

class SymposiumRequest extends FormRequest
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
            'center_programme_id' => [$this->method=='post'?'required':'nullable'],
            'title_ar' => ['required', 'max:255'],
            'title_en' => ['required', 'max:255'],
            'desc_en' => ['required', 'string'],
            'desc_ar' => ['required', 'string'],
            'link_to_paper_copy' => ['required', 'url'],
            'view_link' => [$this->method == 'POST' ? 'required' : 'nullable', 'mimes:pdf,ppt,pptx,pps,ppsx,doc,docx'],
            'url' => ['nullable', 'url'],
            'image' => [$this->method == 'POST' ? 'required' : 'nullable', 'image'],

        ];
    }
}
