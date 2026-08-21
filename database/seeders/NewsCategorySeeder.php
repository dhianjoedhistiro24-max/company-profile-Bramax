<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
            NewsCategory::create([
                'name'=> 'Technology',
                'slug'=> 'technology',
                'description'=> 'Berita dan Informasi seputar teknologi.',
            ]);

             NewsCategory::create([
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Berita seputar bisnis dan industri.',

            ]);

             NewsCategory::create([
                'name' => 'Company News',
                'slug' => 'company-news',
                'description' => 'Berita dan informasi terbaru perusahaan.',
                        ]);
        
    }
}
