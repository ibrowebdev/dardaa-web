<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSettingsRequest;
use App\Models\Setting;

class AdminSettingsController extends Controller
{
    public function index()
    {
        // Prefill a map of settings for easier usage in form
        $currentSettings = Setting::all()->pluck('value', 'key');
        
        return view('admin.settings.index', compact('currentSettings'));
    }

    public function update(UpdateSettingsRequest $request)
    {
        $settingsMap = $request->validated()['settings'];

        foreach ($settingsMap as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Agency settings updated successfully.');
    }
}
