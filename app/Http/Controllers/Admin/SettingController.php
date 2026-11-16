<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        $defaultSettings = config('kiw.brand') ?? [];
        $settings = array_merge($defaultSettings, $settings);

        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'short' => 'required|string|max:100',
            'tagline' => 'nullable|string|max:250',
            'whatsapp' => 'required|string|max:50',
            'whatsapp_display' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string|max:300',
            'website' => 'nullable|url|max:200',
            'maps_url' => 'nullable|string|max:500',
            'footer_badge' => 'nullable|string|max:100',

            // Themes, Colors, & Card Styling
            'theme_style' => 'required|string|max:50',
            'theme_primary' => 'nullable|string|max:25',
            'theme_bg' => 'nullable|string|max:25',
            'theme_card_bg' => 'nullable|string|max:25',
            'theme_card_text' => 'nullable|string|max:25',
            'theme_card_border' => 'nullable|string|max:25',
            'theme_card_radius' => 'nullable|string|max:50',
            'theme_button_bg' => 'nullable|string|max:25',
            'theme_button_text' => 'nullable|string|max:25',
            'theme_button_border' => 'nullable|string|max:25',

            'logo_file' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets'), $filename);
            SiteSetting::set('logo', 'assets/' . $filename, 'brand');
        }

        // Save all other settings
        foreach ($validated as $key => $value) {
            if ($key !== 'logo_file') {
                SiteSetting::set($key, $value ?? '');
            }
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Pengaturan tema, kartu, warna, dan identitas kontak berhasil disimpan!');
    }
}
