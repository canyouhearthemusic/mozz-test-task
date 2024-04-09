<?php

namespace App\Http\Controllers;

use App\Actions\Posts\CreatePost;
use App\Actions\Posts\ToggleStatusPost;
use App\Actions\Posts\UpdatePost;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
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
        $query = Post::with('author:id,name', 'categories:id,name');

        if (! $request->user() || $request->user()->hasRole('regular')) {
            $query->published();
        }

        $perPage = $request->query('paginate', 15);
        $posts = $query->latest()->paginateWith($perPage);

        return view('posts.index', [
            'posts' => $posts,
            'paginatedBy' => $request->query('paginate', ''),
        ]);
    }

    public function create()
    {
        $categories = Category::query()->select(['id', 'name'])->get();

        return view('posts.create', [
            'categories' => $categories,
        ]);
    }

    public function store(StorePostRequest $request, CreatePost $action)
    {
        return $action->handle($request)
            ? to_route('posts.index')->with('success', 'The post has been created')
            : to_route('posts.index')->with('error', 'Post could not be created');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'categories' => Category::query()->select(['id', 'name'])->get(),
            'post' => $post
        ]);
    }

    public function update(UpdatePostRequest $request, UpdatePost $action, Post $post)
    {
        return $action->handle($request, $post)
            ? to_route('posts.index')->with('success', 'The post has been updated')
            : to_route('posts.index')->with('error', 'Post could not be updated');
    }

    public function toggleVisibility(Request $request, ToggleStatusPost $action, Post $post)
    {
        return $action->handle($request, $post)
            ? to_route('posts.show', $post->id)->with('success', 'The post visibility has been updated.')
            : to_route('posts.show', $post->id)->with('success', 'The post visibility could not be updated.');
    }

    public function destroy(Post $post)
    {
        return $post->delete()
            ? to_route('posts.index')->with('success', 'The post has been updated')
            : to_route('posts.index')->with('error', 'Post could not be updated');
    }
}
