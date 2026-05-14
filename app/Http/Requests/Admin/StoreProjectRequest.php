<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug',
            'category' => 'required|string|in:Web Design,E-Commerce,Branding,SEO,Development',
            'client' => 'nullable|string|max:255',
            'description' => 'required|string',
            'body' => 'nullable|string',
            'url' => 'nullable|url|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tech_stack' => 'nullable|string|max:255',
            'results' => 'nullable|string',
        ];
    }
}
