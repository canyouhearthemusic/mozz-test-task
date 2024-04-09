<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => PostStatus::class,
    ];

    public function hasStatus(PostStatus ...$statuses): bool
    {
        return collect($statuses)->contains($this->status);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', PostStatus::PUBLISHED);
    }

    public function scopePaginateWith($query, $perPage = 15)
    {
        return $query->paginate($perPage)->withQueryString();
    }
}
