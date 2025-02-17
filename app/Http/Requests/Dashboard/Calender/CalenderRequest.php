<?php

namespace App\Http\Requests\Dashboard\Calender;

use Illuminate\Foundation\Http\FormRequest;

class CalenderRequest extends FormRequest
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
                'title_ar' => ['required' ,'max:255'] ,
                'title_en' => ['required' ,'max:255'] ,
                'url' => ['required' ,'url'] ,
                'date' => ['required' ,'date'] ,
        ];
    }
}
