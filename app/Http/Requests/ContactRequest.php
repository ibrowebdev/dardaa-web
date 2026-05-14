<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'subject' => 'required|in:General Enquiry,Project Request,Partnership,Support',
            'message' => 'required|string|min:20|max:5000',
            'honeypot' => 'max:0',
        ];
    }

    public function messages(): array
    {
        return [
            'message.min' => 'Please provide a more detailed message (at least 20 characters).',
            'honeypot.max' => 'Spam detected.',
        ];
    }
}
