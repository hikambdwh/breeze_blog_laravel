<?php

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
Route::get('/blog', function () {
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString();
    $categories = Category::all();

    return view('blog', [
        'title' => 'Blog',
        'posts' => $posts,
        'categories' => $categories
    ]);
});

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('artikel', ['title' => 'Artikel', 'post' => $post]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
