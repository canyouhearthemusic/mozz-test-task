<?php

namespace App\Http\Controllers;

use App\Actions\Posts\CreatePost;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // TODO: Optimize query to reuse category models
        $posts = Post::query()
                        ->with('author:id,name', 'categories:id,name')
                        ->latest()
                        ->paginate(($request->has('paginate') ? $request->query('paginate') : 15))
                        ->withQueryString();

        return view('posts.index', [
           'posts' => $posts,
           'paginatedBy' => $request->query('paginate', ''),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->select(['id', 'name'])->get();

        return view('posts.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, CreatePost $action)
    {
        return $action->handle($request)
                    ? to_route('posts.index')->with(['success', 'The post has been created'])
                    : to_route('posts.index')->with(['error', 'Post could not be created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
