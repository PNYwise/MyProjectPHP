<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Validator;

class SocialMediaLoginController extends Controller
{
    use ApiResponser;

    public function googleLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'google_id' => 'required',
            'email' => 'required',
            'full_name' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponser::errorResponse($validator->getMessageBag(), 400);
        }

        $user = User::where('google_id', $request->google_id)->first();
        if ($user != null) {
            if (auth()->loginUsingId($user->id)) {
                $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                $role = auth()->user()->role;
                return response()->json([
                    'success' => 1,
                    'message' => 'login success',
                    'data' => [
                        'token' => $token,
                        'role' => $role
                    ]
                ], 200);
            }
        } else {
            $user = User::Create([
                'email' => $request->email,
                'full_name' => $request->full_name,
                'password' => 0,
                'address' => '',
                'phone' => '',
                'role' => 'user',
                'active' => 0,
                'verified' => 0,
                'balance' => 0,
                'google_id' => $request->google_id,
                'facebook_id' => '',
                'device_token' => '',
            ]);

            $token = $user->createToken('LaravelAuthApp')->accessToken;
            $role = $user->role;
            return response()->json([
                'success' => 1,
                'massage' => 'success',
                'data' => [
                    'token' => $token,
                    'role' => $role,
                ]
            ], 200);
        }
    }
    public function facebookLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facebook_id' => 'required',
            'email' => 'required',
            'full_name' => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponser::errorResponse($validator->getMessageBag(), 400);
        }

        $user = User::where('facebook_id', $request->facebook_id)->first();
        if ($user != null) {
            if (auth()->loginUsingId($user->id)) {
                $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                $role = auth()->user()->role;
                return response()->json([
                    'success' => 1,
                    'message' => 'login success',
                    'data' => [
                        'token' => $token,
                        'role' => $role
                    ]
                ], 200);
            }
        } else {
            $user = User::Create([
                'email' => $request->email,
                'full_name' => $request->full_name,
                'password' => 0,
                'address' => '',
                'phone' => '',
                'role' => 'user',
                'active' => 0,
                'verified' => 0,
                'balance' => 0,
                'google_id' => '',
                'facebook_id' => $request->facebook_id,
                'device_token' => '',
            ]);

            $token = $user->createToken('LaravelAuthApp')->accessToken;
            $role = $user->role;
            return response()->json([
                'success' => 1,
                'massage' => 'success',
                'data' => [
                    'token' => $token,
                    'role' => $role
                ]
            ], 200);
        }
    }
}
