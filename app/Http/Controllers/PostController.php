<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use function Laravel\Prompts\select;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))
            ->with('category', 'author')
            ->select(['slug', 'title', 'updated_at', 'user_id', 'category_id', 'excerpt', 'image'])
            ->paginate(12);
        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $baseSlug = Str::slug($validated['title']);
        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (Post::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        $validated['slug'] = $uniqueSlug;
        $validated['excerpt'] = Str::limit($validated['body'], 100, '...');
        $validated['user_id'] = auth()->id();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }
        Post::create($validated);

        return redirect('/');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {

        $validatedFields = $request->validated();
        if ($request->hasFile('image')) {
            $validatedFields['image'] = $request->file('image')->store('images', 'public');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function manage()
    {
        $posts = auth()->user()->posts()->get();
        return view('posts.manage', ['posts' => $posts]);
    }
}
