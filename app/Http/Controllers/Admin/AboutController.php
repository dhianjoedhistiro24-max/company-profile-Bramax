<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        $about = Page::firstOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'Teknologi yang Mendorong Pertumbuhan',
                'content' => 'PT BRAMAX TEKNOLOGI INDONESIA hadir sebagai perusahaan teknologi yang menyediakan solusi digital untuk membantu bisnis berkembang lebih cepat, efektif, dan terintegrasi.

Kami menggabungkan teknologi, inovasi, dan pendekatan yang berorientasi pada kebutuhan bisnis untuk menciptakan solusi yang memberikan dampak nyata.',
                'cta' => 'Tentang Kami',
                'section_order' => 1,
                'status' => 'published',
            ]
        );

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
       $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'vision' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'cta' => ['nullable', 'string', 'max:255'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:2048'],
        ]);
        $about = Page::where('slug', 'about')->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Upload Banner
        |--------------------------------------------------------------------------
        */

        $bannerPath = $about->banner;

        if ($request->hasFile('banner')) {

            // Hapus foto lama
            if ($about->banner) {
                Storage::disk('public')->delete($about->banner);
            }

            // Simpan foto baru
            $bannerPath = $request->file('banner')->store('about', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Update About
        |--------------------------------------------------------------------------
        */

       $about->update([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'vision' => $validated['vision'] ?? null,
        'mission' => $validated['mission'] ?? null,
        'cta' => $validated['cta'] ?? null,
        'banner' => $bannerPath,
        'status' => 'published',
    ]);

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'About berhasil diperbarui.');
    }
}