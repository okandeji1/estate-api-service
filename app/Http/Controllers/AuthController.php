<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidator;
use App\Http\Requests\LoginValidator;
use App\Models\User;
use App\Models\Role;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
        try {
            // Retrieve the validated input data...
            $validated = $request->safe()->only('user_type');

            $role = Role::where('user_type', $validated['user_type'])->first();

            if(!$role){
                return response()->json([
                    'success' => false,
                    'message' => 'Role not found'
                ], 400);
            }

            $role_id = $role->id;

            $user = new User();

            foreach ($request->safe() as $key => $value) {
                if ($key === 'user_type'){
                    continue;
                }

                if ($key === 'password'){
                    $user->$key = bcrypt($value);
                    continue;
                }
                $user->$key = $value;
            }

            $user->uuid = Uuid::uuid4();
            $user->role_id = $role_id;
            $user->role = $role->user_type;
            $user->is_admin = $role->user_type === 'admin' || $role->user_type === 'super-admin'  ? 1 : 0;
            $user->save();

            $token = $user->createToken('septemconnect')->plainTextToken;

            return response()->json([
                'success' => true,
                'data' => [
                 'user' =>  $user,
                ],
                'message' => 'new user created successfully'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    public function login(LoginValidator $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Check email
            $user = User::where('email', $validated['email'])->first();
            // Check password
            if(!$user || !Hash::check($validated['password'], $user->password)){
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid email or password'
                ], 401);
            }

            $token = $user->createToken('septemconnect')->plainTextToken;

            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $user,
                    'accessToken' => $token,
                ],
                'message' => 'Login successfully.'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Successfully logged out'
        ], 200);
    }
}
