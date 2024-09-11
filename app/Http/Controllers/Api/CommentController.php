<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(int $taskId): JsonResponse
    {
        $comments = Comment::getCommentsByTask($taskId);
        return response()->json($comments);
    }

    public function store(string $taskId, CommentStoreRequest $request): JsonResponse
    {
        $comment = Comment::query()->create(
            array_merge($request->all(), ['user_id' => Auth::id()])
        );
        return response()->json($comment);
    }

    public function destroy(string $id): JsonResponse
    {
        $task = Comment::query()->findOrFail($id)->delete();
        return response()->json($task);
    }
}
