<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\BlogDashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page'
    ]);
});

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home Page
        '
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'nama' => 'Hikam'
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact',
        'nama' => 'Hikam'
    ]);
});
Route::get('/blog', [blogController::class, 'blog']);

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('artikel', ['title' => 'Artikel', 'post' => $post]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [BlogDashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [BlogDashboardController::class, 'store'])->name('addpost');
    Route::get('/dashboard/create', [BlogDashboardController::class, 'create']);
    Route::delete('/dashboard/{post:slug}', [BlogDashboardController::class, 'destroy']);
    Route::get('/dashboard/{post:slug}/edit', [BlogDashboardController::class, 'edit']);
    Route::patch('/dashboard/{post:slug}', [BlogDashboardController::class, 'update']);
    Route::get('/dashboard/{post:slug}', [BlogDashboardController::class, 'show']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload', [ProfileController::class, 'upload']);
});

require __DIR__.'/auth.php';
