<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'data' => 'all comments'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCommentRequest $request
     * @return JsonResponse
     */
    public function store(StoreCommentRequest $request): JsonResponse
    {
        return new JsonResponse([
            'data' => 'posted'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $id
     * @return JsonResponse
     */
    public function show(Comment $id): JsonResponse
    {
        return new JsonResponse([
            'data' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCommentRequest $request
     * @param Comment $id
     * @return JsonResponse
     */
    public function update(UpdateCommentRequest $request, Comment $id): JsonResponse
    {
        return new JsonResponse([
            'data' => 'updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $id
     * @return JsonResponse
     */
    public function destroy(Comment $id): JsonResponse
    {
        return new JsonResponse([
            'data' => 'deleted'
        ]);
    }
}
