<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function blog() {
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString();
        $categories = Category::all();

        return view('blog', [
            'title' => 'Blog',
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
