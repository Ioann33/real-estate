<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamStoreRequest;
use App\Models\Team;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(): JsonResponse
    {
        $teams = Team::query()->get();
        return response()->json($teams);
    }

    public function store(TeamStoreRequest $request): JsonResponse
    {
        $team = Team::query()->create($request->all());
        return response()->json($team, 201);
    }
}
