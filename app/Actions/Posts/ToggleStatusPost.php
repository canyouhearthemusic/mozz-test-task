<?php

namespace App\Actions\Posts;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToggleStatusPost
{
    public function handle(Request $request, Post $post)
    {
        DB::transaction(function () use ($post) {
            $newStatus = $post->hasStatus(PostStatus::DRAFT) ? PostStatus::PUBLISHED : PostStatus::DRAFT;
            $post->update(['status' => $newStatus->value]);
        });
    }
}