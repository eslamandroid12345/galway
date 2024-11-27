<?php

namespace App\Http\Requests\Dashboard\CenterPublication;

use Illuminate\Foundation\Http\FormRequest;

class CenterPublicationRequest extends FormRequest
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
            'writer_name' => ['required','max:255'],
            'title_ar' => ['required','max:255'],
            'title_en' => ['required','max:255'],
            'desc_en' => ['required','string'],
            'desc_ar' => ['required','string'],
            'view_link' => [$this->method == 'POST' ? 'required' : 'nullable', 'mimes:pdf,ppt,pptx,pps,ppsx,doc,docx'],
            'link_to_paper_copy' => ['required','url'],
        ];
    }
}
