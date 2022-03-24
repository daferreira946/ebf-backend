<?php

namespace App\Http\Middleware;

use App\Exceptions\UserStatusException;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DropDeactivatedUsers
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse
     * @throws UserStatusException
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        $user = $request->user();

        if (!$user->is_active) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw new UserStatusException();
        }

        return $next($request);
    }
}
