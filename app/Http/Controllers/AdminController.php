<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('y-m-d h:i:s');

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
        return $this->respondWithToken($token)->toResponse($request);

        // if (Auth::attempt($credentials)) {
        //     $token = auth('api')->attempt($credentials);
        //     return $this->respondWithToken($token);
        // } else {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    // public function Admin(Request $request)
    // {
    //     $data = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $admin = Admin::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    //     // $product = $request->input('Admin_previlege');
    //     // $adminPrevilege =  Admin::create(['name' => $data['adminName']]);
    //     $token = $admin->createToken('adminRegistration')->plainTextToken;
    //     // if ($admin) {
    //     //     $name = $admin['name'];
    //     //     $this->email = $admin['email'];

    //     //     $data = array('name' => $name,);
    //     //     Mail::send('Register', $data, function ($message) {
    //     //         $message->to($this->email, 'Mulla Nasruddin')->subject('Chiiti Laravel se Testing ke liye ayi hai');
    //     //         $message->from('azamdeal@gmail.com', 'Azam Deal');
    //     //     });
    //     // }
    //     $response = [
    //         'user' => $admin,
    //         'token' => $token,
    //         // 'Admin' => $adminPrevilege,
    //         'status' => 201
    //     ];
    //     return response($response, 201);
    // }
}
