<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['category', 'author'])
            ->latest()
            ->get();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = NewsCategory::all();

        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'news_category_id' => 'required|exists:news_categories,id',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'required|in:Draft,Published',
        ]);

        $imagePath = null;

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')
                ->store('news', 'public');
        }

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'news_category_id' => $request->news_category_id,
            'author_id' => auth()->id(),
            'featured_image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dibuat.');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = NewsCategory::all();

        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'news_category_id' => 'required|exists:news_categories,id',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'required|in:Draft,Published',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'news_category_id' => $request->news_category_id,
            'status' => $request->status,
        ];

        if ($request->hasFile('featured_image')) {

            if ($news->featured_image) {
                Storage::disk('public')->delete($news->featured_image);
            }

            $data['featured_image'] = $request->file('featured_image')
                ->store('news', 'public');
        }

        $news->update($data);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function publish($id)
    {
        $news = News::findOrFail($id);

        $news->update([
            'status' => 'Published',
            'published_at' => now(),
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dipublish.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->featured_image) {
            Storage::disk('public')->delete($news->featured_image);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
    public function publicIndex()
        {
            $news = News::with('category')
                ->where('status', 'Published')
                ->orderByDesc('published_at')
                ->get();

            return view('insights', compact('news'));
        }
    public function show($slug)
        {
            $news = News::with(['category', 'author'])
                ->where('slug', $slug)
                ->where('status', 'Published')
                ->firstOrFail();

            return view('news-detail', compact('news'));
        }
}