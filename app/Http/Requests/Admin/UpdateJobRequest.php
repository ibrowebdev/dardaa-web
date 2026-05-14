<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $jobId = $this->route('job')->id;
        return [
            'title' => 'required|string|max:255',
            'slug' => "required|string|max:255|unique:job_listings,slug,{$jobId}",
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|in:Full-Time,Part-Time,Contract,Remote',
            'description' => 'required|string',
            'is_active' => 'nullable|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->has('is_active') ? true : false,
        ]);
    }
}
