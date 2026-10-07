<?php

namespace App\Http\Controllers;

use App\Models\Solution;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('solutions.index', compact('solutions'));
    }

    public function show($slug)
    {
        $solution = Solution::where('slug', $slug)
            ->where('is_active', true)
            ->with('services')
            ->firstOrFail();

        return view('solutions.show', compact('solution'));
    }
}