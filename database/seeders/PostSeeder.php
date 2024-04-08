<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminId = User::role('admin')->first()->id;

        $posts = Post::factory(40)->create(['user_id' => $adminId]);

        foreach ($posts as $post) {
            $post->categories()->attach(Category::inRandomOrder()->take(2)->pluck('id')->toArray());
        }
    }
}
