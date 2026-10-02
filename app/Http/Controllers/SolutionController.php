<?php

namespace App\Http\Controllers;

use App\Models\Solution;

class SolutionController extends Controller
{
    public function show($slug)
    {
        $solution = Solution::with([
            'services.serviceCategory'
        ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('solutions.show', compact('solution'));
    }
}