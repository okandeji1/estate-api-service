<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidator;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['register', 'login']);
    }

    /**
     * Register a new user.
     *
     * @param  \App\Http\Requests\RegisterValidator  $request
     * @return Illuminate\Http\Response
     */
    public function register(RegisterValidator $request)
    {
        $validated = $request->validated();
        // $validated = $request->safe()->only(['name', 'email']);

        $user = User::create([
            'uuid' => Uuid::uuid4(),
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('septemconnect')->plainTextToken;

        return response()->json([
            'success' => true,
            // 'data' => $user,
            'message' => 'Registration successful. Please login'
        ], 201);
    }

    public function login(Request $request)
    {
        return response()->json([
            'success' => true,
            // 'data' => $user,
            'message' => 'Registration successful. Please login'
        ], 201);

        $fields = $request->validate([
            'email' => 'required|string|email',
            'name' => 'required|string',
        ]);

        // failed validation
        // if($fields->fails()){
        //     return response()->json([
        //         'success' => false,
        //         'message' => $fields->errors()
        //     ], 400);
        // }

        // Check email
        $user = User::where('email', $fields['email'])->first();
        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        $token = $user->createToken('septemconnect')->plainTextToken;

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'Registration successful. Please login'
        ], 201);
    }

    public function logout()
    {
        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Successfully logged out'
        ], 200);

        // auth()->logout();
        auth()->user()->tokens()->delete();
        return response()->json([
                'success' => true,
                'data' => null,
                'message' => 'Successfully logged out'
            ], 200);
    }
}
