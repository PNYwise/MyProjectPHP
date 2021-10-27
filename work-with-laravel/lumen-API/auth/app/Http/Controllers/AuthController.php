<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $register = User::Create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        if ($register) {
            return response()->json([
                'success' => true,
                'message' => 'Register Success',
                'data' => $register
            ],201);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Register Fail!',
                'data' => ''
            ],400);
        }
        
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email',$email)->first();
        if ($user) {
            if (Hash::check($password,$user->password)) {
                $apiTokern = base64_encode(Str::random(40));
    
                $user->update([
                    'api_token' => $apiTokern
                ]);
    
                return response()->json([
                    'success' => true,
                    'message' => 'login Success!',
                    'data' => [
                        'user' => $user,
                        'api_token' => $apiTokern
                    ]
                ],201);
            }else {
                return response()->json([
                    'success' => false,
                    'message' => 'Login Filed!',
                    'data' => ''
                ]);
            }
        }else{
            return response()->json([
                    'success' => false,
                    'message' => 'Login Filed!',
                    'data' => ''
            ]);
        }
    }
}
