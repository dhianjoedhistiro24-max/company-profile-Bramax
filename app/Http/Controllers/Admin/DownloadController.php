<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::latest()->get();

        return view('admin.downloads.index', compact('downloads'));
    }

    public function create()
    {
        return view('admin.downloads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')
                ->store('downloads', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        Download::create($validated);

        return redirect()
            ->route('admin.downloads.index')
            ->with('success', 'File download berhasil ditambahkan.');
    }

    public function edit(Download $download)
    {
        return view('admin.downloads.edit', compact('download'));
    }

    public function update(Request $request, Download $download)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('file')) {
            if ($download->file) {
                Storage::disk('public')->delete($download->file);
            }

            $validated['file'] = $request->file('file')
                ->store('downloads', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $download->update($validated);

        return redirect()
            ->route('admin.downloads.index')
            ->with('success', 'File download berhasil diperbarui.');
    }

    public function destroy(Download $download)
    {
        if ($download->file) {
            Storage::disk('public')->delete($download->file);
        }

        $download->delete();

        return redirect()
            ->route('admin.downloads.index')
            ->with('success', 'File download berhasil dihapus.');
    }
}

