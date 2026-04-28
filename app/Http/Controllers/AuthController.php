<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth; // Import ini di paling atas!

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. Setup validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        // 2. Cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer',
        ]);

        // 4 & 5. Cek keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'User creation failed',
        ], 409);
    }

    public function login(Request $request)
    {
        // 1. Setup validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Get kredensial
        $credentials = $request->only('email', 'password');

        // 4. Cek login (Dapetin Token)
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah!'
            ], 401);
        }

        // 5. Sukses
        return response()->json([
            'success' => true,
            'message' => 'Login berhasil!',
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);
    }

    public function logout()
    {
        try {
            // Hancurkan token
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Successfully logged out'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to logout, please try again'
            ], 500);
        }
    }
}