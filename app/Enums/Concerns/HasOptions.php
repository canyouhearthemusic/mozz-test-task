<?php

namespace App\Enums\Concerns;

trait HasOptions
{
    public static function options()
    {
        return collect(static::cases())
            ->map(function ($enum) {
                return [
                    'key' => $enum->label(),
                    'value' => $enum->value,
                ];
            })->toArray();
    }

    public function toOptions(): array
    {
        return [
            'key' => $this->label(),
            'value' => $this->value,
        ];
    }

}