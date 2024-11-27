<?php

namespace App\Http\Requests\Dashboard\Structure;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'en.first_section.title' => ['required','max:255'] ,
            'en.first_section.desc' => ['required','string'] ,
            'en.first_section.logo' => ['required','string'] ,
            'en.video_section.title' => ['required','max:255'] ,
            'en.video_section.desc' => ['required','string'] ,

            'ar.first_section.title' => ['required','max:255'] ,
            'ar.first_section.desc' => ['required','string'] ,
            'ar.first_section.logo' => ['required','string'] ,
            'ar.video_section.title' => ['required','max:255'] ,
            'ar.video_section.desc' => ['required','string'] ,


            'all.video_section.url' => ['required','url'] ,

            'file.*' => ['image'],
            'old_file.*' => ['nullable','string'],
        ];
    }
}
