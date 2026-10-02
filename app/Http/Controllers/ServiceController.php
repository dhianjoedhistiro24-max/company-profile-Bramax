<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $service = Service::with([
            'serviceCategory',
            'solution'
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('services.show', compact('service'));
    }
}

