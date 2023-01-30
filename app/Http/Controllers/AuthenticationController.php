<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use App\Http\Resources\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Role;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AuthenticationController extends Controller
{
    /**
     * Register a new user
     * 
     * @param UserRegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(UserRegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);

        $token = $user->createToken(bin2hex(random_bytes(32)))->plainTextToken;

        return new ApiResponse([
            'token' => $token,
        ], "Registration successful");
    }

    /**
     * Login a user
     * 
     * @param UserLoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(UserLoginRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw new BadRequestException('Invalid credentials');
        }

        // Get login type from query string
        $login_type = $request->query('type') ?? '';

        $this->checkUserRole($user, $login_type);

        $token = $user->createToken(bin2hex(random_bytes(32)))->plainTextToken;

        Auth::login($user);

        return new ApiResponse([
            'token' => $token,
        ], "Login successful");
    }

    private function checkUserRole(User $user, string $login_type = '')
    {
        if ($login_type == '') {
            return true;
        }

        $roles = Role::all();

        $role_names = array_map(function ($role) {
            return $role['name'];
        }, $roles->toArray());

        $dict_roles = [];

        foreach ($roles as $key => $role) {
            $dict_roles[$role->name] = $role->id;
        }

        if ($login_type != '' && !in_array($login_type, $role_names)) {
            throw new BadRequestException('Invalid login type');
        }

        $check_user_role = UserRole::where(['user_id' => $user->id, 'role_id' => $dict_roles[$login_type]])->first();

        if (!$check_user_role) {
            throw new BadRequestException('You are not an ' . $login_type);
        }

        return true;
    }
}
