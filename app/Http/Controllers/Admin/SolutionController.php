<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.solutions.index', compact('solutions'));
    }

    public function create()
    {
        return view('admin.solutions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'features' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $solution = new Solution();

        $solution->title = $request->title;

        if ($request->slug) {
            $solution->slug = Str::slug($request->slug);
        } else {
            $solution->slug = Str::slug($request->title);
        }

        $solution->short_description = $request->short_description;
        $solution->description = $request->description;
        $solution->icon = $request->icon;

        if ($request->hasFile('image')) {
            $solution->image = $request->file('image')
                ->store('solutions', 'public');
        }

        if ($request->features) {
            $solution->features = array_values(
                array_filter(
                    array_map('trim', explode("\n", $request->features))
                )
            );
        }

        $solution->is_active = $request->boolean('is_active');
        $solution->sort_order = $request->sort_order ?? 0;

        $solution->save();

        return redirect()
            ->route('admin.solutions.index')
            ->with('success', 'Solution berhasil ditambahkan.');
    }

    public function edit(Solution $solution)
    {
        return view('admin.solutions.edit', compact('solution'));
    }

    public function update(Request $request, Solution $solution)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'features' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $solution->title = $request->title;

        if ($request->slug) {
            $solution->slug = Str::slug($request->slug);
        } else {
            $solution->slug = Str::slug($request->title);
        }

        $solution->short_description = $request->short_description;
        $solution->description = $request->description;
        $solution->icon = $request->icon;

        if ($request->hasFile('image')) {

            if ($solution->image) {
                Storage::disk('public')->delete($solution->image);
            }

            $solution->image = $request->file('image')
                ->store('solutions', 'public');
        }

        if ($request->features) {
            $solution->features = array_values(
                array_filter(
                    array_map('trim', explode("\n", $request->features))
                )
            );
        } else {
            $solution->features = [];
        }

        $solution->is_active = $request->boolean('is_active');
        $solution->sort_order = $request->sort_order ?? 0;

        $solution->save();

        return redirect()
            ->route('admin.solutions.index')
            ->with('success', 'Solution berhasil diperbarui.');
    }

    public function destroy(Solution $solution)
    {
        if ($solution->image) {
            Storage::disk('public')->delete($solution->image);
        }

        $solution->delete();

        return redirect()
            ->route('admin.solutions.index')
            ->with('success', 'Solution berhasil dihapus.');
    }
    public function creative()
        {
            $category = ServiceCategory::with('services')
                ->where('slug', 'creative-media-design-promotion')
                ->firstOrFail();

            return view('solutions.creative', compact('category'));
        }
}
