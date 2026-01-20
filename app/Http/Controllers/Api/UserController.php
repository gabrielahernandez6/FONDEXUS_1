<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'data' => [],
            'current_page' => 1,
            'total' => 0,
        ]);
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([
            'message' => 'User created successfully',
        ], 201);
    }

    /**
     * Display the specified user.
     */
    public function show(int $id): JsonResponse
    {
        return response()->json([
            'id' => $id,
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
        ]);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        return response()->json([
            'message' => 'User updated successfully',
        ]);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(int $id): Response
    {
        return response()->noContent();
    }
}
