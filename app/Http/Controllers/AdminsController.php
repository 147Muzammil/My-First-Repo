<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;

class AdminsController extends Controller
{
    public function adminStore(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        $validator = Validator::make($data, [
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'email',
                'unique:admin'
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:50'
            ],
        ]);
        if ($validator->fails()) {
            $res = [
                'errors' => $validator->getMessageBag()
                    ->toArray()
            ];

            return response()->json($res);
        }
        $Admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $credentials = $request->only(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized'
            ], Response::HTTP_UNAUTHORIZED);
        }
        return $this->respondWithToken($token);
    }
}
