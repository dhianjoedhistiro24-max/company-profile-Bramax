<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SolutionController as AdminSolutionController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BusinessCategoryController;

use App\Models\ServiceCategory;
use App\Models\Project;
use App\Models\Page;
use App\Models\Solution;


// =========================
// HOME
// =========================

Route::get('/', function () {

    $businessCategories = ServiceCategory::all();

    $solutions = Solution::where('is_active', true)
        ->orderBy('sort_order', 'asc')
        ->get();

    $projects = Project::with([
        'category',
        'images'
    ])
        ->where('status', 'Completed')
        ->where('featured', true)
        ->latest()
        ->take(6)
        ->get();

    $about = Page::where('slug', 'about')
        ->where('status', 'published')
        ->first();

    return view('welcome', compact(
        'businessCategories',
        'solutions',
        'projects',
        'about'
    ));

})->name('home');


// =========================
// INSIGHTS
// =========================

Route::get('/insights', [NewsController::class, 'publicIndex'])
    ->name('insights');

Route::get('/insights/{slug}', [NewsController::class, 'show'])
    ->name('insights.show');


// =========================
// AUTH
// =========================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// =========================
// ADMIN
// =========================

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');


        // =========================
        // NEWS
        // =========================

        Route::get('/news', [NewsController::class, 'index'])
            ->name('news.index');

        Route::get('/news/create', [NewsController::class, 'create'])
            ->name('news.create');

        Route::post('/news', [NewsController::class, 'store'])
            ->name('news.store');

        Route::get('/news/{id}/edit', [NewsController::class, 'edit'])
            ->name('news.edit');

        Route::put('/news/{id}', [NewsController::class, 'update'])
            ->name('news.update');

        Route::patch('/news/{id}/publish', [NewsController::class, 'publish'])
            ->name('news.publish');

        Route::delete('/news/{id}', [NewsController::class, 'destroy'])
            ->name('news.destroy');


        // =========================
        // SERVICES
        // =========================

        Route::get('/services', [AdminServiceController::class, 'index'])
            ->name('services.index');

        Route::get('/services/create', [AdminServiceController::class, 'create'])
            ->name('services.create');

        Route::post('/services', [AdminServiceController::class, 'store'])
            ->name('services.store');

        Route::get('/services/{service}/edit', [AdminServiceController::class, 'edit'])
            ->name('services.edit');

        Route::put('/services/{service}', [AdminServiceController::class, 'update'])
            ->name('services.update');

        Route::delete('/services/{service}', [AdminServiceController::class, 'destroy'])
            ->name('services.destroy');


        // =========================
        // SOLUTIONS
        // =========================

        Route::get('/solutions', [AdminSolutionController::class, 'index'])
            ->name('solutions.index');

        Route::get('/solutions/create', [AdminSolutionController::class, 'create'])
            ->name('solutions.create');

        Route::post('/solutions', [AdminSolutionController::class, 'store'])
            ->name('solutions.store');

        Route::get('/solutions/{solution}/edit', [AdminSolutionController::class, 'edit'])
            ->name('solutions.edit');

        Route::put('/solutions/{solution}', [AdminSolutionController::class, 'update'])
            ->name('solutions.update');

        Route::delete('/solutions/{solution}', [AdminSolutionController::class, 'destroy'])
            ->name('solutions.destroy');


        // =========================
        // CONTACT MESSAGES
        // =========================

        Route::get('/contact-messages', [ContactMessageController::class, 'index'])
            ->name('contact-messages.index');

        Route::get('/contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])
            ->name('contact-messages.show');

        Route::patch('/contact-messages/{contactMessage}/status', [ContactMessageController::class, 'updateStatus'])
            ->name('contact-messages.update-status');

        Route::delete('/contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])
            ->name('contact-messages.destroy');


        // =========================
        // PROJECTS
        // =========================

        Route::get('/projects', [ProjectController::class, 'index'])
            ->name('projects.index');

        Route::get('/projects/create', [ProjectController::class, 'create'])
            ->name('projects.create');

        Route::post('/projects', [ProjectController::class, 'store'])
            ->name('projects.store');

        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])
            ->name('projects.edit');

        Route::put('/projects/{project}', [ProjectController::class, 'update'])
            ->name('projects.update');

        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
            ->name('projects.destroy');

        Route::delete('/project-images/{projectImage}', [ProjectController::class, 'destroyImage'])
            ->name('project-images.destroy');


        // =========================
        // PROJECT CATEGORIES
        // =========================

        Route::get('/project-categories', [ProjectCategoryController::class, 'index'])
            ->name('project-categories.index');

        Route::get('/project-categories/create', [ProjectCategoryController::class, 'create'])
            ->name('project-categories.create');

        Route::post('/project-categories', [ProjectCategoryController::class, 'store'])
            ->name('project-categories.store');

        Route::get('/project-categories/{projectCategory}/edit', [ProjectCategoryController::class, 'edit'])
            ->name('project-categories.edit');

        Route::put('/project-categories/{projectCategory}', [ProjectCategoryController::class, 'update'])
            ->name('project-categories.update');

        Route::delete('/project-categories/{projectCategory}', [ProjectCategoryController::class, 'destroy'])
            ->name('project-categories.destroy');


        // =========================
        // ABOUT
        // =========================

        Route::get('/about', [AboutController::class, 'edit'])
            ->name('about.edit');

        Route::put('/about', [AboutController::class, 'update'])
            ->name('about.update');


        // =========================
        // PROFILE
        // =========================

        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');


        // =========================
        // SETTINGS
        // =========================

        Route::get('/settings', [SettingController::class, 'edit'])
            ->name('settings.edit');

        Route::put('/settings', [SettingController::class, 'update'])
            ->name('settings.update');


        // =========================
        // BUSINESS CATEGORIES
        // =========================

        Route::resource(
            'business-categories',
            BusinessCategoryController::class
        );

    });


// =========================
// PUBLIC SOLUTIONS
// =========================

Route::get('/solutions', [SolutionController::class, 'index'])
    ->name('solutions.index');

Route::get('/solutions/{slug}', [SolutionController::class, 'show'])
    ->name('solutions.show');


// =========================
// PUBLIC BUSINESS CATEGORIES
// =========================

Route::get('/business-categories/{slug}', [ServiceCategoryController::class, 'show'])
    ->name('business-categories.show');


// =========================
// PUBLIC SERVICES
// =========================

Route::get('/services/{slug}', [ServiceController::class, 'show'])
    ->name('services.show');


// =========================
// CONTACT
// =========================

Route::post('/contact-message', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.message');


// =========================
// PORTFOLIO
// =========================

Route::get('/portfolio/{slug}', function ($slug) {

    $project = Project::with([
        'category',
        'images'
    ])
        ->where('slug', $slug)
        ->where('status', 'Completed')
        ->firstOrFail();

    return view('portfolio.show', compact('project'));

})->name('portfolio.show');


// =========================
// PUBLIC ABOUT
// =========================

Route::get('/about', function () {

    $about = Page::where('slug', 'about')
        ->where('status', 'published')
        ->firstOrFail();

    return view('about', compact('about'));

})->name('about');