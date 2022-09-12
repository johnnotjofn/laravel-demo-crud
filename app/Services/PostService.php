<?php

namespace App\Services;

use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PostService
{
    /**
     * @var PostRepository
     */
    protected PostRepository $postRepository;

    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function savePostData($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->postRepository->save($data);

    }
}
