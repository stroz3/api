<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\User;
use App\Traits\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\NewAccessToken;

class LoginService
{
    use ThrottlesLogins;

    protected PersonalAccessTokenService $personalAccessTokenService;

    public function __construct(PersonalAccessTokenService $personalAccessTokenService)
    {
        $this->personalAccessTokenService = $personalAccessTokenService;
    }

    public function loginWithModel(Request $request, string $userModelName): NewAccessToken
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->sendLockoutResponse($request);
        }

        /** @var User|Admin $userModelName */
        $user = $userModelName::where('email', $request->get('email'))->first();

        if ($user && Hash::check($request->get('password'), $user->password)) {
            $this->clearLoginAttempts($request);
            return $this->personalAccessTokenService->generate($request, $user);
        }

        $this->incrementLoginAttempts($request);

        throw ValidationException::withMessages([
            "email" => "Введенные данные неверны",
        ]);
    }
}
