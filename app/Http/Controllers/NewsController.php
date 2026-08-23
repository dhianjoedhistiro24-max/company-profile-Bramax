<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['category','author'])->latest()->get();
        return view('admin.news.index', compact('news'));
    }
}
