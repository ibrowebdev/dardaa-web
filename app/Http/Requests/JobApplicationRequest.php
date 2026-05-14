<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'cover_letter' => 'required|string|min:50|max:5000',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'cv.max' => 'The CV file must not exceed 5MB.',
            'cv.mimes' => 'The CV must be a PDF, DOC, or DOCX file.',
            'cover_letter.min' => 'Please write a more detailed cover letter (at least 50 characters).',
        ];
    }
}
