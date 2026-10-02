<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Solution;
use App\Models\Service;
use App\Models\Project;
use App\Models\News;
use App\Models\Download;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'categories' => ServiceCategory::count(),
            'solutions' => Solution::count(),
            'services' => Service::count(),
            'projects' => Project::count(),
            'news' => News::count(),
            'downloads' => class_exists(Download::class) ? Download::count() : 0,
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
