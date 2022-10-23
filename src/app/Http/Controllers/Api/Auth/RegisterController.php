<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\PersonalAccessTokenService;
use App\Services\UserService;

class RegisterController extends Controller
{
    protected PersonalAccessTokenService $personalAccessTokenService;
    protected UserService $userService;

    public function __construct(PersonalAccessTokenService $personalAccessTokenService, UserService $userService)
    {
        $this->personalAccessTokenService = $personalAccessTokenService;
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userService->createUser($request->validated());
        $token = $this->personalAccessTokenService->generate($request, $user);
        return response()->json([
            'token' => $token->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }
}
