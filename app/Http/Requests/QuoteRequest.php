<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'services' => 'required|array|min:1',
            'services.*' => 'string',
            'project_name' => 'required|string|max:200',
            'project_description' => 'required|string|min:20|max:5000',
            'budget' => 'required|string',
            'timeline' => 'required|string',
            'target_audience' => 'nullable|string|max:500',
            'name' => 'required|string|max:100',
            'company' => 'nullable|string|max:200',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'source' => 'nullable|string|max:200',
        ];
    }
}
