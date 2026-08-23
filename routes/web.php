<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin/news',[NewsController::class, 'index'])->name('admin.news.index')
;