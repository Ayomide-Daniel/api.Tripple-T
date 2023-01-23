<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use App\Enums\RoleNameEnum;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    /**
     * Register a new user
     * 
     * @param UserStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(UserStoreRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        $token = $user->createToken(bin2hex(random_bytes(32)))->plainTextToken;

        return new ApiResponse([
            'token' => $token,
        ]);
    }

    /**
     * Login a user
     * 
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string'
            ]);
    
            $user = User::where('email', $validated['email'])->first();
    
            if (!$user || !Hash::check($validated['password'], $user->password)) {
                throw new \Exception('Invalid credentials');
            }
    
            $token = $user->createToken(bin2hex(random_bytes(32)))->plainTextToken;
    
            return new ApiResponse([
                'token' => $token,
            ]);
        } catch (\Throwable $th) {
            if ($th instanceof ValidationException) {
                return response()->json([
                    "message" => $th->validator->errors()->first(),
                ], 422);
            }
            
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // public  function adminLogin(Request $request)
    // {
    //     try {
    //         $validated = $request->validate([
    //             'email' => 'required|email',
    //             'password' => 'required|string'
    //         ]);
    
    //         $user = User::where('email', $validated['email'])->first();
    
    //         if (!$user || !Hash::check($validated['password'], $user->password)) {
    //             throw new \Exception('Invalid credentials');
    //         }
    
    //         $check_user_role = UserRole::where(['user_id' => $user->id, 'role_id' => RoleNameEnum::ADMIN])->first();
    
    //         if (!$check_user_role) {
    //             throw new \Exception('You are not an admin');
    //         }
    
    //         $token = $user->createToken(bin2hex(random_bytes(32)))->plainTextToken;
    
    //         return new ApiResponse([
    //             'token' => $token,
    //         ]);
    //     } catch (\Throwable $th) {
    //         if ($th instanceof ValidationException) {
    //             return response()->json([
    //                 "message" => $th->validator->errors()->first(),
    //             ], 422);
    //         }
    //         return response()->json([
    //             'message' => $th->getMessage(),
    //         ], 500);
    //     }
    // }
}
