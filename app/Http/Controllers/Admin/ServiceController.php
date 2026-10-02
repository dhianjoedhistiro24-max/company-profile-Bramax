<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
{
    // Ambil semua kategori beserta jumlah service
    $categories = ServiceCategory::withCount('services')
        ->orderBy('name')
        ->get();

    // Ambil kategori yang sedang dipilih
    $selectedCategory = $request->get('category');

    // Query services
    $servicesQuery = Service::with([
        'serviceCategory',
        'solution'
    ])->latest();

    // Filter berdasarkan kategori jika dipilih
    if ($selectedCategory) {
        $servicesQuery->where(
            'service_category_id',
            $selectedCategory
        );
    }

    // Pagination
    $services = $servicesQuery
        ->paginate(15)
        ->withQueryString();

    return view('admin.services.index', compact(
        'categories',
        'services',
        'selectedCategory'
    ));
}

    public function create()
    {
        $categories = ServiceCategory::orderBy('name')->get();
        $solutions = Solution::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('admin.services.create', compact(
            'categories',
            'solutions'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'solution_id' => 'nullable|exists:solutions,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $service = new Service();

        $service->service_category_id = $request->service_category_id;
        $service->solution_id = $request->solution_id;
        $service->name = $request->name;

        if ($request->slug) {
            $service->slug = Str::slug($request->slug);
        } else {
            $service->slug = Str::slug($request->name);
        }

        $service->description = $request->description;
        $service->icon = $request->icon;

        if ($request->hasFile('image')) {
            $service->image = $request->file('image')
                ->store('services', 'public');
        }

        $service->save();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::orderBy('name')->get();
        $solutions = Solution::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('admin.services.edit', compact(
            'service',
            'categories',
            'solutions'
        ));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'solution_id' => 'nullable|exists:solutions,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $service->service_category_id = $request->service_category_id;
        $service->solution_id = $request->solution_id;
        $service->name = $request->name;

        if ($request->slug) {
            $service->slug = Str::slug($request->slug);
        } else {
            $service->slug = Str::slug($request->name);
        }

        $service->description = $request->description;
        $service->icon = $request->icon;

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            $service->image = $request->file('image')
                ->store('services', 'public');
        }

        $service->save();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service berhasil dihapus.');

    }
    public function services()
{
    return $this->hasMany(Service::class, 'service_category_id');
}
}

