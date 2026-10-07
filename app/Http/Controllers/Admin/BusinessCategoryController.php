<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::latest()->get();

        return view('admin.business-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.business-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:service_categories,slug'],
            'icon' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        ServiceCategory::create($validated);

        return redirect()
            ->route('admin.business-categories.index')
            ->with('success', 'Business Category berhasil ditambahkan.');
    }

    public function edit(ServiceCategory $businessCategory)
    {
        return view('admin.business-categories.edit', compact('businessCategory'));
    }

    public function update(Request $request, ServiceCategory $businessCategory)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:service_categories,slug,' . $businessCategory->id],
            'icon' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $businessCategory->update($validated);

        return redirect()
            ->route('admin.business-categories.index')
            ->with('success', 'Business Category berhasil diperbarui.');
    }

    public function destroy(ServiceCategory $businessCategory)
    {
        $businessCategory->delete();

        return redirect()
            ->route('admin.business-categories.index')
            ->with('success', 'Business Category berhasil dihapus.');
    }
}