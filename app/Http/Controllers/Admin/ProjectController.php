<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Menampilkan semua project
     */
    public function index()
    {
        $projects = Project::with('category')
            ->latest()
            ->get();

        return view('admin.projects.index', compact('projects'));
    }


    /**
     * Menampilkan form tambah project
     */
    public function create()
    {
        $categories = ProjectCategory::orderBy('name')->get();

        return view('admin.projects.create', compact('categories'));
    }


    /**
     * Menyimpan project baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'scope' => [
                'nullable',
                'string',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:2100',
            ],

            'project_category_id' => [
                'required',
                'exists:project_categories,id',
            ],

            'status' => [
                'required',
                'string',
                'max:255',
            ],

            'featured' => [
                'nullable',
                'boolean',
            ],

            'images' => [
                'nullable',
                'array',
            ],

            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        $slug = $this->generateUniqueSlug(
            $validated['title']
        );


        /*
        |--------------------------------------------------------------------------
        | Create Project
        |--------------------------------------------------------------------------
        */

        $project = Project::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'scope' => $validated['scope'] ?? null,
            'location' => $validated['location'] ?? null,
            'year' => $validated['year'] ?? null,
            'project_category_id' => $validated['project_category_id'],
            'status' => $validated['status'],
            'featured' => $request->boolean('featured'),
        ]);


        /*
        |--------------------------------------------------------------------------
        | Upload Gallery
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $index => $image) {

                $path = $image->store(
                    'projects',
                    'public'
                );

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => $path,
                    'alt_text' => $project->title,
                    'sort_order' => $index,
                ]);
            }
        }


        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project berhasil ditambahkan.'
            );
    }


    /**
     * Menampilkan form edit project
     */
    public function edit(Project $project)
    {
        $project->load([
            'category',
            'images' => function ($query) {
                $query->orderBy('sort_order');
            },
        ]);

        $categories = ProjectCategory::orderBy('name')->get();

        return view(
            'admin.projects.edit',
            compact(
                'project',
                'categories'
            )
        );
    }


    /**
     * Memperbarui project
     */
    public function update(
        Request $request,
        Project $project
    ) {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'scope' => [
                'nullable',
                'string',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:2100',
            ],

            'project_category_id' => [
                'required',
                'exists:project_categories,id',
            ],

            'status' => [
                'required',
                'string',
                'max:255',
            ],

            'featured' => [
                'nullable',
                'boolean',
            ],

            'images' => [
                'nullable',
                'array',
            ],

            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate Slug Baru
        |--------------------------------------------------------------------------
        */

        $slug = $project->slug;

        if ($project->title !== $validated['title']) {

            $slug = $this->generateUniqueSlug(
                $validated['title'],
                $project->id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Update Project
        |--------------------------------------------------------------------------
        */

        $project->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'scope' => $validated['scope'] ?? null,
            'location' => $validated['location'] ?? null,
            'year' => $validated['year'] ?? null,
            'project_category_id' => $validated['project_category_id'],
            'status' => $validated['status'],
            'featured' => $request->boolean('featured'),
        ]);


        /*
        |--------------------------------------------------------------------------
        | Upload Gallery Baru
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('images')) {

            $lastSortOrder = $project->images()->max(
                'sort_order'
            );

            $lastSortOrder = $lastSortOrder ?? -1;

            foreach (
                $request->file('images')
                as $index => $image
            ) {

                $path = $image->store(
                    'projects',
                    'public'
                );

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => $path,
                    'alt_text' => $project->title,
                    'sort_order' => $lastSortOrder + $index + 1,
                ]);
            }
        }


        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project berhasil diperbarui.'
            );
    }


    /**
     * Menghapus project
     */
    public function destroy(Project $project)
    {
        $project->load('images');


        /*
        |--------------------------------------------------------------------------
        | Hapus Semua File Gallery
        |--------------------------------------------------------------------------
        */

        foreach ($project->images as $image) {

            if ($image->image) {

                Storage::disk('public')
                    ->delete($image->image);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Hapus Project
        |--------------------------------------------------------------------------
        */

        $project->delete();


        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project berhasil dihapus.'
            );
    }


    /**
     * Menghapus satu gambar gallery
     */
    public function destroyImage(
        ProjectImage $projectImage
    ) {
        if ($projectImage->image) {

            Storage::disk('public')
                ->delete($projectImage->image);
        }

        $projectImage->delete();


        return back()->with(
            'success',
            'Foto project berhasil dihapus.'
        );
    }


    /**
     * Membuat slug unik
     */
    private function generateUniqueSlug(
        string $title,
        ?int $ignoreProjectId = null
    ): string {

        $baseSlug = Str::slug($title);

        $slug = $baseSlug;

        $counter = 2;


        while (
            Project::where('slug', $slug)
                ->when(
                    $ignoreProjectId,
                    function ($query) use ($ignoreProjectId) {
                        $query->where(
                            'id',
                            '!=',
                            $ignoreProjectId
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