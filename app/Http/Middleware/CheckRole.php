<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckRole // Disarankan ganti dari CheckRoll
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        try {
            // Perhatikan huruf besar T pada parseToken
            $user = JWTAuth::parseToken()->authenticate();

            // Cek apakah role user ada di dalam daftar roles yang diizinkan
            if (!$user || !in_array($user->role, $roles)) {
                return response()->json([
                    'success' => false, // Pakai boolean lebih baik daripada string 'false'
                    'message' => 'Forbidden: You do not have the required role',
                ], 403);
            }

        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Token is invalid or expired!',
            ], 401);
        }

        return $next($request);
    }
}