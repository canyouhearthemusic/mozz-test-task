<?php

namespace App\Enums;

use App\Enums\Concerns\HasOptions;

enum PostStatus: int
{
    use HasOptions;

    case DRAFT = 0;
    case PUBLISHED = 1;

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PUBLISHED => 'Published',
        };
    }
}