<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\User;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = NewsCategory::where('slug', 'technology')->first();
        $author = User::where('email', 'admin@bramax.co.id')->first();
        News::create
            ([
            'news_category_id' => $category->id,
            'author_id' => $author->id,
            'title' => 'Transformasi Digital di Era Modern',
            'slug' => 'transformasi-digital-di-era-modern',
            'content' => 'Perkembangan teknologi digital terus memberikan dampak besar terhadap dunia bisnis dan industri.',
            'featured_image' => null,
            'status' => 'draft',
            'published_at' => null,
            ]);
    }
}
