<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->where('author_id', '=', Auth::user()->id)->filter(request(['search']))->paginate(10)->withQueryString();

        $count = Post::where('author_id', '=', Auth::user()->id)->count();

        return view('dashboard.index', ['posts' => $posts, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => ['required', 'min:4', 'max:255'],
        //     'category_id' => 'required',
        //     'content' => 'required'
        // ]);

        Validator::make(
            $request->all(),
            [
                'title' => ['required', 'min:4', 'max:255', 'unique:posts'],
                'category_id' => 'required',
                'content' => ['required', 'min:20']
            ],
            [
                'title.required' => 'Judul harus diisi',
                'title.unique' => 'Judul sudah diambil',
                'min' => 'Judul minimal 4 karakter',
                'max' => 'Judul maksimal 255 karakter',
                'category_id.required' => 'Kategori harus diisi',
                'content.required' => 'Content harus diisi',
            ]
        )->validate();

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'content' => $request->content
        ]);

        return redirect('/dashboard')->with(['success' => 'Your article has succesfully posted!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   
        $categories = Category::all();
        return view('dashboard.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Validator::make(
            $request->all(),
            [   
                'title' => ['required', 'min:4', 'max:255', Rule::unique('posts')->ignore($post->id)],
                'category_id' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Judul harus diisi',
                'min' => 'Judul minimal 4 karakter',
                'max' => 'Judul maksimal 255 karakter',
                'category_id.required' => 'Kategori harus diisi',
                'content.required' => 'Content harus diisi',
            ]
        )->validate();

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'author_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'content' => $request->content
        ]);

        return redirect('/dashboard')->with(['success' => 'Your article has succesfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/dashboard')->with(['success' => 'Your article has succesfully deleted!']);
    }
}
