<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:4',
            // 'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'massage' => $validator->getMessageBag(),
                'data' => []
            ], 400);
        }
        $userCreate = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => ' ',
            'phone' => $request->phone,
            'role' => 'user',
            'active' => 1,
            'verified' => 2,
            'balance' => 0,
        ]);

        $token = $userCreate->createToken('LaravelAuthApp')->accessToken;
        return response()->json([
            'success' => 1,
            'massage' => 'success',
            'data' => [
                'token' => $token
            ]
        ], 200);
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = Auth::user()->createToken('LaravelAuthApp')->accessToken;
            $role = Auth::user()->role;
            return response()->json([
                'success' => 1,
                'message' => 'login success',
                'data' => [
                    'token' => $token,
                    'role' => $role,
                ]
            ], 200);
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Unauthorised',
                'data' => []
            ], 401);
        }
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
        }
        return response()->json([
            'success' => 1,
            'message' => 'success',
            'data' => []
        ], 200);
    }
}
