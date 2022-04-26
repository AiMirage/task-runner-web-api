<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Repositories\UsersRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends BaseController
{
    protected $userRepo;

    public function __construct(UsersRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws ValidationException
     *
     *
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $this->sendResponse([
            'token' => $user->createToken($request->device_name)->plainTextToken
        ], 'Logged in successfully');

    }
}
