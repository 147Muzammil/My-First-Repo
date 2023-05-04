<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->only(['name', 'email', 'password', 'position', 'role']);
        $validator = Validator::make($data, [
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'email',
                'unique:users'
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:50'
            ],
            'position' => 'required',
            'role' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()
                    ->toArray()
            ], Response::HTTP_BAD_REQUEST);
        }
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'position' => $data['position'],
            'role' => $data['role']
        ]);
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized'
            ], Response::HTTP_UNAUTHORIZED);
        }
        return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized'
            ], Response::HTTP_UNAUTHORIZED);
        }
        return $this->respondWithToken($token);
    }

    public function user()
    {
        return response()->json(auth('api')->user());
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60
        ]);
    }

    // public function admin(Request $request)
    // {
    //     $data = $request->only(['name', 'email', 'password']);
    //     $validator = Validator::make($data, [
    //         'name' => [
    //             'required',
    //             'string'
    //         ],
    //         'email' => [
    //             'required',
    //             'email',
    //             'unique:admin'
    //         ],
    //         'password' => [
    //             'required',
    //             'string',
    //             'min:6',
    //             'max:50'
    //         ],
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'errors' => $validator->getMessageBag()
    //                 ->toArray()
    //         ], Response::HTTP_BAD_REQUEST);
    //     }
    //     Admin::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    //     $credentials = $request->only(['email', 'password']);
    //     if (!$token = auth('api')->attempt($credentials)) {
    //         return response()->json([
    //             'error' => 'Unauthorized',
    //         ], Response::HTTP_UNAUTHORIZED);
    //     }
    //     // if (Auth::attempt($credentials)) {
    //     //     $token = auth('api')->attempt($credentials);
    //     //     return $this->respondWithToken($token);
    //     // } else {
    //     //     return response()->json(['error' => 'Unauthorized'], 401);
    //     // }
    //     return $this->respondWithToken($token);
    // }
}
