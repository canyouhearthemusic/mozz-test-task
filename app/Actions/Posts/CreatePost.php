<?php

namespace App\Actions\Posts;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreatePost
{
    public function handle(Request $request)
    {
        DB::transaction(function () use ($request) {
            $createdPost = Post::create([
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'body' => $request->body,
                'user_id' => $request->user()->id
            ]);

            foreach ($request->category as $categoryId) {
                PostCategory::create([
                    'post_id' => $createdPost->id,
                    'category_id' => $categoryId,
                ]);
            }
        });
    }
}