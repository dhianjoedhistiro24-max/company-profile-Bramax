<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    /**
     * Menampilkan semua kategori project
     */
    public function index()
    {
        $categories = ProjectCategory::withCount('projects')
            ->orderBy('name')
            ->get();

        return view(
            'admin.project-categories.index',
            compact('categories')
        );
    }


    /**
     * Menampilkan form tambah kategori
     */
    public function create()
    {
        return view('admin.project-categories.create');
    }


    /**
     * Menyimpan kategori baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:project_categories,name',
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ]);


        $slug = $this->generateUniqueSlug(
            $validated['name']
        );


        ProjectCategory::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
        ]);


        return redirect()
            ->route('admin.project-categories.index')
            ->with(
                'success',
                'Kategori project berhasil ditambahkan.'
            );
    }


    /**
     * Menampilkan form edit
     */
    public function edit(ProjectCategory $projectCategory)
    {
        return view(
            'admin.project-categories.edit',
            compact('projectCategory')
        );
    }


    /**
     * Memperbarui kategori
     */
    public function update(
        Request $request,
        ProjectCategory $projectCategory
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:project_categories,name,' . $projectCategory->id,
            ],

            'description' => [
                'nullable',
                'string',
            ],
        ]);


        $slug = $projectCategory->slug;

        if ($projectCategory->name !== $validated['name']) {

            $slug = $this->generateUniqueSlug(
                $validated['name'],
                $projectCategory->id
            );
        }


        $projectCategory->update([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
        ]);


        return redirect()
            ->route('admin.project-categories.index')
            ->with(
                'success',
                'Kategori project berhasil diperbarui.'
            );
    }


    /**
     * Menghapus kategori
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        if ($projectCategory->projects()->exists()) {

            return back()->with(
                'error',
                'Kategori tidak dapat dihapus karena masih digunakan oleh project.'
            );
        }


        $projectCategory->delete();


        return redirect()
            ->route('admin.project-categories.index')
            ->with(
                'success',
                'Kategori project berhasil dihapus.'
            );
    }


    /**
     * Membuat slug unik
     */
    private function generateUniqueSlug(
        string $name,
        ?int $ignoreCategoryId = null
    ): string {

        $baseSlug = Str::slug($name);

        $slug = $baseSlug;

        $counter = 2;


        while (
            ProjectCategory::where('slug', $slug)
                ->when(
                    $ignoreCategoryId,
                    function ($query) use ($ignoreCategoryId) {
                        $query->where(
                            'id',
                            '!=',
                            $ignoreCategoryId
                        );
                    }
                )
                ->exists()
        ) {

            $slug = $baseSlug . '-' . $counter;

            $counter++;
        }


        return $slug;
    }
}