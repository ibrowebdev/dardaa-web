<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'category' => 'required|string|in:Design,Development,SEO,Business,News',
            'excerpt' => 'nullable|string|max:300',
            'body' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date',
        ];
    }
}
