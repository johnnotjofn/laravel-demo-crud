<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $count = Post::query()->count();

        if ($count === 0) {
            $postId = Post::query()->create()->id;
        } else {
            $postId = rand(1, $count);
        }

        return [
            'body' => [],
            'user_id' => 1,
            'post_id' => $postId,
        ];
    }
}
