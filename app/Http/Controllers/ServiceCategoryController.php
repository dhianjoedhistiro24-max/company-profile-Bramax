<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;

class ServiceCategoryController extends Controller
{
    public function show($slug)
    {
        $category = ServiceCategory::with('services')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('business-categories.show', compact('category'));
    }
}
