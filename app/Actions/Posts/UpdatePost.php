<?php

namespace App\Actions\Posts;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdatePost
{
    public function handle(Request $request, Post $post)
    {
        DB::transaction(function () use ($request, $post) {
            $request->thumbnail = $request->has('thumbnail')
                ? $request->file('thumbnail')->store('thumbnails')
                : $post->thumbnail;

            $post->update([
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'body' => $request->body,
                'thumbnail' => $request->thumbnail
            ]);

            PostCategory::where('post_id', $post->id)->delete();

            foreach ($request->category as $categoryId) {
                PostCategory::create([
                    'post_id' => $post->id,
                    'category_id' => $categoryId,
                ]);
            }
        });
    }
}