<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return Hash::make("codeit123");
//     return view('welcome');
// });


// Frontend Routes
Route::get("/", [PageController::class, "home"])->name("home");
Route::get("/category/{slug}", [PageController::class, "category"])->name("category");
Route::get("/search", [PageController::class, "search"])->name("search");
Route::get("/article/{slug}", [PageController::class, "article"])->name("article");
Route::get("/province/{slug}", [PageController::class, "province"])->name("province");
Route::get("/contact", [\App\Http\Controllers\Frontend\ContactController::class, "show"])->name("contact");
Route::post("/contact", [\App\Http\Controllers\Frontend\ContactController::class, "store"])->name("contact.store");



// Breeze Route
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// Admin Route
Route::middleware('auth')->prefix('/admin')->group(function () {
    // Dashboard overview
    Route::get('/dashboard', function () {
        $messageCount = \App\Models\Message::count();
        $categoryCount = \App\Models\Category::count();
        $articleCount = \App\Models\Article::count();
        $advertiseCount = \App\Models\Advertise::count();
        return view('admin.dashboard', compact('messageCount', 'categoryCount', 'articleCount', 'advertiseCount'));
    })->name('admin.dashboard');
    Route::resource("/category", CategoryController::class)->names('admin.category');
    Route::resource("/article", ArticleController::class)->names('admin.article');
    Route::resource("/advertise", AdvertiseController::class)->names('admin.advertise');
    Route::resource("/messages", \App\Http\Controllers\Admin\MessageController::class)->only(['index', 'show', 'destroy'])->names('admin.messages');
});

require __DIR__ . '/auth.php';
