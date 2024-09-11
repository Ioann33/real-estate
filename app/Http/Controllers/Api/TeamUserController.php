<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeamUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    public function store(int $teamId, int $userId): JsonResponse
    {
        $teamUser = TeamUser::query()->create([
            'team_id' => $teamId,
            'user_id' => $userId
        ]);
        return response()->json($teamUser, 201);
    }

    public function destroy(int $teamId, int $userId): JsonResponse
    {
        $teamUser = TeamUser::query()->where('team_id', $teamId)->where('user_id', $userId)->delete();
        return response()->json($teamUser);
    }
}
