<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostRepository
{
    public function save($data): JsonResponse
    {
        return response()->json(Post::create($data));
    }
}
