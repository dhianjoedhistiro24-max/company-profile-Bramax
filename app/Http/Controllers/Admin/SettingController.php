<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([
                'site_name' => 'PT BRAMAX Teknologi Indonesia',
            ]);
        }

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
        ]);

        $setting = Setting::first();

        $setting->update($request->only([
            'site_name',
            'email',
            'phone',
            'whatsapp',
            'address',
            'facebook',
            'instagram',
            'linkedin',
            'youtube',
        ]));

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Pengaturan berhasil diperbarui.');
    }
}