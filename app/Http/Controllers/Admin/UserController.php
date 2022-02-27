<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function response as response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function getSessionUser(Request $request)
    {
        return $request->user();
    }

    public function activateUser(User $user): JsonResponse
    {
        if ($user->is_active) {
            return response()->json();
        }

        $user->is_active = true;
        $user->save();

        return response()->json(['status' => 'User activated successfully']);
    }

    public function deactivateUser(User $user): JsonResponse
    {
        if (!$user->is_active) {
            return response()->json();
        }

        $user->is_active = false;
        $user->save();

        return response()->json(['status' => 'User deactivated successfully']);
    }
}
