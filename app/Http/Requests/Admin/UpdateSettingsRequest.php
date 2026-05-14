<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'settings' => 'required|array',
            'settings.agency_name' => 'required|string|max:255',
            'settings.tagline' => 'nullable|string|max:255',
            'settings.contact_email' => 'required|email|max:255',
            'settings.contact_phone' => 'nullable|string|max:255',
            'settings.address' => 'nullable|string',
            'settings.facebook_url' => 'nullable|url|max:255',
            'settings.twitter_url' => 'nullable|url|max:255',
            'settings.instagram_url' => 'nullable|url|max:255',
            'settings.linkedin_url' => 'nullable|url|max:255',
            'settings.meta_title' => 'nullable|string|max:255',
            'settings.meta_description' => 'nullable|string',
        ];
    }
}
